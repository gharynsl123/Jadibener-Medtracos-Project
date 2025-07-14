<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use App\Progress;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    function index() {
        if (Auth::user()->level == 'admin') {
            $progressList = Progress::with(['histories' => function ($query) {
                $query->orderByDesc('created_at')->take(1);
            }])->get();
        } else if(Auth::user()->level == 'teknisi' || Auth::user()->level == 'sub_service') {
            $progressList = Progress::where('id_user', Auth::id())
                ->with(['histories' => function ($query) {
                    $query->orderByDesc('created_at')->take(1);
                }])->get();
        } else if(Auth::user()->level == 'pic') {
            $progressList = Progress::where('id_instansi', Auth::user()->instansi->id)
                ->with(['histories' => function ($query) {
                    $query->orderByDesc('created_at')->take(1);
                }])->get();
        } else {
            // Mendapatkan progress dengan histories terbaru yang terkait
            $progressList = Progress::with(['histories' => function ($query) {
                $query->orderByDesc('created_at')->take(1);
            }])->get();
        }

        return view('status.index-status', compact('progressList'));
    }
}