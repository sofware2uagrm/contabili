<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['ventas']=venta::paginate(10);
        return view('venta.index', $datos);
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosventa = $request->except('_token');
        venta::insert($datosventa);
         return redirect('venta')->with('mensaje','venta agregada con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $venta=venta::findOrFail($id);
        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosVenta = $request->except(['_token','_method']);
        venta::where('id','=',$id)->update($datosVenta);
        $venta=venta::findOrFail($id);
        //return redirect('/admin/venta');
        return view('venta.edit', compact('venta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        venta::destroy($id);
        return redirect('venta');
    
    }
    public function exportExcel() 
    {
        return Excel::download(new ventasExport, 'VentaExcel.xlsx');
    }
}
