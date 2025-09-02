<?php

use App\Http\Middleware\CheckUserLevel;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InstansiExports;
use App\Exports\EquipmentExports;
use App\Instansi;
use App\User;
use App\Equipment;


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

/**
 * Route::view('/check-view', 'email.guest-request');
 */


Auth::routes(['register' => false]);
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::middleware(['auth', 'check.user.level'])->group(function () {
    // Brand Route
    Route::get('/brand', 'BrandController@index');
    Route::post('/store-brand', 'BrandController@store');
    Route::delete('/delete-brand/{id}', 'BrandController@delete')->name('destroy.brand');
    Route::get('/edit-brand/{id}', 'BrandController@edit')->name('edit.brand');
    Route::post('/update-brand/{id}', 'BrandController@update')->name('update.brand');

    // Category Route
    Route::get('/categories', 'CategoryController@index');
    Route::post('/store-categories', 'CategoryController@store');
    Route::delete('/delete-categories/{id}', 'CategoryController@delete')->name('destroy.category');
    Route::get('/edit-category/{id}', 'CategoryController@edit')->name('edit.category');
    Route::post('/update-category/{id}', 'CategoryController@update')->name('update.category');


    // instansi Management Route
    Route::get('/create-instansi', 'InstansiConntroller@create');
    Route::get('/edit-instansi/{slug}', 'InstansiConntroller@edit');
    Route::put('/update-instansi/{id}', 'InstansiConntroller@update');
    Route::post('/store-instansi', 'InstansiConntroller@store');
    Route::delete('/destory-instansi/{id}', 'InstansiConntroller@delete')->name('destroy.instansi');

    // User Management Route
    Route::get('/request-store-user/{id}', 'UserController@acceptMember')->name('approve');
    Route::get('/request-destroy-user/{id}', 'UserController@rejectMember')->name('reject');
    Route::get('/create-user', 'UserController@create');
    Route::get('/edit-user/{slug}', 'UserController@edit');
    Route::put('/update-user/{id}', 'UserController@update');
    Route::post('/store-user', 'UserController@store')->name('store.user');
    Route::delete('/destory-user/{id}', 'UserController@delete')->name('destroy.user');

    // from survey
    Route::get('/penambahan-alat-survey/{slug}', 'EquipmentController@surveyAdd')->name('add-survey.tools');
    Route::post('/store-survey-alat/{id}', 'EquipmentController@surveyStore')->name('store-survey.tools');
    Route::get('/add-pic/{slug}', 'UserController@addPIC')->name('surveyor.data.add');
    Route::post('/store-data-pic', 'UserController@storePIC')->name('surveyor.data.store');
    Route::get('/surveyor/create-data', 'InstansiConntroller@createDataSurvey')->name('survey.creat-data');
    Route::post('/create-new-data/surveyor', 'InstansiConntroller@storeDataSurvey')->name('survey.store-data');
    


    // Booking Management Route
    Route::put('/store-hasil/{slug}', 'BookingController@update');
    Route::post('/store-second-hasil', 'BookingController@updateTwo');
    Route::post('/store-booking/{slug}', 'BookingController@store');
    Route::get('/set-booking/{slug}', 'BookingController@create');
    Route::get('/input-hasil-kunjungan/{slug}', 'BookingController@detail');
    Route::get('/hasil-kunjungan/{slug}', 'BookingController@detailTwo');

    // perlatan route
    Route::post('/store-equipment', 'EquipmentController@store');
    Route::get('/create-equipment', 'EquipmentController@create');
    Route::get('/edit-equipment/{slug}', 'EquipmentController@edit');
    Route::put('/update-equipment/{id}', 'EquipmentController@update');
    Route::put('/update-warranty/{slug}', 'EquipmentController@updateWarranty');
    Route::delete('/delete-equipment/{id}', 'EquipmentController@delete')->name('destroy.tools');

    // information route
    Route::post('/store-infomation', 'InformasiController@store');
    Route::delete('/delete-infomation/{id}', 'InformasiController@delete')->name('destroy.information');

    // Product Route
    Route::get('/product', 'ProductController@index');
    Route::get('/edit-product/{slug}', 'ProductController@edit');
    Route::get('/detail-product/{slug}', 'ProductController@detail');
    Route::put('/update-product/{id}', 'ProductController@update');
    Route::post('/store-product', 'ProductController@store');
    Route::post('/import-products', 'ProductController@import')->name('import.products');
    Route::delete('/delete-product/{id}', 'ProductController@delete')->name('destroy.product');

});

// START INTANSI EXCEL
Route::get('/download-instansi-special', function () {
    $idpic = User::whereNotNull('id_instansi')->get();
    $instansi = Instansi::whereIn('id', $idpic->pluck('id_instansi')->all())->get();

    return Excel::download(new InstansiExports($instansi), 'Instansi Special Data.xlsx');
})->name('download.instansi-special');

Route::get('/download-instansi-excel', function () {
    $instansi = Instansi::all();

    return Excel::download(new InstansiExports($instansi), 'Data Instansi.xlsx');
})->name('download.excel');
// END EXCEL INSTANSI

// START EQUIPMENT EXCEL
Route::get('/download-peralatan-general', function () {
    $equipment = null;
    $instansi = null;
    $user = Auth::user();

    $departemenUser = Auth::user()->departement;
    $userAuth = Auth::user()->id_instansi;
    
    if (Auth::user()->level == 'pic' && (Auth::user()->departement == 'Purcashing' || Auth::user()->departement == 'IPS-RS')) {
        $equipment = Equipment::where('id_instansi', $userAuth)->get();
        $instansi = Instansi::where('id', Auth::user()->id_instansi)->first();
        
    } else if (Auth::user()->level == 'pic' && $departemenUser) {
        $equipment = Equipment::where('id_instansi', $userAuth)
        ->where('departement', $departemenUser)
        ->get();
        $instansi = Instansi::where('id', Auth::user()->id_instansi)->first();
    } else {
        $equipment = Equipment::all();
    }

    return Excel::download(new EquipmentExports($equipment), 'Data Peralatan Rumah Sakit.xlsx');
})->name('download.equipment');

Route::get('/download-peralatan-garansi', function () {
    $equipment = Equipment::where('warranty_state', 'true')->get();

    return Excel::download(new EquipmentExports($equipment), 'Data Perlatan Bergaransi Rumah Sakit.xlsx');
})->name('download.special-equipment');
// END EQUIPMENT EXCEL


// guest Route
Route::get('/', 'GuestController@greeting');
Route::get('/spare-part', 'GuestController@viewPart');
Route::post('/store-request-service', 'GuestController@storeRequestPart');
Route::post('/store-request-member', 'GuestController@requestMember');
Route::get('/request-as-member', 'GuestController@createRequestMember');
Route::get('/layanan-kami/{slug}', 'GuestController@about');
Route::get('/our-product/{slug}', 'GuestController@dataProduct')->name('our-product.show');
Route::get('/our-product', 'GuestController@product');
Route::get('/spare-part/{name}', 'GuestController@detailAlat');
Route::post('/submit-reques-part/{name}', 'GuestController@requestPart')->name('submit.request.part');
Route::get('/kontak', 'GuestController@contact');

// User Route
Route::get('/user-member', 'UserController@index');
Route::get('/profile-user/{slug}', 'UserController@profile');
Route::get('/request-user', 'UserController@request');

// instansi(rumahsakit) Route
Route::get('/instansi', 'InstansiConntroller@index');
Route::get('/detail-instansi/{slug}', 'InstansiConntroller@detail');
Route::post('/import-instansi', 'InstansiConntroller@import')->name('import.instansi');

// Route Print PDF
Route::get('/print-detail-alat/{slug}', 'PrintController@detailAlat');
Route::get('/print/tools', 'PrintController@asDepartment')->name('print.tools');

// estimasi route {{route('estimate.store')}}
Route::get('/estimasi-biaya', 'EstimasiController@index');
Route::get('/estimasi-biaya/peralatan/{slug}', 'EstimasiController@create');
Route::post('/store-estimasi-biaya', 'EstimasiController@store');

// jadwal booking route
Route::get('/jadwal-kedatangan', 'BookingController@index');
Route::get('/detail-kunjungan/{slug}', 'BookingController@show');


// Perlatan (Rumah Sakit) Route
Route::get('/barang-rumah-sakit', 'EquipmentController@index');
Route::get('/detail-equipment/{slug}', 'EquipmentController@detail');
Route::post('/send-warranty-notification/{slug}', 'EquipmentController@sendNotification');


// Spare Part Route
Route::get('/part', 'SparePartController@index');
Route::get('/edit-part/{id}', 'SparePartController@edit');
Route::put('/update-part/{id}', 'SparePartController@update');
Route::post('/store-part', 'SparePartController@store');
Route::delete('/delete-part/{id}', 'SparePartController@delete')->name('destroy.part');


// information Route
Route::get('/information', 'InformasiController@index');
Route::get('/information/{slug}', 'InformasiController@detail')->name('information.detail');

// Pengajuan (submission) Route
Route::get('/pengajuan', 'SubmissionController@index');
Route::get('/buat-pengajuan/{slug}', 'SubmissionController@create');
Route::get('/progress/{slug}', 'SubmissionController@detail');
Route::post('/store-pengajuan', 'SubmissionController@store')->name('pengajuan.store');
Route::put('/update-pengajuan/{id}', 'SubmissionController@update')->name('pengajuan.update');

// Progress Route
Route::put('/progress/{id}', 'ProgressController@update')->name('progress.update');
Route::post('/add-progress', 'ProgressController@store')->name('progress.store');
Route::post('/uploud-bukti-pembayaran/{id}', 'ProgressController@payment');

// Status Routw
Route::get('/status', 'StatusController@index');
// Archive Route
Route::get('/archive', 'ArchiveController@index');