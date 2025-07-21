<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Part;
use App\Category;

class SparePartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index() {
        $part = Part::all();
        $categori = Category::all();
        return view('part.index-part', compact('part', 'categori'));
    }

    function store(Request $request) {
        $data = $request->all();

        // addphoto to database and local with folder name part
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/part_images', $photoName);
            $data['photo'] = $photoName;
        }

        Part::create($data);

        return redirect()->back()->with('success', 'Spare Part Berhasil Ditambahkan');
    }

    function edit($id) {
        $part = Part::find($id)->first();
        $categori =  Category::all();
        return view('part.edit-part', compact('part', 'categori'));
    }

    function update(Request $request, $id) {
        $part = Part::findOrFail($id); // Langsung menggunakan findOrFail untuk validasi
    
        // Jika ada file 'photo', simpan dan update path-nya
        if ($request->hasFile('photo')) {
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/part_images', $photoName);
            $part->photo = $photoName; // Update photo field
        }
    
        $part->update($request->except('photo')); // Update selain photo
        return redirect('/part')->with('success', 'Spare Part berhasil diupdate');
    }
    

    function detail($id) {
        $part = Part::find($id)->first();
        return view('layouts.detail-part', compact('part'));
    }

    function delete($id) {
        $part = Part::find($id);
        $part->delete();
        return redirect()->back()->with('success', 'Spare Part Berhasil Dihapus');
    }
}
