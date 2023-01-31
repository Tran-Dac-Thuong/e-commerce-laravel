<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class, "dashboard"])->name("dashboard");

Route::get('/category', [AdminController::class, "view_category"])->name("category");

Route::get('/product', [AdminController::class, "view_product"])->name("product");

Route::post('/postProduct', [AdminController::class, "post_product"])->name("postProduct");

Route::get('/showProduct', [AdminController::class, "show_product"])->name("show_product");

Route::post('/postCategory', [AdminController::class, "post_category"])->name("postCategory");

Route::get('/deleteCategory/{id}', [AdminController::class, "delete_category"])->name("deleteCategory");

Route::get('/deleteProduct/{id}', [AdminController::class, "delete_product"])->name("deleteProduct");

Route::get('/updateProduct/{id}', [AdminController::class, "update_product"])->name("updateProduct");

Route::post('/changeProduct/{id}', [AdminController::class, "save_change_product"])->name("changeProduct");

Route::get('/order', [AdminController::class, "view_order"])->name("order");

Route::get('/delivered/{id}', [AdminController::class, "delivered"])->name("delivered");

Route::get('/printPDF/{id}', [AdminController::class, "print_PDF"])->name("printPDF");

Route::get('/search', [AdminController::class, "search_data"])->name("search");

Route::get('/', [HomeController::class, "index"])->name("index");

Route::get('/detailProduct/{id}', [HomeController::class, "detail_product"])->name("detailProduct");

Route::post('/addCart/{id}', [HomeController::class, "add_cart"])->name("add_cart");

Route::get('/showCart', [HomeController::class, "show_cart"])->name("showCart");

Route::get('/deleteCart/{id}', [HomeController::class, "delete_cart"])->name("deleteCart");

Route::get('/cashOrder', [HomeController::class, "cash_order"])->name("cashOrder");

Route::get('/showOrder', [HomeController::class, "show_order"])->name("showOrder");

Route::get('/cancelOrder/{id}', [HomeController::class, "cancel_order"])->name("cancelOrder");

Route::get('/productPage', [HomeController::class, "product_page"])->name("productPage");

Route::get('/searchProduct', [HomeController::class, "search_product"])->name("searchProduct");

Route::get('/about', [HomeController::class, "about_page"])->name("about");

Route::get('/blog', [HomeController::class, "blog_page"])->name("blog");

Route::get('/contact', [HomeController::class, "contact_page"])->name("contact");

Route::get('/testimonial', [HomeController::class, "testimonial_page"])->name("testimonial");

Route::get('/discountOffer', [HomeController::class, "discount_offer"])->name("discount_offer");

Route::get('/send-contact-email', [HomeController::class, "send_contact_email"])->name("sendContactEmail");

Route::get('/stripe/{totalprice}', [StripePaymentController::class, "payment_stripe"])->name("paymentstripe");

Route::post('/postStripe/{totalprice}', [StripePaymentController::class, "post_payment_stripe"])->name("postpaymentstripe");

Route::resource("/student", CustomAuthController::class);

Route::get("/home", [CustomAuthController::class, "home"]);

Route::get("/login", [CustomAuthController::class, "indexlogin"])->name("login");

Route::get("/register", [CustomAuthController::class, "signup"])->name("register");

Route::get("/logout", [CustomAuthController::class, "logout"])->name("logout");

Route::post("/postLogin", [CustomAuthController::class, "login"])->name("postLogin");

Route::post("/postRegister", [CustomAuthController::class, "register"])->name("postRegister");

Route::get("/forgot-password", [CustomAuthController::class, "forgot"])->name("forgot-password");

Route::post("/forgot-password", [CustomAuthController::class, "postforgot"])->name("forgot-password");

Route::get("/reset-password/{token}", [CustomAuthController::class, "resetpassword"]);

Route::post("/reset-password", [CustomAuthController::class, "postresetpassword"]);
