<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [ProductController::class, 'HomeProduct'])->name('home');

Route::get('/Product', [ProductController::class, 'AllProduct'])->name('product');

Route::get('/Product/Detail/{slug}', [ProductController::class, 'ProductDetail'])->name('detail');
Route::get('/GetMoreProduct', [ProductController::class, 'GetMoreProduct'])->name('GetMoreProduct');
Route::get('/LiveSearchProduct/{k}', [ProductController::class, 'LiveSearchProduct'])->name('LiveSearchProduct');
Route::get('/Filter/{k}', [ProductController::class, 'LiveSearchProduct'])->name('LiveSearchProduct');

Route::get('/Cart', [CartController::class, 'index'])->name('cart');
Route::get('/AddToCart/{id}', [CartController::class, 'AddToCart'])->name('AddToCart');
Route::get('/BuyNow/{id}', [CartController::class, 'BuyNow'])->name('BuyNow');

Route::get('/UpdateQuantity/{type}/{id}', [CartController::class, 'UpdateQuantity'])->name('UpdateQuantity');
Route::post('/CheckOut', [CartController::class, 'CheckOut'])->name('CheckOut');
Route::GET('/CancelOrder/{id}', [OrderController::class, 'CancelOrder'])->name('CancelOrder');

Route::get('/Cart/CheckOut', [CartController::class, 'indexCheckout'])->name('checkout');
Route::post('/Province',[CartController::class,'getProvince'])->name('getProvince');
Route::post('/ShippingPrice',[CartController::class,'getShippingPrice'])->name('getShippingPrice');

Route::middleware('auth')->group(function (){
    Route::post('/Rating', [ProductController::class, 'Rating'])->name('Rating');
});

Route::get('/Auth/Login', [AuthController::class, 'Login'])->name('login');
Route::get('/Auth/Register', [AuthController::class, 'Register'])->name('register');

Route::post('/Auth/Login', [AuthController::class, 'LoginUser'])->name('loginUser');
Route::post('/Auth/Register', [AuthController::class, 'RegisterUser'])->name('registerUser');
Route::get('/Auth/Logout', [AuthController::class, 'Logout']);

Route::prefix('User')->group(function () {
    Route::get('/Profile', [UserController::class, 'UserProfile'])->name('profile');

    Route::get('/Order', [OrderController::class, 'index'])->name('orders');

    Route::get('/ChangePassword', [UserController::class, 'ChangePassword'])->name('changePassword');
    Route::post('/ProcessChangePassword', [UserController::class, 'ProcessChangePassword'])->name('ProcessChangePassword');
});

Route::get('/FlashSale', function () {
    return view('flashsale',['title' => 'Flash Sale']);
})->name('flashSale');

Route::get('/About', function (Request $request) {
    $meta_keyword = '';
    $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
    $meta_url = $request->url();
    return view('about',['title' => 'Về Chúng Tôi'])->with(compact('meta_keyword', 'meta_description', 'meta_url'));
})->name('About');

Route::get('/FAQ', function (Request $request) {
    $meta_keyword = '';
    $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
    $meta_url = $request->url();
    return view('FAQ',['title' => 'FAQ'])->with(compact('meta_keyword', 'meta_description', 'meta_url'));
})->name('FAQ');

Route::get('/Success', function (Request $request) {
    $meta_keyword = '';
    $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
    $meta_url = $request->url();
    return view('paymentsuccess',['title' => 'Thanh toán thành công'])->with(compact('meta_keyword', 'meta_description', 'meta_url'));
})->name('paymentsuccess');


Route::get('QuanTri/Login',[LoginController::class, 'Login'])->name('admin.Login');
Route::post('QuanTri/Login',[LoginController::class, 'processLogin'])->name('admin.processLogin');

Route::prefix('QuanTri')->group(function (){
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/Categories',[AdminController::class, 'Categories'])->name('admin.categories');

    Route::get('/AddCategories',[CategoryController::class, 'AddCategories'])->name('admin.addCategories');
    Route::post('/AddCategories',[CategoryController::class, 'processAddCategories'])->name('admin.processAddCategories');
    Route::get('/EditCategories/{id}',[CategoryController::class, 'EditCategories'])->name('admin.EditCategories');
    Route::put('/ProcessEditCategories/{id}',[CategoryController::class, 'processEditCategories'])->name('admin.processEditCategories');
    Route::get('/DeleteCategories/{id}',[CategoryController::class, 'DeleteCategories'])->name('admin.DeleteCategories');

    Route::get('/Orders',[AdminController::class, 'Orders'])->name('admin.orders');
    Route::get('/Orders/{id}',[\App\Http\Controllers\Admin\OrderController::class, 'OrderProduct'])->name('admin.orderproduct');
    Route::put('/UpdateStatus',[\App\Http\Controllers\Admin\OrderController::class, 'UpdateStatus'])->name('admin.updateStatus');

    Route::get('/Users',[AdminController::class, 'Users'])->name('admin.users');

    Route::get('/Products',[AdminController::class, 'Products'])->name('admin.products');
    Route::get('/TrashProducts',[AdminController::class, 'TrashProducts'])->name('admin.TrashProducts');

    Route::get('/AddProducts',[\App\Http\Controllers\Admin\ProductController::class, 'AddProducts'])->name('admin.addProducts');
    Route::post('/ProcessAddProducts',[\App\Http\Controllers\Admin\ProductController::class, 'ProcessAddProducts'])->name('admin.processAddProducts');
    Route::get('/EditProducts/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'EditProducts'])->name('admin.editProducts');
    Route::put('/ProcessEditProducts/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'ProcessEditProducts'])->name('admin.processEditProducts');
    Route::get('/DeleteProduct/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'DeleteProduct'])->name('admin.DeleteProduct');
    Route::get('/RestoreProduct/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'RestoreProduct'])->name('admin.RestoreProduct');
    Route::get('/DeleteProductForever/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'DeleteProductForever'])->name('admin.DeleteProductForever');

    Route::get('/ShippingPrice',[AdminController::class, 'ShippingPrice'])->name('admin.ShippingPrice');

    Route::get('/AddShippingPrice',[DeliveryController::class, 'AddShippingPrice'])->name('admin.AddShippingPrice');
    Route::post('/processAddShippingPrice',[DeliveryController::class, 'processAddShippingPrice'])->name('admin.processAddShippingPrice');
    Route::get('/EditShippingPrice/{id}',[DeliveryController::class, 'EditShippingPrice'])->name('admin.EditShippingPrice');
    Route::put('/ProcessEditShippingPrice/{id}',[DeliveryController::class, 'ProcessEditShippingPrice'])->name('admin.processEditShippingPrice');
    Route::get('/DeleteShippingPrice/{id}',[DeliveryController::class, 'DeleteShippingPrice'])->name('admin.DeleteShippingPrice');
    Route::get('/Logout',[AdminController::class, 'Logout'])->name('admin.Logout');


    Route::get('/Banner',[AdminController::class, 'Banner'])->name('admin.Banner');

    Route::get('/AddBanner',[BannerController::class, 'AddBanner'])->name('admin.AddBanner');
    Route::post('/processAddBanner',[BannerController::class, 'processAddBanner'])->name('admin.processAddBanner');
    Route::get('/EditBanner/{id}',[BannerController::class, 'EditBanner'])->name('admin.EditBanner');
    Route::put('/ProcessEditBanner/{id}',[BannerController::class, 'ProcessEditBanner'])->name('admin.processEditBanner');
    Route::get('/DeleteBanner/{id}',[BannerController::class, 'DeleteBanner'])->name('admin.DeleteBanner');
});
