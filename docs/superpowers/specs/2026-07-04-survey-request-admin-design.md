# Design Spec: Request Survey Admin Page and APIs

This document outlines the design specification for implementing the Request Survey module, database structures, admin panel page, and API endpoints.

## Context
The Rensa Katalog mobile application allows users to request a site survey. This survey requires a user to enter their name, survey address, contact number, and description of the room to be surveyed, plus upload one or more supporting images. A DP survey payment of 50,000 IDR is mentioned on the form.
On the administrative side, we need a way to view, manage, and update these requests.

## 1. Database Schema
We will create a migration to define two tables: `survey_requests` and `survey_request_images` to support multi-image uploads.

### Table: `survey_requests`
- `id` (bigint, primary key, auto-increment)
- `nama` (varchar(255))
- `alamat` (text)
- `kontak` (varchar(255))
- `ruangan` (text)
- `status` (enum: `'pending'`, `'scheduled'`, `'completed'`, `'cancelled'`; default `'pending'`)
- `dp_survey` (integer; defaults to `50000`)
- `created_at` (timestamp)
- `updated_at` (timestamp)

### Table: `survey_request_images`
- `id` (bigint, primary key, auto-increment)
- `survey_request_id` (foreign key referencing `survey_requests.id` on delete cascade)
- `foto` (varchar(255))
- `created_at` (timestamp)
- `updated_at` (timestamp)

## 2. Models
We will create:
- `App\Models\SurveyRequest`:
  - Fillable attributes: `['nama', 'alamat', 'kontak', 'ruangan', 'status', 'dp_survey']`.
  - Relationship: `images()` (hasMany `SurveyRequestImage`).
- `App\Models\SurveyRequestImage`:
  - Fillable attributes: `['survey_request_id', 'foto']`.
  - Relationship: `surveyRequest()` (belongsTo `SurveyRequest`).

## 3. API Endpoints
We will define a POST endpoint to receive survey requests from the mobile app.

### Endpoint: POST `/api/survey-requests`
- **Request Body (Multipart Form-Data):**
  - `nama`: String, required, max 255.
  - `alamat`: String, required.
  - `kontak`: String, required, max 255.
  - `ruangan`: String, required.
  - `images`: Array of files (images), optional. Max 5120KB per file.
- **Handling:**
  - Save the request details to `survey_requests`.
  - If images are present, store them in `public/survey-requests` storage and insert records in `survey_request_images`.
- **Response:**
  - Success: `201 Created` with JSON `{"success": true, "message": "Survey request submitted successfully", "data": {...}}`.

## 4. Admin Panel Layout & Pages
We will create:
- **Routes:**
  - `Route::resource('survey-request', AdminSurveyRequestController::class)->only(['index', 'show', 'update', 'destroy']);`
- **Sidebar Integration:**
  - Add a link to "Request Survey" with a document/clipboard icon in `sidebar.blade.php`.
- **Controller:**
  - `App\Http\Controllers\Admin\AdminSurveyRequestController`
- **Views:**
  - `resources/views/admin/survey-request/index.blade.php`: Table list of requests with pagination, search, status badge, and filter.
  - `resources/views/admin/survey-request/show.blade.php`: Detailed view showing survey request data, status update dropdown, and image gallery (with responsive design and grid).

## 5. Verification Plan
- Run tests on the POST API endpoint to submit a request with multiple images.
- Verify database entries for both tables.
- Visit `/admin/survey-request` in the admin panel to ensure the sidebar links correctly.
- Test changing status and deleting requests from the admin interface.
