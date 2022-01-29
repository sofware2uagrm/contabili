<?php

use App\Http\Controllers\AcEmpresaController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\CuentaPlanController;
use App\Http\Controllers\CuentaPlanTipoController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\LibroDiarioController;
use App\Http\Controllers\LibroMayorController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PlanController;
use App\Models\Comprobante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaDeleteController;
use App\Http\Controllers\ActualController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;

//lucas
use App\Http\Controllers\AsientoLCVController;
use App\Http\Controllers\FormatoDocController;
use App\Http\Controllers\FirmaReporteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TiponivelController;
use App\Http\Controllers\MonedaController;
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
Route::get('compra/export-excel', [CompraController::class, 'exportExcel']); 
Route::get('venta/export-excel', [VentaController::class, 'exportExcel']); 



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/usuario/index', [App\Http\Controllers\Seguridad\UsuarioController::class, 'view_index']);
    Route::get('/usuario/create', [App\Http\Controllers\Seguridad\UsuarioController::class, 'view_create']);
    Route::get('/usuario/edit/{idusuario}', [App\Http\Controllers\Seguridad\UsuarioController::class, 'view_edit']);
    Route::get('/usuario/show/{idusuario}', [App\Http\Controllers\Seguridad\UsuarioController::class, 'view_show']);

    Route::get('/grupo_usuario/index', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'view_index']);
    Route::get('/grupo_usuario/create', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'view_create']);
    Route::get('/grupo_usuario/edit/{idgrupousuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'view_edit']);
    Route::get('/grupo_usuario/show/{idusuario}', [App\Http\Controllers\Seguridad\GrupoUsuarioController::class, 'view_show']);

    Route::get('/formulario/index', [App\Http\Controllers\Seguridad\FormularioController::class, 'view_index']);
    Route::get('/formulario/asignar', [App\Http\Controllers\Seguridad\FormularioController::class, 'view_asignar']);

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
  
  
  ///
    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('empresasDelete', EmpresaDeleteController::class)->names('empresasDelete');
    Route::resource('gestions', GestionController::class)->names('gestions');
    Route::get('datosdelaempresa',[ActualController::class,'empresaactual'])->name('datosdelaempresa');
    Route::get('gestiondelaempresa',[ActualController::class,'gestionactual'])->name('gestiondelaempresa');

    Route::resource('compra',CompraController::class)->names('compra');
    Route::resource('venta',VentaController::class)->names('venta');
    
    

   Route::resource('acempresas',AcEmpresaController::class)->names('acempresas');
    //de lucas 
    Route::resource('moneda', MonedaController::class);
    Route::post('moneda/update/{moneda}',[ MonedaController::class , 'update']);

    Route::resource('formatoDocumento', FormatoDocController::class);
    Route::post('formatoDocumento/update/{formato_doc}',[ FormatoDocController::class , 'update']);

    Route::resource('firmaReporte', FirmaReporteController::class);
    Route::post('firmaReporte/update/{firma_reporte}',[ FirmaReporteController::class , 'update']);

    Route::resource('proyecto', ProyectoController::class);
    Route::post('proyecto/update/{proyecto}',[ ProyectoController::class , 'update']);

    Route::resource('asientoLCV', AsientoLCVController::class);
    Route::post('asientoLCV/update/{asiento_LCV}',[ AsientoLCVController::class , 'update']);

    Route::resource('tipoNivel', TiponivelController::class);
    Route::post('tipoNivel/update/{tiponivel}',[ TiponivelController::class , 'update']);
     
});

Route::put('planUpdate',[CuentaPlanController::class,'editar']);
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