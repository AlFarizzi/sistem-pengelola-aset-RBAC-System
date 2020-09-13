<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\LaporanConrtoller;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SparepartController;
use App\Http\Controllers\Karyawan\RequestController;

Auth::routes();

// Route::get('/',function() {
//     $r1 = Role::first();
//     $r1->givePermissionTo('Report Download');
// });

Route::group(['middleware' => 'auth'],function() {
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'],function() {
    
        Route::get('',  [AdminDashboard::class,'index'])->name('admin.index');
        
        Route::group(['prefix' => 'user'],function() {
            Route::get('',  [UserController::class,'index'])->name('user.index');
            Route::post('', [UserController::class,'create'])->name('user.create');
            Route::delete('delete-user/{user:username}', [UserController::class,'delete'])->name('user.destroy');
            Route::get('edit-user/{user:username}', [UserController::class,'edit'])->name('user.edit');
            Route::put('edit-user/{user:username}', [UserController::class,'update']);
            Route::get('user-detail/{user:username}', [UserController::class,'view'])->name('user.view');
        });
        
        Route::group(['prefix' => 'sparepart'],function() {
            Route::get('', [SparepartController::class,'index'])->name('sparepart.index');
            Route::post('', [SparepartController::class,'create'])->name('sparepart.create');
            Route::delete('/sparepart-reject/{conf:nama}', [SparepartController::class,'reject'])->name('sparepart.reject');
            Route::put('/sparepart-confirm/{conf:nama}', [SparepartController::class,'confirm'])->name('sparepart.confirm');
        });
        
        Route::group(['prefix' => 'asset'],function() {
            Route::get('',[AssetController::class,'index'])->name('asset.index');
            Route::delete('{item:no_asset}', [AssetController::class,'destroy'])->name('asset.destroy');
            Route::post('edit-asset', [AssetController::class,'edit']);
            Route::put('', [AssetController::class,'update'])->name('asset.update'); 
            Route::post('', [AssetController::class,'create'])->name('asset.create');   
        });
    
        Route::group(['prefix' => 'laporan'],function() {
            Route::get('service', [LaporanConrtoller::class, 'serviceView'])->name('service.report');
            Route::get('sparepart', [LaporanConrtoller::class, 'sparepartView'])->name('sparepart.report');
            Route::post('sparepart', [LaporanConrtoller::class, 'sparepartPrint'])->name('sparepart.print');
            Route::post('service', [LaporanConrtoller::class, 'servicePrint'])->name('service.print');
        });

        Route::group(['prefix' => 'service'],function() {
            Route::get('', [ServiceController::class, 'index'])->name('service.index');
            Route::put('{conf:id_asset}',[ServiceController::class, 'confirm'])->name('service.confirm');
            Route::delete('{conf:id_asset}', [ServiceController::class, 'reject'])->name('service.reject');
        });
    
    });

    Route::group(['prefix' => 'karyawan'],function() {
        Route::get('', [RequestController::class, 'index'])->name('karyawan.index');
        Route::get('service', [RequestController::class, 'serviceRequest'])->name('service.request');
        Route::get('sparepart', [RequestController::class, 'sparepartRequest'])->name('sparepart.request');
        Route::post('', [RequestController::class, 'serviceRequestSend'])->name('service.request.send');
        Route::get('list-service-request', [RequestController::class, 'listServiceRequest'])->name('service.listRequest');
        Route::delete('{item:id}', [RequestController::class, 'serviceRequestCancel'])->name('service.request.cancel');
    });

    Route::get('/logout-page',function() {
        Auth::logout();
        // dd('bisa')
        return redirect()->route('login');
    })->name('logout.page');
});


Route::group(['middleware' => 'guest'],function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
