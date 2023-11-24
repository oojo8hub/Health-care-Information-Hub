<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guide\CategoryController;
use App\Http\Controllers\Guide\GuideController;
use App\Http\Controllers\MyGuideController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NurseApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\ShowCategories;
use App\Http\Livewire\ShowContacts;
use App\Http\Livewire\ShowGuides;
use App\Http\Livewire\ShowNurses;
use App\Http\Livewire\ShowPermissions;
use App\Http\Livewire\ShowRoles;
use App\Http\Livewire\ShowTopics;
use App\Http\Livewire\ShowUsers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'show']);

Route::get('/about', function () {
    return view('about');
})->name('about');

/**
 * Login user
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/nurse/create', [NurseApplicationController::class, 'create'])->name('nurse.create');
    Route::post('/nurse', [NurseApplicationController::class, 'store'])->name('nurse.store');
    Route::get('/nurse/edit/{id}', [NurseApplicationController::class, 'edit'])->name('nurse.edit');
    Route::patch('/nurse/{id}', [NurseApplicationController::class, 'update'])->name('nurse.update');
});

/**
 * Categories management
 */
Route::middleware(['auth', 'permission:edit categories'])->group(function () {
    Route::get('/admin/categories', ShowCategories::class)->name('admin_category.index');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category.edit');
    Route::patch('/admin/category/{id}', [AdminCategoryController::class, 'update'])->name('admin_category.update');
});

Route::middleware(['auth', 'permission:create categories'])->group(function () {
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category.create');
    Route::post('/admin/category', [AdminCategoryController::class, 'store'])->name('admin_category.store');
});

/**
 * Permissions management
 */
Route::middleware(['auth', 'permission:edit permissions'])->group(function () {
    Route::get('/admin/permissions', ShowPermissions::class)->name('permission.index');
    Route::get('/admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
});

/**
 * Roles management
 */
Route::middleware(['auth', 'permission:edit roles'])->group(function () {
    Route::get('/admin/roles', ShowRoles::class)->name('role.index');
    Route::get('/admin/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
});

Route::middleware(['auth', 'permission:create roles'])->group(function () {
    Route::get('/admin/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/admin/role', [RoleController::class, 'store'])->name('role.store');
});

/**
 * Users Management
 */
Route::middleware(['auth', 'permission:edit users'])->group(function () {
    Route::get('/admin/users', ShowUsers::class)->name('user.index');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
});

/**
 * Nurses Management
 */
Route::middleware(['auth', 'permission:edit nurses'])->group(function () {
    Route::get('/admin/nurses', ShowNurses::class)->name('admin_nurse.index');
    Route::get('/admin/nurse/edit/{id}', [NurseController::class, 'edit'])->name('admin_nurse.edit');
    Route::patch('/admin/nurse/{id}', [NurseController::class, 'update'])->name('admin_nurse.update');
});


/**
 * Guides management
 */
Route::middleware('auth', 'permission:edit guides')->group(function () {
    Route::get('/guides', ShowGuides::class)->name('guide.index');
});

Route::middleware('auth', 'permission:create guides')->group(function () {
    Route::get('/me/guides', [MyGuideController::class, 'index'])->name('me.guide');
    Route::delete('/me/guides/{guide}', [MyGuideController::class, 'destroy'])->name('me.guide.destroy');

    Route::get('/guide/create', [GuideController::class, 'create'])->name('guide.create');
    Route::post('/guide', [GuideController::class, 'store'])->name('guide.store');
});

Route::middleware('auth', 'permission:create guides|edit guides')->group(function () {
    Route::get('/guide/edit/{slug}', [GuideController::class, 'edit'])->name('guide.edit');
    Route::patch('/guide/{slug}', [GuideController::class, 'update'])->name('guide.update');
});

/**
 * Notification
 */
Route::middleware('auth', 'permission:publish guides|edit nurses|edit messages')->group(function () {
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::patch('/notification/{id}', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');
    Route::post('/notification/markAllRead', [NotificationController::class, 'markAllRead'])->name('notification.markAllRead');
});

/**
 * Messages
 */
Route::middleware('auth', 'permission:edit messages')->group(function () {
    Route::get('/admin/messages', ShowContacts::class)->name('contact.index');
    Route::get('/admin/message/{id}', [ContactController::class, 'show'])->name('contact.show');
});


/**
 * visitors
 */

Route::get('/a-to-z-guides', ShowTopics::class)->name('A-Z-guide.index');
Route::get('/guide/{slug}', [GuideController::class, 'show'])->name('guide.show');

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');

Route::get('/search', [DashboardController::class, 'search'])->name('global.search');
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

require __DIR__ . '/auth.php';
