<?php

use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\CuentaPlanController;
use App\Http\Controllers\CuentaPlanTipoController;
use App\Http\Controllers\LibroDiarioController;
use App\Http\Controllers\LibroMayorController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PlanController;
use App\Models\Comprobante;
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

Route::get('prueba',function (){
    return obtener_credito_iva()->idCuentaPlan;
});

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/cuenta-plan',[CuentaPlanController::class,'mostrar'])->name('cuenta-plan.index');
    Route::get('/cuenta-tipo-plan',[CuentaPlanTipoController::class,'mostrar'])->name('cuenta-plan-tipo.index');

    Route::get('/comprobante',[ComprobanteController::class,'mostrar'])->name('comprobante.index');
    Route::get('/plan',[PlanController::class,'mostrar'])->name('plan.index');

    Route::get('/pdf',[PDFController::class,'mostrar'])->name('pdf');
    Route::get('/pdf/{id}',[PDFController::class,'mostrar_comprobante'])->name('pdf.index');

    Route::get('/libro-diario',[LibroDiarioController::class,'mostrar'])->name('libro-diario.index');
    Route::get('/libro-mayor',[LibroMayorController::class,'mostrar'])->name('libro-mayor.index');

    Route::get('comprobantesPdf/{desde}/{hasta}/{idComprobanteTipo}',[PdfController::class,'comprobantesPDF'])->name('comprobantes.pdf');
    Route::get('libroMayorPdf/{desde}/{hasta}/{idCuentaPlan}',[PdfController::class,'libroMayor'])->name('libro-mayor.pdf');
    
});

Auth::routes();

Route::get('/example',function (){
    return   $comprobante = Comprobante::
    join('comprobante_cuenta_detalle','comprobante_cuenta_detalle.idComprobante','=','comprobante.idComprobante')
    ->join('cuenta_plan','cuenta_plan.idCuentaPlan','=','comprobante_cuenta_detalle.idCuentaPlan')
    ->where('comprobante.fecha','>=','2021-12-27')
    ->where('comprobante.fecha','<=','2022-02-06')
    ->where('comprobante_cuenta_detalle.idCuentaPlan','=',4)
    ->paginate(1);
});