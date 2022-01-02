<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RoomtypeController;
use \App\Http\Controllers\RoomController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\StaffDepartment;
use \App\Http\Controllers\StaffCotroller;
use \App\Http\Controllers\BookingController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\BannerController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
//Service Detail
Route::get('{id}/service-detail', [HomeController::class, 'service_detail'])->name('service_detail');
//Admin Dashboard
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');

//Login-Admin
Route::get('/formlogin', [AdminController::class, 'formLogin'])->name('form.login');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::prefix('roomtype')->group(function () {
        Route::get('/', [RoomtypeController::class, 'index'])->name('roomtype.index');
        Route::get('create', [RoomtypeController::class, 'create'])->name('roomtype.create');
        Route::post('store', [RoomtypeController::class, 'store'])->name('roomtype.store');
        Route::get('{id}/edit', [RoomtypeController::class, 'edit'])->name('roomtype.edit');
        Route::get('{id}/show', [RoomtypeController::class, 'show'])->name('roomtype.show');
        Route::get('{id}/destroy', [RoomtypeController::class, 'destroy'])->name('roomtype.destroy');
        Route::post('{id}/update', [RoomtypeController::class, 'update'])->name('roomtype.update');
    });
//    Room
    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('room.index');
        Route::get('create', [RoomController::class, 'create'])->name('room.create');
        Route::post('store', [RoomController::class, 'store'])->name('room.store');
        Route::get('{id}/edit', [RoomController::class, 'edit'])->name('room.edit');
        Route::get('{id}/show', [RoomController::class, 'show'])->name('room.show');
        Route::get('{id}/destroy', [RoomController::class, 'destroy'])->name('room.destroy');
        Route::post('{id}/update', [RoomController::class, 'update'])->name('room.update');
    });
//    Customer
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::get('{id}/show', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('{id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
        Route::post('{id}/update', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('formLogin', [CustomerController::class, 'formLogin'])->name('customer.formLogin');
//        Login Customer
        Route::post('login', [CustomerController::class, 'login'])->name('customer.login');
        Route::get('register', [CustomerController::class, 'register'])->name('customer.register');
        Route::get('logout', [CustomerController::class, 'logout'])->name('customer.logout');
//        Testimonial-Customer
        Route::get('add-testimonial', [HomeController::class, 'add_testimonial'])->name('customer.add-testimonial');
        Route::post('save-testimonial', [HomeController::class, 'save_testimonial'])->name('customer.save-testimonial');
    });
//    RoomType
    Route::prefix('roomtypeimage')->group(function () {
        Route::get('/destroyImage/{id}', [RoomtypeController::class, 'destroyImage'])->name('roomtype.destroyimage');
    });
//    Department
    Route::prefix('department')->group(function () {
        Route::get('/', [StaffDepartment::class, 'index'])->name('department.index');
        Route::get('create', [StaffDepartment::class, 'create'])->name('department.create');
        Route::post('store', [StaffDepartment::class, 'store'])->name('department.store');
        Route::get('{id}/edit', [StaffDepartment::class, 'edit'])->name('department.edit');
        Route::get('{id}/show', [StaffDepartment::class, 'show'])->name('department.show');
        Route::get('{id}/destroy', [StaffDepartment::class, 'destroy'])->name('department.destroy');
        Route::post('{id}/update', [StaffDepartment::class, 'update'])->name('department.update');
    });
    //    Staff
    Route::prefix('staff')->group(function () {
        Route::get('/', [StaffCotroller::class, 'index'])->name('staff.index');
        Route::get('create', [StaffCotroller::class, 'create'])->name('staff.create');
        Route::post('store', [StaffCotroller::class, 'store'])->name('staff.store');
        Route::get('{id}/edit', [StaffCotroller::class, 'edit'])->name('staff.edit');
        Route::get('{id}/show', [StaffCotroller::class, 'show'])->name('staff.show');
        Route::get('{id}/destroy', [StaffCotroller::class, 'destroy'])->name('staff.destroy');
        Route::post('{id}/update', [StaffCotroller::class, 'update'])->name('staff.update');
    });

//    Payment
    Route::prefix('staff/payment')->group(function () {
        Route::get('{id}', [StaffCotroller::class, 'all_payment'])->name('staff.all_payment');
        Route::get('{id}/add', [StaffCotroller::class, 'add_payment'])->name('staff.add_payment');
        Route::post('{id}save', [StaffCotroller::class, 'save_payment'])->name('staff.save_payment');
        Route::get('{id}{staff_id}/delete', [StaffCotroller::class, 'delete_payment'])->name('staff.delete_payment');
    });

//    Booking
    Route::prefix('booking')->group(function () {
        Route::get('/', [BookingController::class, 'front_booking'])->name('booking.front_booking');
        Route::get('/success', [BookingController::class, 'booking_payment_success'])->name('booking.booking_payment_success');
        Route::get('/fail', [BookingController::class, 'booking_payment_fail'])->name('booking.booking_payment_fail');
        Route::get('create', [BookingController::class, 'create'])->name('booking.create');
        Route::post('store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('history', [BookingController::class, 'index'])->name('booking.history');
        Route::get('{id}/destroy', [BookingController::class, 'destroy'])->name('booking.destroy');
        Route::get('available-rooms/{checkin_date}', [BookingController::class, 'available_rooms'])->name('booking.available');
    });

//    Service
    Route::prefix('service')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
        Route::get('{id}/show', [ServiceController::class, 'show'])->name('service.show');
        Route::get('{id}/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');
        Route::post('{id}/update', [ServiceController::class, 'update'])->name('service.update');
    });

    //Testimonial-Admin
    Route::prefix('testimonial')->group(function () {
        Route::get('/', [AdminController::class, 'testimonials'])->name('testimonial.index');
        Route::get('{id}/delete', [AdminController::class, 'delete_testimonials'])->name('testimonial.delete');
    });

//    Page
    Route::prefix('page')->group(function () {
        Route::get('about-us', [PageController::class, 'about_us'])->name('page.about');
        Route::get('contact', [PageController::class, 'contact_us'])->name('page.contact');
        Route::post('save-contact', [PageController::class, 'save_contactus'])->name('save-contact');
    });

    // Banner
    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::get('{id}/show', [BannerController::class, 'show'])->name('banner.show');
        Route::post('{id}/update', [BannerController::class, 'update'])->name('banner.update');
        Route::get('{id}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
    });


});
