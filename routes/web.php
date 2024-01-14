<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [AdminController::class, "dashboard"])->name("dashboard")->middleware('auth', 'is_user');

Route::get('/category', [AdminController::class, "view_category"])->name("category")->middleware('auth', 'is_user');

Route::get('/product', [AdminController::class, "view_product"])->name("product")->middleware('auth', 'is_user');

Route::post('/postProduct', [AdminController::class, "post_product"])->name("postProduct")->middleware('auth', 'is_user');

Route::get('/showProduct', [AdminController::class, "show_product"])->name("show_product")->middleware('auth', 'is_user');

Route::post('/postCategory', [AdminController::class, "post_category"])->name("postCategory")->middleware('auth', 'is_user');

Route::get('/deleteCategory/{id}', [AdminController::class, "delete_category"])->name("deleteCategory")->middleware('auth', 'is_user');

Route::get('/deleteProduct/{id}', [AdminController::class, "delete_product"])->name("deleteProduct")->middleware('auth', 'is_user');

Route::get('/updateProduct/{id}', [AdminController::class, "update_product"])->name("updateProduct")->middleware('auth', 'is_user');

Route::post('/changeProduct/{id}', [AdminController::class, "save_change_product"])->name("changeProduct")->middleware('auth', 'is_user');

Route::get('/order', [AdminController::class, "view_order"])->name("order")->middleware('auth', 'is_user');

Route::get('/delivered/{id}', [AdminController::class, "delivered"])->name("delivered")->middleware('auth', 'is_user');

Route::get('/printPDF/{id}', [AdminController::class, "print_PDF"])->name("printPDF")->middleware('auth', 'is_user');

Route::get('/searchOrder', [AdminController::class, "search_order"])->name("searchOrder")->middleware('auth', 'is_user');

Route::get('/searchProductAdmin', [AdminController::class, "search_product"])->name("searchProductAdmin")->middleware('auth', 'is_user');

Route::get('/searchContact', [AdminController::class, "search_contact"])->name("searchContact")->middleware('auth', 'is_user');

Route::get('/showContact', [AdminController::class, "show_contact"])->name("show_contact")->middleware('auth', 'is_user');

Route::get('/deleteContact/{id}', [AdminController::class, "delete_contact"])->name("deleteContact")->middleware('auth', 'is_user');

Route::get('/sendEmail/{id}', [AdminController::class, "send_email_page"])->name("sendEmail")->middleware('auth', 'is_user');

Route::post('/postEmail', [AdminController::class, "send_email_to_customer"])->name("postEmail")->middleware('auth', 'is_user');





Route::get('/', [HomeController::class, "index"])->name("index")->middleware('is_admin');

Route::get('/detailProduct/{id}', [HomeController::class, "detail_product"])->name("detailProduct")->middleware('auth', 'is_admin');

Route::post('/addCart/{id}', [HomeController::class, "add_cart"])->name("add_cart")->middleware('auth', 'is_admin');

Route::get('/showCart', [HomeController::class, "show_cart"])->name("showCart")->middleware('auth', 'is_admin');

Route::get('/deleteCart/{id}', [HomeController::class, "delete_cart"])->name("deleteCart")->middleware('auth', 'is_admin');

Route::get('/cashOrder', [HomeController::class, "cash_order"])->name("cashOrder")->middleware('auth', 'is_admin');

Route::get('/showOrder', [HomeController::class, "show_order"])->name("showOrder")->middleware('auth', 'is_admin');

Route::get('/cancelOrder/{id}', [HomeController::class, "cancel_order"])->name("cancelOrder")->middleware('auth', 'is_admin');

Route::get('/productPage', [HomeController::class, "product_page"])->name("productPage")->middleware('auth', 'is_admin');

Route::get('/searchProduct', [HomeController::class, "search_product"])->name("searchProduct")->middleware('is_admin');

Route::get('/about', [HomeController::class, "about_page"])->name("about")->middleware('is_admin');

Route::get('/blog', [HomeController::class, "blog_page"])->name("blog")->middleware('is_admin');

Route::get('/contact', [HomeController::class, "contact_page"])->name("contact")->middleware('is_admin');

Route::get('/testimonial', [HomeController::class, "testimonial_page"])->name("testimonial")->middleware('is_admin');

Route::post('/discountOffer', [HomeController::class, "discount_offer"])->name("discount_offer")->middleware('is_admin');

Route::post('/send-contact-email', [HomeController::class, "send_contact_email"])->name("sendContactEmail")->middleware('is_admin');

Route::get('/stripe/{totalprice}', [StripePaymentController::class, "payment_stripe"])->name("paymentstripe")->middleware('auth', 'is_admin');

Route::post('/postStripe/{totalprice}', [StripePaymentController::class, "post_payment_stripe"])->name("postpaymentstripe")->middleware('auth', 'is_admin');

Route::resource("/student", CustomAuthController::class);

Route::get("/home", [CustomAuthController::class, "home"]);

Route::get("/login", [CustomAuthController::class, "indexlogin"])->name("login")->middleware('is_login');

Route::get("/register", [CustomAuthController::class, "signup"])->name("register")->middleware('is_login');

Route::get("/logout", [CustomAuthController::class, "logout"])->name("logout");

Route::post("/postLogin", [CustomAuthController::class, "login"])->name("postLogin")->middleware('is_login');

Route::post("/postRegister", [CustomAuthController::class, "register"])->name("postRegister")->middleware('is_login');

Route::get("/forgot-password", [CustomAuthController::class, "forgot"])->name("forgot-password")->middleware('is_login');

Route::post("/forgot-password", [CustomAuthController::class, "postforgot"])->name("forgot-password")->middleware('is_login');

Route::get("/reset-password/{token}", [CustomAuthController::class, "resetpassword"])->middleware('is_login');

Route::post("/reset-password", [CustomAuthController::class, "postresetpassword"])->middleware('is_login');

Route::get('/paypal-payment/{totalprice}', [PaypalController::class, "charge"])->name("paypalPayment")->middleware('auth', 'is_admin');

Route::get('/momo-payment/{totalprice}', [MomoController::class, "atm"])->name("momoPayment")->middleware('auth', 'is_admin');

Route::get('/success', [PaypalController::class, "success"])->name("success")->middleware('auth', 'is_admin');

Route::get('/momo-success', [MomoController::class, "momoSuccess"])->name("momoSuccess")->middleware('auth', 'is_admin');

Route::get('/error', [PaypalController::class, "error"])->name("error")->middleware('auth', 'is_admin');