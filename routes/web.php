<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|      Moved from the home page
*/

Route::get('/', function () {
    
   
    return view('auth.login');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices' , 'InvoicesController');
Route::resource('sections' , 'SectionsController');
Route::resource('products' , 'productsController');
Route::resource('InvoiceAttachmentses' , 'InvoiceAttachmentsesController');
Route::get('/section/{id}', 'InvoicesController@getproducts');
Route::get('/InvoicesDetailses/{id}', 'InvoicesDetailsesController@edit');
Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsesController@get_file');

Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsesController@open_file');

Route::post('delete_file', 'InvoicesDetailsesController@destroy')->name('delete_file');

Route::get('/edit_invoice/{id}', 'InvoicesController@edit');

Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');

Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

 Route::resource('Archive', 'ArchiveInvoicesController');

 Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');

 Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');

 Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');

Route::get('export_invoices', 'InvoicesController@export');

// Route::group(['middleware' => ['auth']], function() {

Route::resource('roles','RoleController');

Route::resource('users','UserController');


Route::get('/{page}', 'AdminController@index') ;







