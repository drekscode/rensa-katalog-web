# Survey Request Admin & API Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Implement the survey request database structure, API endpoints for mobile app, and admin panel management.

**Architecture:** Create `survey_requests` and `survey_request_images` tables. Build a POST API controller for mobile submission. Build an admin controller and views for listing, showing details, and updating status of survey requests.

**Tech Stack:** Laravel, MySQL/PostgreSQL, Tailwind CSS, Blade Templates.

## Global Constraints
- Laravel 11 / PHP 8.2 standards.
- Database tables: `survey_requests` and `survey_request_images`.
- Default DP Survey is `50000`.
- API endpoint: POST `/api/survey-requests`.
- Admin route: `/admin/survey-request`.
- Emojis and em-dashes are banned.

---

### Task 1: Database Migration & Models

**Files:**
- Create: `database/migrations/2026_07_04_000000_create_survey_requests_table.php`
- Create: `app/Models/SurveyRequest.php`
- Create: `app/Models/SurveyRequestImage.php`
- Test: `tests/Feature/SurveyRequestModelTest.php`

**Interfaces:**
- Consumes: None
- Produces: `SurveyRequest` and `SurveyRequestImage` models with active relations.

- [ ] **Step 1: Write the model test**

Create `tests/Feature/SurveyRequestModelTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use App\Models\SurveyRequestImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyRequestModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_survey_request_relations()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Test Name',
            'alamat' => 'Test Address',
            'kontak' => '0812345678',
            'ruangan' => 'Living Room',
            'status' => 'pending',
            'dp_survey' => 50000
        ]);

        $image = SurveyRequestImage::create([
            'survey_request_id' => $survey->id,
            'foto' => 'path/to/image.jpg'
        ]);

        $this->assertEquals(1, $survey->images()->count());
        $this->assertEquals($survey->id, $image->surveyRequest->id);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=SurveyRequestModelTest`
Expected: FAIL due to missing tables and classes.

- [ ] **Step 3: Create migration**

Create `database/migrations/2026_07_04_000000_create_survey_requests_table.php`:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('kontak');
            $table->text('ruangan');
            $table->enum('status', ['pending', 'scheduled', 'completed', 'cancelled'])->default('pending');
            $table->integer('dp_survey')->default(50000);
            $table->timestamps();
        });

        Schema::create('survey_request_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_request_id')->constrained('survey_requests')->cascadeOnDelete();
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_request_images');
        Schema::dropIfExists('survey_requests');
    }
};
```

- [ ] **Step 4: Create Models**

Create `app/Models/SurveyRequest.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'ruangan',
        'status',
        'dp_survey'
    ];

    public function images()
    {
        return $this->hasMany(SurveyRequestImage::class, 'survey_request_id');
    }
}
```

Create `app/Models/SurveyRequestImage.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRequestImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_request_id',
        'foto'
    ];

    public function surveyRequest()
    {
        return $this->belongsTo(SurveyRequest::class, 'survey_request_id');
    }
}
```

- [ ] **Step 5: Run test to verify it passes**

Run: `php artisan test --filter=SurveyRequestModelTest`
Expected: PASS

- [ ] **Step 6: Commit**

```bash
git add database/migrations/2026_07_04_000000_create_survey_requests_table.php app/Models/SurveyRequest.php app/Models/SurveyRequestImage.php tests/Feature/SurveyRequestModelTest.php
git commit -m "feat: implement survey request migrations and models

Co-Authored-By: Claude <noreply@anthropic.com>"
```

---

### Task 2: API Endpoints for Mobile App Submission

**Files:**
- Create: `app/Http/Controllers/SurveyRequestController.php`
- Modify: `routes/api.php`
- Test: `tests/Feature/SurveyRequestApiTest.php`

**Interfaces:**
- Consumes: `SurveyRequest`, `SurveyRequestImage` models
- Produces: POST `/api/survey-requests` endpoint

- [ ] **Step 1: Write API endpoint test**

Create `tests/Feature/SurveyRequestApiTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SurveyRequestApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_submit_survey_request_api()
    {
        Storage::fake('public');

        $response = $this->postJson('/api/survey-requests', [
            'nama' => 'Jule',
            'alamat' => 'Jl. Merdeka No. 10',
            'kontak' => '081234567890',
            'ruangan' => 'Kitchen room 4x3 meters',
            'images' => [
                UploadedFile::fake()->image('room1.jpg'),
                UploadedFile::fake()->image('room2.jpg')
            ]
        ]);

        $response->assertStatus(201)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('survey_requests', [
            'nama' => 'Jule',
            'kontak' => '081234567890'
        ]);

        $survey = SurveyRequest::first();
        $this->assertCount(2, $survey->images);
        
        foreach ($survey->images as $img) {
            Storage::disk('public')->assertExists($img->foto);
        }
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=SurveyRequestApiTest`
Expected: FAIL (404 Not Found)

- [ ] **Step 3: Implement API Controller**

Create `app/Http/Controllers/SurveyRequestController.php`:
```php
<?php

namespace App\Http\Controllers;

use App\Models\SurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurveyRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
            'ruangan' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            return DB::transaction(function () use ($request, $validated) {
                $survey = SurveyRequest::create([
                    'nama' => $validated['nama'],
                    'alamat' => $validated['alamat'],
                    'kontak' => $validated['kontak'],
                    'ruangan' => $validated['ruangan'],
                    'status' => 'pending',
                    'dp_survey' => 50000,
                ]);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $path = $file->store('survey-requests', 'public');
                        $survey->images()->create(['foto' => $path]);
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Survey request submitted successfully',
                    'data' => $survey->load('images')
                ], 201);
            });
        } catch (\Exception $e) {
            Log::error('Failed to save survey request: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save survey request'
            ], 500);
        }
    }
}
```

- [ ] **Step 4: Register API Route**

Edit `routes/api.php` by appending the following code:
```php
Route::post('survey-requests', [\App\Http\Controllers\SurveyRequestController::class, 'store']);
```

- [ ] **Step 5: Run test to verify it passes**

Run: `php artisan test --filter=SurveyRequestApiTest`
Expected: PASS

- [ ] **Step 6: Commit**

```bash
git add app/Http/Controllers/SurveyRequestController.php routes/api.php tests/Feature/SurveyRequestApiTest.php
git commit -m "feat: implement survey request submission API

Co-Authored-By: Claude <noreply@anthropic.com>"
```

---

### Task 3: Admin Web Controller & Route Configurations

**Files:**
- Create: `app/Http/Controllers/Admin/AdminSurveyRequestController.php`
- Modify: `routes/web.php`
- Modify: `resources/views/layouts/partials/sidebar.blade.php`
- Test: `tests/Feature/AdminSurveyRequestTest.php`

**Interfaces:**
- Consumes: `SurveyRequest`, `SurveyRequestImage` models
- Produces: Administrative routes under `/admin/survey-request`

- [ ] **Step 1: Write admin dashboard test**

Create `tests/Feature/AdminSurveyRequestTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSurveyRequestTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = User::factory()->create();
    }

    public function test_admin_can_view_survey_requests()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Jule Client',
            'alamat' => 'Jl. Merdeka No. 12',
            'kontak' => '0812345678',
            'ruangan' => 'Bathroom',
            'status' => 'pending'
        ]);

        $response = $this->actingAs($this->adminUser)
                         ->get(route('admin.survey-request.index'));

        $response->assertStatus(200);
        $response->assertSee('Jule Client');
    }

    public function test_admin_can_update_status()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Jule Client',
            'alamat' => 'Jl. Merdeka No. 12',
            'kontak' => '0812345678',
            'ruangan' => 'Bathroom',
            'status' => 'pending'
        ]);

        $response = $this->actingAs($this->adminUser)
                         ->put(route('admin.survey-request.update', $survey->id), [
                             'status' => 'scheduled'
                         ]);

        $response->assertRedirect(route('admin.survey-request.show', $survey->id));
        $this->assertDatabaseHas('survey_requests', [
            'id' => $survey->id,
            'status' => 'scheduled'
        ]);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AdminSurveyRequestTest`
Expected: FAIL (route names not defined)

- [ ] **Step 3: Implement Web Controller**

Create `app/Http/Controllers/Admin/AdminSurveyRequestController.php`:
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSurveyRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = SurveyRequest::with('images')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kontak', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $surveyRequests = $query->paginate(10)->withQueryString();

        return view('admin.survey-request.index', compact('surveyRequests'));
    }

    public function show($id)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);
        return view('admin.survey-request.show', compact('surveyRequest'));
    }

    public function update(Request $request, $id)
    {
        $surveyRequest = SurveyRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,scheduled,completed,cancelled'
        ]);

        $surveyRequest->update($validated);

        return redirect()->route('admin.survey-request.show', $id)
            ->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);

        foreach ($surveyRequest->images as $img) {
            if ($img->foto) {
                Storage::disk('public')->delete($img->foto);
            }
        }

        $surveyRequest->delete();

        return redirect()->route('admin.survey-request.index')
            ->with('success', 'Survey request deleted successfully.');
    }
}
```

- [ ] **Step 4: Register Web Resource Routes**

Edit `routes/web.php` to include resource routes for survey requests inside the auth middleware group:
```php
        Route::resource('survey-request', AdminSurveyRequestController::class)->only(['index', 'show', 'update', 'destroy']);
```

- [ ] **Step 5: Add Sidebar Navigation Link**

Open `resources/views/layouts/partials/sidebar.blade.php` and insert the new menu item:
```php
                        ['route' => 'admin.survey-request.index', 'label' => 'Request Survey', 'active_prefix' => 'admin.survey-request.*', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z']
```

- [ ] **Step 6: Run test to verify it passes**

Run: `php artisan test --filter=AdminSurveyRequestTest`
Expected: PASS (if views are not rendering/finding yet, it might fail because view files aren't created. Let's build the views next to guarantee it compiles).

---

### Task 4: Admin Blade Views

**Files:**
- Create: `resources/views/admin/survey-request/index.blade.php`
- Create: `resources/views/admin/survey-request/show.blade.php`

**Interfaces:**
- Consumes: Admin layout (`layouts.admin`), `surveyRequests` and `surveyRequest` data variables from controller.

- [ ] **Step 1: Create index blade view**

Create `resources/views/admin/survey-request/index.blade.php`:
```html
@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold tracking-tight text-white">Survey Requests</h1>
            <p class="mt-2 text-sm text-gray-400">Manage client survey requests and update execution progress.</p>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="mt-6 flex flex-col md:flex-row gap-4 justify-between items-center bg-[#252525] p-4 rounded-xl border border-white/5">
        <form method="GET" action="{{ route('admin.survey-request.index') }}" class="w-full flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, contact, or address..." 
                       class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#8b9b7e]">
            </div>
            <div class="w-full sm:w-48">
                <select name="status" onchange="this.form.submit()" 
                        class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#8b9b7e]">
                    <option value="">All Statuses</option>
                    @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                        <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] text-white rounded-xl px-5 py-2.5 text-sm font-semibold hover:shadow-lg transition">
                Search
            </button>
            @if(request()->filled('search') || request()->filled('status'))
                <a href="{{ route('admin.survey-request.index') }}" class="inline-flex justify-center items-center bg-gray-800 text-gray-300 rounded-xl px-5 py-2.5 text-sm font-semibold hover:bg-gray-700">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="mt-6 bg-[#252525] rounded-xl border border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="border-b border-white/5 bg-[#2d2d2d] text-xs font-semibold uppercase tracking-wider text-gray-400">
                        <th class="px-6 py-4">Client Name</th>
                        <th class="px-6 py-4">Contact</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">DP Survey</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                    @forelse($surveyRequests as $request)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 font-semibold text-white">{{ $request->nama }}</td>
                            <td class="px-6 py-4">{{ $request->kontak }}</td>
                            <td class="px-6 py-4 max-w-xs truncate">{{ $request->alamat }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($request->dp_survey, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $badgeColor = match($request->status) {
                                        'pending' => 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20',
                                        'scheduled' => 'bg-blue-500/10 text-blue-400 border border-blue-500/20',
                                        'completed' => 'bg-green-500/10 text-green-400 border border-green-500/20',
                                        'cancelled' => 'bg-red-500/10 text-red-400 border border-red-500/20',
                                    };
                                @endphp
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $badgeColor }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $request->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.survey-request.show', $request->id) }}" class="text-[#8b9b7e] hover:text-white transition text-xs font-semibold">
                                        View Details
                                    </a>
                                    <form action="{{ route('admin.survey-request.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this survey request?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 transition text-xs font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">No survey requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($surveyRequests->hasPages())
            <div class="px-6 py-4 border-t border-white/5">
                {{ $surveyRequests->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
```

- [ ] **Step 2: Create show blade view**

Create `resources/views/admin/survey-request/show.blade.php`:
```html
@extends('layouts.admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white">Survey Request Detail</h1>
            <p class="mt-2 text-sm text-gray-400">Review request details, verify uploaded images, and update status.</p>
        </div>
        <a href="{{ route('admin.survey-request.index') }}" class="bg-gray-800 text-gray-300 rounded-xl px-4 py-2 text-sm font-semibold hover:bg-gray-700 transition">
            Back to List
        </a>
    </div>

    @if(session('success'))
        <div class="mt-4 p-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Survey Details Info -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6 space-y-4">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3">Client & Room Information</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider">Client Name</span>
                        <p class="text-sm font-semibold text-white mt-1">{{ $surveyRequest->nama }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider">Contact Number</span>
                        <p class="text-sm font-semibold text-white mt-1">{{ $surveyRequest->kontak }}</p>
                    </div>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">Survey Address</span>
                    <p class="text-sm text-gray-300 mt-1 whitespace-pre-line">{{ $surveyRequest->alamat }}</p>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">Room Description</span>
                    <p class="text-sm text-gray-300 mt-1 whitespace-pre-line bg-[#1e1e1e] p-3 rounded-lg border border-white/5">{{ $surveyRequest->ruangan }}</p>
                </div>
            </div>

            <!-- Supporting Images Gallery -->
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3 mb-4">Supporting Images</h3>
                @if($surveyRequest->images->isNotEmpty())
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($surveyRequest->images as $img)
                            <div class="relative group aspect-square rounded-lg overflow-hidden bg-black/20 border border-white/5 hover:border-white/10 transition">
                                <img src="{{ asset('storage/' . $img->foto) }}" alt="Supporting image" class="h-full w-full object-cover">
                                <a href="{{ asset('storage/' . $img->foto) }}" target="_blank" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-xs font-semibold transition">
                                    Open Fullscreen
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 text-center py-6">No supporting images uploaded.</p>
                @endif
            </div>
        </div>

        <!-- Request Status Sidebar Control -->
        <div class="space-y-6">
            <div class="bg-[#252525] rounded-xl border border-white/5 p-6 space-y-4">
                <h3 class="text-lg font-bold text-white border-b border-white/5 pb-3">Status Management</h3>
                
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider">DP Survey</span>
                    <p class="text-lg font-bold text-white mt-1">Rp {{ number_format($surveyRequest->dp_survey, 0, ',', '.') }}</p>
                </div>

                <form action="{{ route('admin.survey-request.update', $surveyRequest->id) }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="status" class="text-xs text-gray-500 uppercase tracking-wider">Change Status</label>
                        <select name="status" id="status" class="w-full bg-[#1e1e1e] border border-gray-700/50 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#8b9b7e] mt-1.5">
                            @foreach(['pending' => 'Pending', 'scheduled' => 'Scheduled', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $value => $label)
                                <option value="{{ $value }}" {{ $surveyRequest->status == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-[#8b9b7e] to-[#7a8a6f] text-white rounded-xl py-2.5 text-sm font-semibold hover:shadow-lg transition">
                        Update Status
                    </button>
                </form>
            </div>

            <div class="bg-[#252525] rounded-xl border border-white/5 p-6">
                <h3 class="text-sm font-bold text-red-500 pb-2">Danger Zone</h3>
                <p class="text-xs text-gray-400 mb-4">Deleting this survey request will permanently remove it and all uploaded images from the server.</p>
                <form action="{{ route('admin.survey-request.destroy', $surveyRequest->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this survey request?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl py-2.5 text-sm font-semibold hover:bg-red-500 hover:text-white transition">
                        Delete Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
```

- [ ] **Step 3: Run test to verify it passes**

Run: `php artisan test --filter=AdminSurveyRequestTest`
Expected: PASS

- [ ] **Step 4: Commit**

```bash
git add resources/views/admin/survey-request/index.blade.php resources/views/admin/survey-request/show.blade.php
git commit -m "feat: add survey request administrative views

Co-Authored-By: Claude <noreply@anthropic.com>"
```
