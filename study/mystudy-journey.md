# My Study Journey & Master Guide: Laravel 13

---

# PART I: HANDS-ON PROGRESS & CORE JOURNEY

## 1. Project Initialization & Setup

### Move to the Workshop
```powershell
cd ~\Herd
```

### Build the Application
```powershell
laravel new my-first-app
```

### The Installer Interview & Selections

| Prompt | Selection | Rationale |
| :--- | :--- | :--- |
| **Starter Kit** | `No starter kit` | Understand bare-bones structure first before using starter kits like Breeze or Jetstream. |
| **Testing Framework** | `Pest` | Modern standard for Laravel testing with elegant syntax. |
| **Initialize Git** | `Yes` | Prepares version control from the very beginning (`git init`). |
| **Database** | `MySQL` | Target database running via DBngin. |

---

## 2. Project Setup & Version Control

### Move into Project Folder
```powershell
cd my-first-app
```

### Working Directory
`C:\Users\universal\Herd\my-first-app`

### Initialize Git Repository & First Commit
```powershell
git init
git add .
git commit -m "Initial commit: Fresh Laravel 13 installation"
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

3. **Create the Model (Translator)**
   ```powershell
   php artisan make:model Skill
   ```

---

## 4. Helpful Concepts & Playground

> [!TIP]
> **Pro-Tip: The Config Cache**  
> If you change your `.env` file and Laravel doesn't pick up the changes, clear the cached settings using configuration clear commands (`php artisan config:clear`).

> [!NOTE]
> **Senior Tip: Method Spoofing**  
> Browsers natively only support `GET` and `POST`. To send `PATCH` or `DELETE` requests, Laravel uses Method Spoofing (e.g., `@method('PATCH')` tag in Blade).

### Artisan Tinker (Developer Playground)
```powershell
php artisan tinker
```
```php
App\Models\Skill::create(['name' => 'Laravel 13', 'percent' => 85]);
App\Models\Skill::create(['name' => 'MySQL Mastery', 'percent' => 90]);
App\Models\Skill::all(); // Retrieve all records
```

### Flash Messages & Redirects
```php
return redirect('/about')->with('success', 'Skill added successfully!');
```
```blade
@if(session('success'))
    <div class="p-3 mb-3 text-green-800 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif
```

### Validation Error Display
```blade
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

## 5. Controllers & Templating

### Create Controller
```powershell
php artisan make:controller SkillController
```

### Templating with `@yield`
Notice the `@yield('content')` tag. This acts as a placeholder where child views inject specific HTML content.

---

## 6. Relationships & Table Restructuring

### Create Category Model & Migration
```powershell
php artisan make:model Category -m
```
*(The `-m` flag automatically generates a matching migration file.)*

### Add Foreign Key to Skills Table
Create a migration to add `category_id`:
```powershell
php artisan make:migration add_category_id_to_skills_table
```

### Refresh Database
> [!WARNING]
> Running `migrate:fresh` drops all tables and re-runs all migrations. This will clear existing local data!

```powershell
php artisan migrate:fresh
```

---

## 7. Day 9: Authentication & Middleware (Laravel Breeze)

Install Laravel Breeze for authentication (Login, Register, Password Reset, Profile Management):

```powershell
composer require laravel/breeze --dev
php artisan breeze:install
```

**Installation Prompts:**
- **Stack:** `Blade`
- **Dark Mode:** `No`
- **Testing Framework:** `PHPUnit`

**Build Frontend Assets:**
```powershell
npm install
npm run build
```

---

## 8. Day 10: Layouts, Components & Authentication Deep Dive

### Layouts & Components

1. **Layout (`app.blade.php`)**: The structural frame containing HTML headers, navbars, and main backgrounds.
2. **Components (`<x-app-layout>`)**: Reusable UI blocks.
3. **Slots**: 
   - `{{ $slot }}`: Main content placeholder inside components.
   - Named slots like `<x-slot name="header">` inject into specific layout variables (`{{ $header }}`).

### Authentication & Middleware

1. **Routes (`routes/web.php`)**: Includes `require __DIR__.'/auth.php';`.
2. **Controllers**: `AuthenticatedSessionController` validates user credentials against the `users` database table.
3. **Middleware**: Intercepts requests to enforce security rules (e.g., `auth` middleware protects restricted routes).

```php
Route::resource('skills', SkillController::class)->middleware('auth');
```

---

## 9. Day 11: Handling File Uploads

### Step 1: Form Encoding
Ensure form includes `enctype="multipart/form-data"`:
```html
<form action="/skills" method="POST" enctype="multipart/form-data">
```

### Step 2: Store Uploaded File in Controller
```php
if ($request->hasFile('image')) {
    // Saves file in storage/app/public/skills
    $path = $request->file('image')->store('skills', 'public');
    
    // Save $path to database
}
```

### Step 3: Create Storage Link
Create a symbolic link from `public/storage` to `storage/app/public`:
```powershell
php artisan storage:link
```

### Step 4: Display Images in Blade
```blade
<img src="{{ asset('storage/' . $skill->image) }}" />
```

---

## 10. Day 12: Background Workers (Queues & Jobs)

Move long-running operations (emails, data processing) off the main request thread to background jobs.

### Step 1: Generate Job Class
```powershell
php artisan make:job ProcessPodcast
```

### Step 2: Define Job Logic (`app/Jobs/ProcessPodcast.php`)
```php
public function handle(): void
{
    // Execute background logic here
}
```

### Step 3: Dispatch Job from Controller
```php
use App\Jobs\ProcessPodcast;

ProcessPodcast::dispatch($podcast);
```

### Step 4: Run Queue Worker
```powershell
php artisan queue:work
```

---

# PART II: ARCHITECTURE & SYSTEM CONCEPTS (Modules 01 - 03)

### 1. Request Lifecycle
Every HTTP request flows through:
1. `public/index.php` (Entry point)
2. HTTP Kernel / Router (`bootstrap/app.php`)
3. Middleware Pipeline (Security, Auth, Session)
4. Controller Action / Route Closure
5. Response returned to browser

### 2. Service Container & Dependency Injection
The Service Container manages class dependencies:
```php
// Binding in a Service Provider
app()->bind(PaymentGateway::class, StripePaymentGateway::class);

// Singleton Binding
app()->singleton(AuditLogger::class, fn () => new AuditLogger());
```

### 3. Service Providers & Facades
- **Service Providers**: Bootstraps services via `register()` and `boot()` methods in `app/Providers/AppServiceProvider.php`.
- **Facades**: Static interfaces to classes in the container (e.g. `Route::get()`, `Cache::get()`, `DB::table()`).

---

# PART III: THE BASICS DEEP DIVE (Module 04)

### 1. Dedicated Form Request Validation
Extract complex validation out of controllers:
```powershell
php artisan make:request StoreSkillRequest
```
```php
public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'percent' => 'required|integer|min:0|max:100',
    ];
}
```

### 2. Custom Middleware
Create custom request interceptors:
```powershell
php artisan make:middleware EnsureUserIsAdmin
```
Register in `bootstrap/app.php`:
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
    ]);
})
```

### 3. Logging & Error Handling
Log messages easily anywhere:
```php
use Illuminate\Support\Facades\Log;

Log::info('Skill updated successfully', ['skill_id' => $skill->id]);
Log::error('Failed to communicate with API', ['error' => $e->getMessage()]);
```

---

# PART IV: SECURITY & AUTHORIZATION (Module 06)

### 1. Policies & Gates
Control granular permissions for models:
```powershell
php artisan make:policy SkillPolicy --model=Skill
```
```php
public function update(User $user, Skill $skill): bool
{
    return $user->id === $skill->user_id;
}
```
Protect in controller or Blade:
```php
$this->authorize('update', $skill);
```
```blade
@can('update', $skill)
    <a href="{{ route('skills.edit', $skill) }}">Edit Skill</a>
@endcan
```

### 2. Encryption & Password Hashing
```php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

$hashedPassword = Hash::make('secret-password');
$encryptedData = Crypt::encryptString('Sensitive Data');
```

---

# PART V: DATABASE & ELOQUENT MASTERY (Modules 07 & 08)

### 1. Database Seeding & Model Factories
Populate local databases with realistic test data:
```powershell
php artisan make:factory SkillFactory --model=Skill
php artisan make:seeder SkillSeeder
```
```php
// DatabaseSeeder.php
Skill::factory(50)->create();
```
```powershell
php artisan db:seed
```

### 2. Eager Loading (Preventing N+1 Query Issues)
Avoid executing N extra queries inside loops:
```php
// BAD: N+1 Problem
$skills = Skill::all(); // 1 Query
foreach ($skills as $skill) {
    echo $skill->category->name; // N Queries
}

// GOOD: Eager Loading
$skills = Skill::with('category')->get(); // 2 Queries Total
```

### 3. Attribute Casts & Enums
Define explicit data casting in models:
```php
protected function casts(): array
{
    return [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'percent' => 'integer',
    ];
}
```

### 4. API Resources
Transform models to structured API JSON responses:
```powershell
php artisan make:resource SkillResource
```
```php
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'proficiency' => $this->percent . '%',
        'created_at' => $this->created_at->toIso8601String(),
    ];
}
```

---

# PART VI: TESTING & QA WITH PEST (Module 10)

### 1. Pest 4 Feature Tests
Generate and run elegant tests:
```powershell
php artisan make:test SkillTest --pest
```
```php
use App\Models\User;
use App\Models\Skill;

test('authenticated user can create a skill', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/skills', [
        'name' => 'Pest Testing',
        'percent' => 95,
    ]);

    $response->assertRedirect('/skills');
    $this->assertDatabaseHas('skills', ['name' => 'Pest Testing']);
});
```

### 2. Run Tests
```powershell
php artisan test --compact
php artisan test --filter=SkillTest
```

---

# PART VII: ADVANCED TOOLS, AI & PACKAGES (Modules 05, 09, 11)

### 1. Custom Artisan Commands
```powershell
php artisan make:command SendWeeklyReports
```

### 2. Cache & Redis
```php
use Illuminate\Support\Facades\Cache;

$skills = Cache::remember('skills.all', 3600, fn () => Skill::all());
```

### 3. Laravel 13 AI Integration (Module 09)
Laravel 13 introduces native AI SDK helpers, agent orchestration, and prompt builders for seamless LLM integrations.

### 4. Key Ecosystem Packages (Module 11)
- **Laravel Breeze**: Authentication starter kit.
- **Laravel Sanctum**: Lightweight API token authentication.
- **Laravel Boost**: Agentic MCP tools for rapid AI-assisted development.
- **Laravel Pint**: Code style formatter (`vendor/bin/pint`).
- **Laravel Horizon**: Redis queue dashboard.
- **Laravel Telescope**: Application debugging dashboard.

---

## 11. Summary of All Commands (Including Pre-Deployment)

Here is the complete reference list of all commands used throughout this study journey, including pre-deployment preparation:

### Environment & Project Navigation
```powershell
cd ~\Herd
laravel new my-first-app
cd my-first-app
```

### Git & Version Control
```powershell
git init
git add .
git commit -m "Initial commit: Fresh Laravel 13 installation"
git status
```

### Artisan Generator Commands (`make:`)
```powershell
php artisan make:migration create_skills_table
php artisan make:model Skill
php artisan make:controller SkillController
php artisan make:model Category -m
php artisan make:migration add_category_id_to_skills_table
php artisan make:request StoreSkillRequest
php artisan make:middleware EnsureUserIsAdmin
php artisan make:policy SkillPolicy --model=Skill
php artisan make:factory SkillFactory --model=Skill
php artisan make:seeder SkillSeeder
php artisan make:resource SkillResource
php artisan make:job ProcessPodcast
php artisan make:command SendWeeklyReports
php artisan make:test SkillTest --pest
```

### Database & Storage Operations
```powershell
php artisan migrate
php artisan migrate:fresh
php artisan db:seed
php artisan storage:link
```

### Package Management & Frontend Building
```powershell
composer require laravel/breeze --dev
php artisan breeze:install
npm install
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

> [!IMPORTANT]
> Run these commands before deploying your Laravel application to production for optimal performance and security:

```powershell
# 1. Install production dependencies without dev packages
composer install --optimize-autoloader --no-dev

# 2. Compile assets for production
npm run build

# 3. Cache Configuration, Routes, Views, and Events
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Or run single optimization command:
php artisan optimize

# 4. Run database migrations safely in production
php artisan migrate --force

# 5. Link public storage directory
php artisan storage:link

# 6. Clear cache (if re-deploying or troubleshooting)
php artisan optimize:clear
```

---

## 12. Useful Resources

- **Official Laravel Documentation (v13.x)**: [https://laravel.com/docs/13.x](https://laravel.com/docs/13.x)
- **Laravel Deployment Guide**: [https://laravel.com/docs/13.x/deployment](https://laravel.com/docs/13.x/deployment)
- **Pest PHP Documentation**: [https://pestphp.com](https://pestphp.com)
- **Why**: This is your best friend. Beginner-friendly and covers everything from basic routing to advanced architecture, Eloquent ORM, testing, and production deployment.
