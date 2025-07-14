<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index() {
        $activities = ActivityLog::all();
        return view('archive.index-archive', compact('activities'));
    }
}
