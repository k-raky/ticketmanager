<?php

use App\Allocation;
use App\Http\Controllers\Admin\CommandesController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\AllocationController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Auth\DesktopPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Rawilk\Printing\Facades;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;



Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::middleware(['auth', 'desktop'])->group(function () {

Route::get('/imprimer','App\Http\Controllers\PrintersController@index')->name('imprimer');

Route::get('/logout', [LoginController::class, 'logout'] );

Route::get('/stats','App\Http\Controllers\Admin\StatsController@index')->name('admin.commandes.stats');

Route::get('/download/variantA/{commande_id}', [DownloadController::class, 'downloadVariantA'])->name('download.variantA');
Route::get('/download/variantB/{commande_id}', [DownloadController::class, 'downloadVariantB'])->name('download.variantB');
Route::get('/download/enveloppeDL/{commande_id}', [DownloadController::class, 'downloadEnveloppeDL'])->name('download.enveloppeDL');
Route::get('/download/enveloppeC7/{commande_id}', [DownloadController::class, 'downloadEnveloppeC7'])->name('download.enveloppeC7');
Route::get('/download/bonCommande/{commande_id}', [DownloadController::class, 'downloadBonCommande'])->name('download.bonCommande');
Route::get('/download/all/commande_id/{commande_id}/variant/{variant}', [DownloadController::class, 'downloadAll'])->name('download.all');

Route::get('/printers', [PrintController::class, 'listPrinters'])->name('printers');

Route::post('/print', [PrintController::class, 'print'])->name('print');

Route::get('/bon', [DownloadController::class, 'bon'])->name('bon');


});

Route::middleware(['auth'])->group(function () {
    Route::get('login_desktop', [DesktopPasswordController::class, 'index'])->name('login_desktop');
    Route::post('verifyPassword', [DesktopPasswordController::class, 'verifyPassword'])->name('verifyPassword');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'desktop']], function () {
    Route::redirect('/', '/login')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Assets
    Route::delete('assets/destroy', 'AssetsController@massDestroy')->name('assets.massDestroy');
    Route::resource('assets', 'AssetsController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');

    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    Route::delete('commandes/destroy', 'CommandesController@massDestroy')->name('commandes.massDestroy');
    Route::resource('commandes', 'CommandesController');

    Route::resource('allocations', 'AllocationController');
    Route::get('allocation/remove', [AllocationController::class, 'remove'])->name('allocations.remove');
    Route::get('/allocate', [AllocationController::class, 'store'])->name('allocate');

    // Stocks
    Route::delete('stocks/destroy', 'StocksController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StocksController')->only(['index', 'show']);

    // Transactions
//    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::post('transactions/{stock}/storeStock', 'TransactionsController@storeStock')->name('transactions.storeStock');
    Route::resource('transactions', 'TransactionsController')->only(['index']);

    Route::post('/updateCounter', [CounterController::class, 'store'])->name('updateCounter');

    Route::get('/counterValue', [CounterController::class, 'index'])->name('showCounter');



});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});
