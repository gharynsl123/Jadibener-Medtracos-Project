<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index() {
        $categories = Category::all();
        return view('category.index-category', compact('categories'));
    }
    function store(Request $request) {
        Category::create($request->all());

        return redirect()->back()->with('success', 'Data Kategori Berhasil Di tambah');
    }


    public function edit($id) {
        $categories = Category::findOrFail($id);
        return view('category.edit-category', compact('categories'));
    }
    
    public function update(Request $request, $id) {
        $categories = Category::findOrFail($id);
        
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required',
            'departement' => 'required',
        ]);
    
        // Update data
        $categories->update([
            'name' => $request->name,
            'departement' => $request->departement
        ]);
    
        return redirect('/categories')->with('success', 'Kategori berhasil diupdate');
    }
    
    function delete($id) {
        $categories = Category::find($id);
        $categories->delete();
        
        return redirect()->back()->with('success', 'Kategori Berhasil Di Hapus');
    }
}
