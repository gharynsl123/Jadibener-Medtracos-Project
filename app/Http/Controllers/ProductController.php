<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// import class excel
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function index() {
        $product = Product::all();
        $categories = Category::all();
        $brand = Brand::all();
        return view('product.index-product', compact('product', 'categories', 'brand'));
    }

    function store(Request $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name . '-' . $request->code);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/product_images', $photoName);
            $data['photo'] = $photoName;
        }

        Product::create($data);

        return redirect()->back()->with('success', 'Produk Berhasil Di Tambahkan');
    }
    function edit($slug) {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();
        $brand = Brand::all();
        return view('product.edit-product', compact('product', 'categories', 'brand'));
    }

    function detail($slug) {
        $product = Product::where('slug', $slug)->first();
        return view('product.detail-product', compact('product'));
    }

    function update(Request $request, $id) {
        $data = Product::find($id);
        $update = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/product_images', $photoName);
            $update['photo'] = $photoName;
        }
        
        // Simpan perubahan data
        $data->update($update);
    
        return redirect('/product')->with('success', 'produk berhasil di update');
    }

    function import(Request $request) {
        $file = $request->file('file'); 
        Excel::import(new ProductsImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
        
    }
    

    function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', "Data $product->name Berhasil Di hapus");
    }
}
