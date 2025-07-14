<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index() {
        $brand = Brand::all();
        return view('brand.index-merek', compact('brand'));
    }
    function store(Request $request) {
        Brand::create($request->all());

        return redirect()->back()->with('success', 'Data Merek Berhasil Di tambah');
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);
        return view('brand.edit-merek', compact('brand'));
    }
    
    public function update(Request $request, $id) {
        $brand = Brand::findOrFail($id);
        
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required',
            'departement' => 'required',
        ]);
    
        // Update data
        $brand->update([
            'name' => $request->name,
            'departement' => $request->departement
        ]);
    
        return redirect('/brand')->with('success', 'Merek berhasil diupdate');
    }
    

    function delete($id) {
        $brand = Brand::find($id);
        $brand->delete();
        
        return redirect()->back()->with('success', 'Merek Berhasil Di Hapus');
    }
}
