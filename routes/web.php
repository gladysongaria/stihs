<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Home\ItemController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\ItemInstanceController;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\IndividualListController;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    //CategoryController
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::resource('category', CategoryController::class);
    });

    //ItemController
    Route::controller(ItemController::class)->prefix('item')->group(function () {
        Route::resource('item', ItemController::class);
        Route::put('/endorse/{id}/item', 'endorse')->name('item.endorse');
        Route::post('/get-teachers-in-charge/item', 'getTeachersInCharge')->name('item.getTeachersInCharge');

    });

    //ItemInstanceController
    Route::controller(ItemInstanceController::class)->prefix('instance')->group(function () {
        // Route::resource('instance', ItemInstanceController::class);
        Route::get('/instance/{id}', 'index')->name('instance.index');
        Route::put('/instance/{id}', 'update')->name('instance.update');
        Route::delete('/instance/{id}', 'destroy')->name('instance.destroy');
        Route::put('/endorse/{id}/instance', 'endorse')->name('instance.endorse');
        // Route::get('/instance/scan', 'scan')->name('scan.barcode');
    });

    //UsersProfileController
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::resource('user', UserController::class);
    });

    //ProfileController
    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::resource('profile', ProfileController::class);
    });

    //DepartmentController
    Route::controller(DepartmentController::class)->prefix('department')->group(function () {
        Route::resource('department', DepartmentController::class);
    });

    //FacilitiesController
    Route::controller(FacilityController::class)->prefix('facility')->group(function () {
        Route::resource('facility', FacilityController::class);
    });

    //RoomController
    Route::controller(RoomController::class)->prefix('room')->group(function () {
        Route::resource('room', RoomController::class);
        Route::post('rooms', 'getTeachersInCharge')->name('room.getTeachersInCharge');
    });

    //SourceController
    Route::controller(SourceController::class)->prefix('source')->group(function () {
        Route::resource('source', SourceController::class);
        Route::get('sourceAcquisition', 'sourceAcquisition')->name('source.acquisition');
    });

    //InventoryController
    Route::controller(InventoryController::class)->prefix('inventory')->group(function () {
        Route::resource('inventory', InventoryController::class);
    });

    //IndividualController
    Route::controller(IndividualController::class)->prefix('individual')->group(function () {
        Route::resource('individual', IndividualController::class);
        Route::put('/monitor/{id}', 'monitor')->name('individual.monitor');
    });

    //IndividualListController
    Route::controller(IndividualListController::class)->prefix('individualList')->group(function () {
        Route::resource('individualList', IndividualListController::class);
        Route::get('/individual/{id}/monitoring', 'print')->name('individual.print');
    });

    //FormController
    Route::controller(FormController::class)->prefix('form')->group(function () {
        Route::resource('form', FormController::class);
    });

    //ScanController
    Route::controller(ScanController::class)->prefix('scan')->group(function () {
        Route::resource('scan', ScanController::class);
        Route::post('/scan-barcode', 'scan')->name('scan.barcode');
    });
});

require __DIR__ . '/auth.php';
