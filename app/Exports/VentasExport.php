<?php

namespace App\Exports;

use App\Models\Venta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class VentasExport implements FromView, ShouldAutoSize, WithTitle, WithColumnFormatting
{

    // Modelo
    public function view(): View
    {
        $venta = Venta::all();
        return view('venta.exportar', [
            'venta' => $venta,
        ]);
    }


    public function title(): string
    {
        return 'Datos de la venta';
    }  

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, 
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,    
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
