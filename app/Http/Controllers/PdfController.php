<?php

namespace App\Http\Controllers;
use App\Models\individual;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $individual = Individual::get();
        $data = [
            'title' => 'Inventory Custodian Slip',
            'Entity Name' => 'user',
            'individuals' => $individual,
            'Date' => 'Date',
        ];

        $pdf = Pdf::loadView('individual.pdf', $data);
        return $pdf->download('INVENTORY CUSTODIAN SLIP.pdf');
    }
}
