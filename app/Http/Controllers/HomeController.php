<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Submission;
use App\User;
use App\Instansi;
use Carbon\Carbon;
use App\Equipment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $status = Submission::all();
        $submission = Submission::where('status', 'pending')->get();
        $instansi = Auth::user()->instansi;
        $alatPeralatan = Equipment::where('id_instansi', Auth::user()->id_instansi)->count();
        $user = Auth::user();

        if (in_array(Auth::user()->level, ['surveyor', 'teknisi'])) {
            // Ambil data instansi yang diperbarui hari ini dan diperbarui oleh user yang login
            $instansi = Instansi::whereDate('updated_at', Carbon::today())->get();
        }

        return view('dashboard.home', compact('status','submission', 'alatPeralatan', 'instansi', 'user'));
    }
}
