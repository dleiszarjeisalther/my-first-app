# My Study Journey & Master Guide: React.js + Laravel 13 API Stack

---

# PART I: HANDS-ON PROGRESS & CORE JOURNEY (REACT + LARAVEL API)

## 1. Project Initialization & Setup

### Move to the Workshop
```powershell
cd ~\Herd
```

### Build the Application (Laravel API Backend + React Frontend)
```powershell
laravel new my-first-app-api
```

### The Installer Interview & Selections (React + API Stack)

| Prompt | Selection | Rationale |
| :--- | :--- | :--- |
| **Starter Kit** | `React with Inertia` OR `No starter kit (API Only)` | Choose **Inertia (React)** for integrated SPA or **API Only** for decoupled React app. |
| **Testing Framework** | `Pest` | Modern standard for testing both API endpoints and React components. |
| **Initialize Git** | `Yes` | Prepares version control from second one (`git init`). |
| **Database** | `MySQL` | Target relational database running via DBngin. |

---

## 2. Project Setup & Version Control

### Move into Project Folder
```powershell
cd my-first-app-api
```

### Working Directory
`C:\Users\universal\Herd\my-first-app-api`

### Initialize Git Repository & First Commit
```powershell
git init
git add .
git commit -m "Initial commit: Laravel 13 API + React setup"
git status
```

---

## 3. Database & Models Basics

### Migration & Model Flow

1. **Create the Blueprint (Migration)**
   ```powershell
   php artisan make:migration create_skills_table
   ```

2. **Run the Migration**
   ```powershell
   php artisan migrate
   ```

3. **Create the Model & API Resource**
   ```powershell
   php artisan make:model Skill
   php artisan make:resource SkillResource
   ```

---

## 4. Helpful Concepts & API Playground

> [!TIP]
> **Pro-Tip: CORS & Config Cache**  
> For decoupled React apps (e.g., `localhost:5173`), ensure CORS is configured in `config/cors.php` or `bootstrap/app.php`. If settings change, clear cache: `php artisan config:clear`.

> [!NOTE]
> **Senior Tip: Pure JSON API vs Inertia**  
> In pure API mode, controllers return `SkillResource::collection($skills)`. In Inertia mode, controllers return `Inertia::render('Skills/Index', ['skills' => $skills])`.

### Artisan Tinker (Developer Playground)
```powershell
php artisan tinker
```
```php
App\Models\Skill::create(['name' => 'React 19', 'percent' => 90]);
App\Models\Skill::create(['name' => 'Laravel 13 API', 'percent' => 95]);
```

### JSON API Responses & Status Codes
```php
// Return JSON Response with Status 201 Created
return response()->json([
    'message' => 'Skill created successfully!',
    'data' => new SkillResource($skill),
], 201);
```

### Handling Validation Errors in React
Laravel automatically returns HTTP 422 JSON response:
```json
{
  "message": "The name field is required.",
  "errors": {
    "name": ["The name field is required."]
  }
}
```
React handling with Axios:
```jsx
axios.post('/api/skills', formData)
  .catch(error => {
    if (error.response?.status === 422) {
      setErrors(error.response.data.errors);
    }
  });
```

---

## 5. API Controllers & React Components

### Create API Resource Controller
```powershell
php artisan make:controller Api/SkillController --api
```

### React Component (`resources/js/Components/SkillList.jsx`)
```jsx
import React, { useEffect, useState } from 'react';
import axios from 'axios';

export default function SkillList() {
    const [skills, setSkills] = useState([]);

    useEffect(() => {
        axios.get('/api/skills')
            .then(response => setSkills(response.data.data))
            .catch(error => console.error(error));
    }, []);

    return (
        <div className="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            {skills.map(skill => (
                <div key={skill.id} className="p-4 bg-white shadow rounded-lg">
                    <h3 className="text-lg font-bold">{skill.name}</h3>
                    <p className="text-gray-600">{skill.percent}% Proficiency</p>
                </div>
            ))}
        </div>
    );
}
```

---

## 6. Relationships & API Resource Transformations

### Create Category Model & Migration
```powershell
php artisan make:model Category -m
```

### Add Foreign Key Migration
```powershell
php artisan make:migration add_category_id_to_skills_table
```

### Skill API Resource (`app/Http/Resources/SkillResource.php`)
```php
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'percent' => $this->percent,
        'category' => new CategoryResource($this->whenLoaded('category')),
        'created_at' => $this->created_at->toIso8601String(),
    ];
}
```

### Refresh Database
```powershell
php artisan migrate:fresh
```

---

## 7. Day 9: Authentication with Laravel Sanctum & React

Install Laravel Sanctum for API token & SPA cookie authentication:

```powershell
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### React Login Handler with Sanctum Cookie
```jsx
// 1. Get CSRF Cookie from Laravel
await axios.get('/sanctum/csrf-cookie');

// 2. Perform Login Request
await axios.post('/login', { email, password });
```

---

## 8. Day 10: React SPA State, Hooks & Route Guards

### React Context Authentication Guard (`AuthContext.jsx`)
```jsx
import { createContext, useContext, useState, useEffect } from 'react';
import axios from 'axios';

const AuthContext = createContext();

export function AuthProvider({ children }) {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        axios.get('/api/user')
            .then(res => setUser(res.data))
            .catch(() => setUser(null))
            .finally(() => setLoading(false));
    }, []);

    return (
        <AuthContext.Provider value={{ user, setUser, loading }}>
            {children}
        </AuthContext.Provider>
    );
}

export const useAuth = () => useContext(AuthContext);
```

### Protecting API Routes in `routes/api.php`
```php
use App\Http\Controllers\Api\SkillController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('skills', SkillController::class);
});
```

---

## 9. Day 11: File Uploads with React FormData & Axios

### Step 1: React File Upload Component
```jsx
import React, { useState } from 'react';
import axios from 'axios';

export default function UploadSkillImage({ skillId }) {
    const [file, setFile] = useState(null);

    const handleSubmit = async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('image', file);

        await axios.post(`/api/skills/${skillId}/upload`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        });
    };

    return (
        <form onSubmit={handleSubmit}>
            <input type="file" onChange={(e) => setFile(e.target.files[0])} />
            <button type="submit">Upload Image</button>
        </form>
    );
}
```

### Step 2: Controller & Storage Link
```php
public function uploadImage(Request $request, Skill $skill)
{
    $request->validate(['image' => 'required|image|max:2048']);
    $path = $request->file('image')->store('skills', 'public');
    
    $skill->update(['image_path' => $path]);
    return response()->json(['url' => asset('storage/' . $path)]);
}
```
```powershell
php artisan storage:link
```

---

## 10. Day 12: Background Workers & Real-Time React (WebSockets / Reverb)

### Step 1: Create Job
```powershell
php artisan make:job ProcessPodcast
```

### Step 2: Dispatch Job & Notify React via Broadcasting / Reverb
```php
ProcessPodcast::dispatch($podcast);
```

### Step 3: Listen in React with Laravel Echo
```jsx
import Echo from 'laravel-echo';

useEffect(() => {
    window.Echo.private(`user.${userId}`)
        .listen('JobCompleted', (e) => {
            toast.success(e.message);
        });
}, [userId]);
```

### Step 4: Run Workers
```powershell
php artisan queue:work
```

---

# PART II: ARCHITECTURE & SYSTEM CONCEPTS (API STACK)

### 1. Stateless API vs SPA Cookie Authentication
- **Stateless API Tokens**: Used for mobile apps & 3rd party APIs (Sanctum Personal Access Tokens / Bearer Tokens).
- **SPA Cookie Authentication**: Secure HTTP-only cookies with CSRF protection for React SPAs running on same top-level domain.

### 2. Service Container & API Services
Extract complex business logic into action services:
```php
namespace App\Services;

class SkillService
{
    public function createSkill(array $data): Skill
    {
        return Skill::create($data);
    }
}
```

---

# PART III: THE BASICS DEEP DIVE (API VALIDATION & RESPONSES)

### 1. Form Request API Validation
```powershell
php artisan make:request StoreSkillRequest
```
```php
public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'percent' => 'required|integer|min:0|max:100',
    ];
}
```

### 2. Standardized API Responses
```php
trait ApiResponse
{
    protected function success($data, string $message = null, int $code = 200)
    {
        return response()->json(['status' => 'Success', 'message' => $message, 'data' => $data], $code);
    }

    protected function error(string $message, int $code)
    {
        return response()->json(['status' => 'Error', 'message' => $message], $code);
    }
}
```

---

# PART IV: SECURITY & AUTHORIZATION (SANCTUM & POLICIES)

### 1. API Authorization Policies
```powershell
php artisan make:policy SkillPolicy --model=Skill
```
```php
// SkillController.php
public function update(UpdateSkillRequest $request, Skill $skill)
{
    Gate::authorize('update', $skill);
    $skill->update($request->validated());
    return new SkillResource($skill);
}
```

---

# PART V: DATABASE & ELOQUENT MASTERY (OPTIMIZED APIS)

### 1. API Resource Collections with Eager Loading
```php
// Api/SkillController.php
public function index()
{
    // Eager load category to avoid N+1 queries in JSON API
    $skills = Skill::with('category')->paginate(15);
    return SkillResource::collection($skills);
}
```

---

# PART VI: TESTING REACT & LARAVEL APIS WITH PEST

### 1. Pest API Endpoint Tests
```powershell
php artisan make:test Api/SkillApiTest --pest
```
```php
use App\Models\User;
use App\Models\Skill;

test('authenticated user can fetch skills API', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user, 'sanctum')
                     ->getJson('/api/skills');

    $response->assertStatus(200)
             ->assertJsonStructure(['data' => [['id', 'name', 'percent']]]);
});
```

---

# PART VII: ADVANCED TOOLS, VITE + REACT & PACKAGES

### 1. Vite Configuration for React (`vite.config.js`)
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
    ],
});
```

### 2. Key Ecosystem Packages for React + API
- **Laravel Sanctum**: API Token & SPA Auth.
- **Inertia.js React**: Seamless monolith SPA framework without client-side routing overhead.
- **TanStack Query (React Query)**: Server-state fetching & caching in React.
- **Axios**: HTTP client for browser requests.
- **Laravel Boost**: AI MCP server support for quick development.

---

## 11. Summary of All Commands (React + Laravel API Stack)

### Environment & Project Setup
```powershell
cd ~\Herd
laravel new my-first-app-api
cd my-first-app-api
```

### Git & Version Control
```powershell
git init
git add .
git commit -m "Initial commit: Laravel API + React"
git status
```

### Artisan Generator Commands (`make:`)
```powershell
php artisan make:migration create_skills_table
php artisan make:model Skill
php artisan make:controller Api/SkillController --api
php artisan make:model Category -m
php artisan make:request StoreSkillRequest
php artisan make:resource SkillResource
php artisan make:policy SkillPolicy --model=Skill
php artisan make:factory SkillFactory --model=Skill
php artisan make:seeder SkillSeeder
php artisan make:job ProcessPodcast
php artisan make:test Api/SkillApiTest --pest
```

### Database & Storage Operations
```powershell
php artisan migrate
php artisan migrate:fresh
php artisan db:seed
php artisan storage:link
```

### Package Management & Frontend Bundling (React)
```powershell
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
npm install @vitejs/plugin-react react react-dom axios
npm run dev
npm run build
vendor/bin/pint --format agent
```

### Interactive Playground & Queue Workers
```powershell
php artisan tinker
php artisan queue:work
php artisan test --compact
```

### Pre-Deployment & Optimization Commands (Before Going Live)

```powershell
# 1. Install production PHP packages
composer install --optimize-autoloader --no-dev

# 2. Build React production bundle
npm run build

# 3. Cache API routes and config
php artisan config:cache
php artisan route:cache
php artisan optimize

# 4. Migrate database
php artisan migrate --force

# 5. Link storage
php artisan storage:link
```

---

## 12. Useful Resources

- **Official Laravel API & Sanctum Documentation**: [https://laravel.com/docs/13.x/sanctum](https://laravel.com/docs/13.x/sanctum)
- **Inertia.js React Documentation**: [https://inertiajs.com](https://inertiajs.com)
- **React.js Documentation**: [https://react.dev](https://react.dev)
- **Axios HTTP Documentation**: [https://axios-http.com](https://axios-http.com)
