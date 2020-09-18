<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\keuangan\ServiceCRC;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\LaporanConrtoller;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SparepartController;
use App\Http\Controllers\Karyawan\RequestController;
use App\Http\Controllers\keuangan\KeuanganController;

Auth::routes();


Route::get('/',function() {
    return redirect()->route('login');
})->middleware('guest');

// Route::get('/',function() {
//     $r1 = Role::first();
//     // dd($r1);
//     $r1->givePermissionTo(
//                                 'Confirm & Reject Service Request',
//                                 'Confirm & Reject Sparepart Request',
//                                 'CRUD User', 'CRUD Asset', 'CRUD Service', 'CRUD Sparepart' ,
//                                 'Report Download',
//                             );
//          $r2 = Role::find(2);
//          $r2->givePermissionTo(
//              'Request Service', 'Request Sparepart'
//          );                   

//          $r3 = Role::find(3);
//          $r3->givePermissionTo(
//             'Confirm & Reject Service Request',
//             'Confirm & Reject Sparepart Request',
//             'Report Download',
//          );

//          $r4 = Role::find(4);
//          $r4->givePermissionTo(
//             'Report Download'
//          );
                        
// });

Route::group(['middleware' => 'auth'],function() {
    Route::group(['middleware' => 'role:admin','prefix' => 'admin'],function() { 
        Route::get('',  [AdminDashboard::class,'index'])->name('admin.index');
        Route::group(['prefix' => 'user'],function() {
            Route::get('',  [UserController::class,'index'])->name('user.index');
            Route::post('', [UserController::class,'create'])->name('user.create');
            Route::delete('delete-user/{user:username}', [UserController::class,'delete'])->name('user.destroy');
            Route::get('edit-user/{user:username}', [UserController::class,'edit'])->name('user.edit');
            Route::put('edit-user/{user:username}', [UserController::class,'update']);
            Route::get('user-detail/{user:username}', [UserController::class,'view'])->name('user.view');
        });
        Route::group(['prefix' => 'asset'],function() {
            Route::get('',[AssetController::class,'index'])->name('asset.index');
            Route::delete('{item:plat_nomor}', [AssetController::class,'destroy'])->name('asset.destroy');
            Route::post('edit-asset', [AssetController::class,'edit']);
            Route::put('', [AssetController::class,'update'])->name('asset.update'); 
            Route::post('', [AssetController::class,'create'])->name('asset.create');   
        });
    });

    Route::group(['middleware' => ['role:admin|keuangan|pimpinan']],function() {
        Route::group(['prefix' => 'laporan'],function() {
            Route::get('service', [LaporanConrtoller::class, 'serviceView'])->name('service.report');
            Route::get('sparepart', [LaporanConrtoller::class, 'sparepartView'])->name('sparepart.report');
            Route::post('sparepart', [LaporanConrtoller::class, 'sparepartPrint'])->name('sparepart.print');
            Route::post('service', [LaporanConrtoller::class, 'servicePrint'])->name('service.print');
        });
        Route::group(['prefix' => 'service'],function() {
            Route::get('', [ServiceController::class, 'index'])->name('service.index');
            Route::put('{b_conf:uuid}',[ServiceController::class, 'confirm'])->name('service.confirm');
            Route::delete('{b_conf:uuid}', [ServiceController::class, 'reject'])->name('service.reject');
        });
        Route::group(['prefix' => 'sparepart'],function() {
            Route::get('', [SparepartController::class,'index'])->name('sparepart.index');
            Route::post('', [SparepartController::class,'create'])->name('sparepart.create');
            Route::delete('/sparepart-reject/{conf:nama}', [SparepartController::class,'reject'])->name('sparepart.reject');
            Route::put('/sparepart-confirm/{conf:nama}', [SparepartController::class,'confirm'])->name('sparepart.confirm');
        });
    });

    Route::group(['middleware' => 'role:karyawan', 'prefix' => 'karyawan'],function() {
        Route::get('', [RequestController::class, 'index'])->name('karyawan.index');
        Route::get('service', [RequestController::class, 'serviceRequest'])->name('service.request');
        Route::get('sparepart', [RequestController::class, 'sparepartRequest'])->name('sparepart.request');
        Route::post('service-request-send', [RequestController::class, 'serviceRequestSend'])->name('service.requestSend');
        Route::post('', [RequestController::class, 'sparepartRequestSend'])->name('sparepart.request.send');
        Route::get('list-service-request', [RequestController::class, 'listServiceRequest'])->name('service.listRequest');
        Route::get('list-sparepart-request', [RequestController::class, 'listSparepartRequest'])->name('sparepart.listRequest');
        Route::delete('hapus-service/{item:id}', [RequestController::class, 'serviceRequestCancel'])->name('service.request.cancel');
        Route::delete('{item:id}', [RequestController::class, 'sparepartRequestCancel'])->name('sparepart.request.cancel');
    });

    Route::group(['prefix' => 'keuangan'],function() {
        Route::get('', [KeuanganController::class,'index'])->name('keuangan.index');
    });

    Route::group(['prefix' => 'pimpinan'],function() {
        // Route::get('',function() {
        // })->name('pimpinan.index');
        Route::view('', 'pimpinan.dashboard')->name('pimpinan.index');
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
