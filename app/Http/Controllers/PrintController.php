<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Equipment;
use App\User;
use App\History;
use App\Instansi;

use PDF;

class PrintController extends Controller
{
    function detailAlat($slug) {
        $equipment = Equipment::where('slug', $slug)->first();
        $history = History::where('equipment_id', $equipment->id)->get();
        
        $pdf = PDF::loadView('print.detail-peralatan-rs', ['equipment' => $equipment,'history' => $history]);
        return $pdf->stream('Document Peralatan Rumah Sakit.pdf', ['Content-Type' => 'application/pdf']);
    }
}
