<?php

use Illuminate\Support\Facades\Route;


//  Route::get('/ftelecom', function () {
//      // $ds=san_pham::all();
//      return view('Template');
//  });
Route::get('/ftelecom', [App\Http\Controllers\TemplateController::class,'template']);
// Route::get('/products/{id}', [App\Http\Controllers\TemplateController::class,'template']);
Route::get('/products/{id}', [App\Http\Controllers\TemplateController::class,'products'])->name("products");

Route::get('/product_detail/{id}', [App\Http\Controllers\TemplateController::class,'product_detail'])->name("product_detail");

Route::get('/admin/sanphamadmin', [App\Http\Controllers\AdminController::class,'sanphamadmin'])->name("sanpham_admin");

Route::get('/admin/sanpham/{id}/edit', [App\Http\Controllers\AdminController::class, 'editSanPham'])->name('sanpham.edit');

Route::put('/admin/sanpham/{id}', [App\Http\Controllers\AdminController::class, 'updateSanPham'])->name('sanpham.update');

Route::get('/admin/deletesanpham/{id}', [App\Http\Controllers\AdminController::class, 'deleteSanPham'])->name('delete_sanpham');

Route::get('/admin/createsanpham', [App\Http\Controllers\AdminController::class, 'showCreateSanPhamForm'])->name('create_sanpham_form');

Route::post('/admin/createsanpham', [App\Http\Controllers\AdminController::class, 'createSanPham'])->name('create_sanpham');

Route::get('/timkiemsanpham', [App\Http\Controllers\AdminController::class, 'timKiemSanPham'])->name('timkiem_sanpham');

Route::get('/admin/billban', [App\Http\Controllers\HoadonbanController::class, 'danhsach_hoadon'])->name('danhsach_hoadon');

Route::get('/admin/createbillban', [App\Http\Controllers\HoadonbanController::class, 'showCreateHDBForm'])->name('create_hdb_form');

Route::post('/admin/createbillban', [App\Http\Controllers\HoadonbanController::class, 'createBillBan'])->name('create_bill_ban');


















//Route::get('/ftelecom', [App\Http\Controllers\TemplateController::class,'dropdown'])->name("home.template");
// Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name("home.index");
// Route::get('/home', function () {
//     // $ds=san_pham::limit(8)->get();
//     $ds=san_pham::all();

//     // dd('hello');
//     // $loaisp = loai_sp::all();
//     // return view('index',['sanpham'=>$ds, 'loaisanpham'=>$loaisp]);
//     // return view($ds);
// });
//Route::get('/products', 'ProductController@index');