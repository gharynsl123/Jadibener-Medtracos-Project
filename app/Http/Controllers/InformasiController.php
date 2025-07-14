<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Information;

class InformasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index()  {
        $information = Information::all();
        return view('informasi.index-informasi', compact('information'));
    }
    
    function detail($slug) {
        $information = Information::where('slug', $slug)->first();
        return view('informasi.detail-informasi', compact('information'));

    }
    function store(Request $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title . '-' . $request->author);

        Information::create($data);
        return redirect()->back()->with('success', 'informasi berhasil masuk');

    }
}
