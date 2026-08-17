# Complete Laravel API Development & Postman Guide (with Error Troubleshooting)

Welcome! This guide is designed to help you study and learn how to build, test, and debug RESTful APIs in Laravel step by step, using **Postman** for testing, along with a comprehensive **Error Handling & Troubleshooting Index** to quickly search and fix any errors you encounter.

---

## Table of Contents
1. [API Concepts & HTTP Status Codes Overview](#1-api-concepts--http-status-codes-overview)
2. [Database Foreign Keys & Migration Structure](#2-database-foreign-keys--migration-structure)
3. [Step-by-Step API Development Guide](#3-step-by-step-api-development-guide)
   - [Step 1: Define API Routes (`routes/api.php`)](#step-1-define-api-routes-routesapiphp)
   - [Step 2: Create Eloquent API Resources](#step-2-create-eloquent-api-resources)
   - [Step 3: Create Validation Form Requests](#step-3-create-validation-form-requests)
   - [Step 4: Build the API Controller](#step-4-build-the-api-controller)
4. [Testing Your API in Postman Step-by-Step](#4-testing-your-api-in-postman-step-by-step)
5. [Searchable Error Handling & Troubleshooting Guide](#5-searchable-error-handling--troubleshooting-guide)

---

## 1. API Concepts & HTTP Status Codes Overview

A **REST API** allows applications (like mobile apps, frontend JS frameworks, or external clients) to interact with your Laravel database by sending and receiving data formatted as **JSON**.

### Standard HTTP Status Codes

| Status Code | Name | Meaning & Use Case |
| :--- | :--- | :--- |
| **`200 OK`** | Success | Request succeeded (e.g. GET list, GET single, PUT update). |
| **`201 Created`** | Created | Resource successfully created (e.g. POST new Skill). |
| **`204 No Content`** | Deleted | Successfully deleted resource (no response body needed). |
| **`400 Bad Request`** | Client Error | Malformed JSON request body or missing parameters. |
| **`401 Unauthorized`** | Unauthenticated | User is not logged in or missing valid API token. |
| **`403 Forbidden`** | Unauthorized Action | Logged-in user is not authorized to edit/delete this specific resource (Policy check failed). |
| **`404 Not Found`** | Not Found | Route URI doesn't exist or ID not found in database. |
| **`422 Unprocessable`** | Validation Error | Form validation failed (e.g., missing required `name` or `percent` field). |
| **`500 Internal Error`** | Server Error | PHP syntax error, SQL query exception, or unhandled exception. |

---

## 2. Database Foreign Keys & Migration Structure

To avoid foreign key reference errors, table creation migrations must be ordered sequentially based on dependencies:

1. **`users` table** (Base entity)
2. **`categories` table** (Belongs to `users` via `user_id`)
3. **`skills` table** (Belongs to `users` via `user_id` and `categories` via `category_id`)
4. **`tasks` table** (Belongs to `users` via `user_id`)

### Inline Foreign Key Syntax in Laravel Migrations

Instead of separate `add_category_id_to_skills_table.php` migrations, define foreign keys directly inside the `Schema::create` table definition:

```php
// database/migrations/2026_04_28_113714_create_categories_table.php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('name');
    $table->timestamps();
});

// database/migrations/2026_08_09_114510_create_skills_table.php
Schema::create('skills', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
    $table->string('name');
    $table->unsignedTinyInteger('percent');
    $table->string('image')->nullable();
    $table->timestamps();
});
```

- **`constrained()`**: Automatically connects `user_id` to `id` on the `users` table, and `category_id` to `id` on the `categories` table.
- **`cascadeOnDelete()`**: If the parent User is deleted, all their Categories and Skills are deleted automatically.
- **`nullOnDelete()`**: If a Category is deleted, the `category_id` on the associated Skills becomes `null` (preventing orphan skill errors).

---

## 3. Step-by-Step API Development Guide

### Step 1: Define API Routes (`routes/api.php`)

Ensure `routes/api.php` exists. (If using Laravel 11+, install API routes using `php artisan install:api`).

```php
use App\Http\Controllers\Api\SkillApiController;
use Illuminate\Support\Facades\Route;

// Protect endpoints with auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('skills', SkillApiController::class);
});
```

### Step 2: Create Eloquent API Resources

API Resources convert Eloquent models into clean JSON structures for responses.

Run command:
```bash
php artisan make:resource SkillResource
```

Code (`app/Http/Resources/SkillResource.php`):
```php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'percent' => $this->percent,
            'category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
            ],
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
```

### Step 3: Create Validation Form Requests

Run command:
```bash
php artisan make:request Api/StoreSkillApiRequest
```

Code (`app/Http/Requests/Api/StoreSkillApiRequest.php`):
```php
namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'percent' => 'required|integer|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
```

### Step 4: Build the API Controller

Run command:
```bash
php artisan make:controller Api/SkillApiController --api
```

Code (`app/Http/Controllers/Api/SkillApiController.php`):
```php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSkillApiRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillApiController extends Controller
{
    // GET /api/skills
    public function index(Request $request): JsonResponse
    {
        $skills = Skill::with('category')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => SkillResource::collection($skills),
        ], 200);
    }

    // POST /api/skills
    public function store(StoreSkillApiRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $skill = Skill::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Skill created successfully.',
            'data' => new SkillResource($skill),
        ], 201);
    }

    // GET /api/skills/{skill}
    public function show(Request $request, Skill $skill): JsonResponse
    {
        if ($skill->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Forbidden access.'], 403);
        }

        return response()->json([
            'status' => 'success',
            'data' => new SkillResource($skill->load('category')),
        ], 200);
    }

    // PUT/PATCH /api/skills/{skill}
    public function update(StoreSkillApiRequest $request, Skill $skill): JsonResponse
    {
        if ($skill->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Forbidden access.'], 403);
        }

        $skill->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Skill updated successfully.',
            'data' => new SkillResource($skill),
        ], 200);
    }

    // DELETE /api/skills/{skill}
    public function destroy(Request $request, Skill $skill): JsonResponse
    {
        if ($skill->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Forbidden access.'], 403);
        }

        $skill->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Skill deleted successfully.',
        ], 200);
    }
}
```

---

## 4. Testing Your API in Postman Step-by-Step

### Essential Postman Header Configuration

> ⚠️ **CRITICAL POSTMAN STEP**: Always set the `Accept` header to `application/json`.
> If you do not set `Accept: application/json`, Laravel will return HTML error pages instead of JSON error responses!

In Postman, for **EVERY** API request, open the **Headers** tab and add:
- `Accept`: `application/json`
- `Content-Type`: `application/json`
- `Authorization`: `Bearer <YOUR_SANCTUM_TOKEN_HERE>`

### Testing Endpoints in Postman

#### 1. Fetch User Skills (GET)
- **Method**: `GET`
- **URL**: `http://my-first-app.test/api/skills`
- **Response `200 OK`**:
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "name": "PHP & Laravel",
      "percent": 85,
      "category": { "id": 1, "name": "Backend" }
    }
  ]
}
```

#### 2. Create Skill (POST)
- **Method**: `POST`
- **URL**: `http://my-first-app.test/api/skills`
- **Body**: Select `raw` -> `JSON`:
```json
{
  "name": "Vue.js 3",
  "percent": 70,
  "category_id": 2
}
```
- **Response `201 Created`**

#### 3. Update Skill (PUT)
- **Method**: `PUT`
- **URL**: `http://my-first-app.test/api/skills/1`
- **Body** (`JSON`):
```json
{
  "name": "PHP & Laravel 11",
  "percent": 90,
  "category_id": 1
}
```

#### 4. Delete Skill (DELETE)
- **Method**: `DELETE`
- **URL**: `http://my-first-app.test/api/skills/1`

---

## 5. Searchable Error Handling & Troubleshooting Guide

Search this section whenever you encounter an error in Postman or console!

---

### Error Index: Quick Jump

1. [Error: Response is HTML web page instead of JSON](#error-1-response-is-html-web-page-instead-of-json)
2. [Error: `401 Unauthorized` / `Unauthenticated`](#error-2-401-unauthorized--unauthenticated)
3. [Error: `403 Forbidden`](#error-3-403-forbidden)
4. [Error: `404 Not Found` / `NotFoundHttpException`](#error-4-404-not-found--notfoundhttpexception)
5. [Error: `422 Unprocessable Content` (Validation Error)](#error-5-422-unprocessable-content-validation-error)
6. [Error: `405 Method Not Allowed`](#error-6-405-method-not-allowed)
7. [Error: `500 Internal Server Error` - `SQLSTATE[42S22]: Column not found`](#error-7-500-internal-server-error---sqlstate42s22-column-not-found)
8. [Error: `SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row`](#error-8-sqlstate23000-integrity-constraint-violation-1452-cannot-add-or-update-a-child-row)
9. [Error: CORS Policy / Access-Control-Allow-Origin](#error-9-cors-policy--access-control-allow-origin)

---

### Error 1: Response is HTML web page instead of JSON

**Symptom**: Postman shows a long HTML page starting with `<!DOCTYPE html>` or `Route [login] not defined`.

**Root Cause**: Laravel default behavior redirects unauthenticated API requests to the web login page if it thinks the client wants HTML.

**Fix**:
1. In Postman, go to the **Headers** tab.
2. Add Key: `Accept`, Value: `application/json`.
3. Re-send request. Laravel will now return proper JSON errors (e.g. `{"message": "Unauthenticated."}`).

---

### Error 2: `401 Unauthorized` / `Unauthenticated`

**Symptom**:
```json
{
  "message": "Unauthenticated."
}
```

**Root Cause**: The route requires authentication (`auth:sanctum` middleware), but no valid token was provided in the request headers.

**Fix**:
1. Generate an API token for your user during login using Sanctum:
   `$token = $user->createToken('api-token')->plainTextToken;`
2. In Postman -> **Headers** tab, add:
   - Key: `Authorization`
   - Value: `Bearer 1|abc123yourtokenhere...`
3. Alternatively, in Postman -> **Authorization** tab, select **Type**: `Bearer Token` and paste your token.

---

### Error 3: `403 Forbidden`

**Symptom**:
```json
{
  "error": "Forbidden access."
}
```
OR
```json
{
  "message": "This action is unauthorized."
}
```

**Root Cause**: Policy check failed. You are trying to view, update, or delete a skill/category that belongs to another `user_id`.

**Fix**:
1. Check `SkillPolicy` or `CategoryPolicy` methods.
2. Ensure `$user->id === $model->user_id`.
3. Check Postman user token matches the owner of the resource ID in database.

---

### Error 4: `404 Not Found` / `NotFoundHttpException`

**Symptom**:
```json
{
  "message": "The route api/skillss could not be found."
}
```
OR
```json
{
  "message": "No query results for model [App\\Models\\Skill] 999."
}
```

**Root Cause**:
1. Typos in URL endpoint (e.g., `/api/skillss` instead of `/api/skills`).
2. Requesting a non-existent ID (e.g. `/api/skills/999`).

**Fix**:
1. Run `php artisan route:list --path=api` to verify exact route paths and parameter names.
2. Check if the record with ID `999` exists in the database.

---

### Error 5: `422 Unprocessable Content` (Validation Error)

**Symptom**:
```json
{
  "message": "The name field is required. (and 1 more error)",
  "errors": {
    "name": [
      "The name field is required."
    ],
    "percent": [
      "The percent field must be at least 0."
    ]
  }
}
```

**Root Cause**: Form request validation failed because required fields are missing or invalid.

**Fix**:
1. Open Postman **Body** tab.
2. Select **raw** -> **JSON** format.
3. Ensure key names match validation rules in `StoreSkillApiRequest.php`.
4. Ensure string quotes and number formats are correct (e.g. `"percent": 80`).

---

### Error 6: `405 Method Not Allowed`

**Symptom**:
```json
{
  "message": "The POST method is not supported for route api/skills/1. Supported methods: GET, PUT, PATCH, DELETE."
}
```

**Root Cause**: Used wrong HTTP verb in Postman for the endpoint.

**Fix**:
- **Listing**: `GET /api/skills`
- **Create**: `POST /api/skills`
- **Update**: `PUT /api/skills/{id}`
- **Delete**: `DELETE /api/skills/{id}`

---

### Error 7: `500 Internal Server Error` - `SQLSTATE[42S22]: Column not found`

**Symptom**:
```json
{
  "message": "SQLSTATE[42S22]: Column not found: 1054 Unknown column 'user_id' in 'where clause'"
}
```

**Root Cause**: Database table is missing a column (`user_id` or `category_id`) queried in Controller or Model.

**Fix**:
1. Run `php artisan migrate:status` to check pending migrations.
2. Run `php artisan migrate` to execute pending schema updates.

---

### Error 8: `SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row`

**Symptom**:
```json
{
  "message": "SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`category_id` references `categories` (`id`))"
}
```

**Root Cause**: You tried to assign a `category_id` that does not exist in the `categories` table.

**Fix**:
1. Pass a valid `category_id` that exists in database.
2. Or pass `"category_id": null` if category is optional.

---

### Error 9: CORS Policy / Access-Control-Allow-Origin

**Symptom**: Browser frontend console shows `CORS error: No 'Access-Control-Allow-Origin' header is present`.

**Root Cause**: Frontend domain (e.g. `http://localhost:3000`) is calling Laravel backend (`http://my-first-app.test`) without CORS permission.

**Fix**:
1. Open `config/cors.php`.
2. Ensure `'paths' => ['api/*', 'sanctum/csrf-cookie']`.
3. Set `'allowed_origins' => ['*']` or specify frontend URL (e.g., `['http://localhost:3000']`).
4. Run `php artisan config:clear`.

---

Happy coding & studying! 🚀 Keep this file open whenever building or testing your APIs.
