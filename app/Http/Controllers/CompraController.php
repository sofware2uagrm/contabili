<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Exports\ComprasExport;
use Maatwebsite\Excel\Facades\Excel;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $datos['compras']=compra::paginate(10);
        return view('compra.index', $datos);
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
        return view('compra.create');
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
        $datosCompra = $request->except('_token');
        compra::insert($datosCompra);
         return redirect('compra')->with('mensaje','compra agregada con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compra=compra::findOrFail($id);
        return view('compra.edit', compact('compra'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCompra = $request->except(['_token','_method']);
        compra::where('id','=',$id)->update($datosCompra);
        $compra=compra::findOrFail($id);
        return view('compra.edit', compact('compra'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        compra::destroy($id);
        return redirect('compra');
    
    }
    
    public function exportExcel() 
    {
        return Excel::download(new ComprasExport, 'Compra.xlsx');
    }
}
