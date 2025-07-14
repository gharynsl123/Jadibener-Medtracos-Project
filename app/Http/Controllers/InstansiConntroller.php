<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\User;
use App\Brand;
use App\Product;
use App\Category;
use App\Equipment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// import class excel
use App\Imports\InstansiImport;
use Maatwebsite\Excel\Facades\Excel;

// import validator
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class InstansiConntroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function index() {
        $general = Instansi::all();

        $picID = User::whereNotNull('id_instansi')->get();
        $special = Instansi::whereIn('id', $picID->pluck('id_instansi')->all())->get();

        return view('instansi.index-instansi', compact('general', 'special'));
    }

    function create() {
        return view('instansi.create-instansi');
    }

    function createDataSurvey(Request $request) {
        $peralatan = Equipment::all();
        $kategori = Category::all();
        $produk = Product::all();
        $merek = Brand::all();
        $user = User::all();

        $query = $request->input('q');
        
        $instansi = Instansi::doesntHave('users')
            ->where('name', 'like', '%' . $query . '%')
            ->get();
        return view('instansi.create-data-surveyor', compact('peralatan', 'instansi', 'kategori','produk','merek','user'));
    }

    public function storeDataSurvey(Request $request) {
        // Aturan validasi untuk data instansi dan data PIC
        $validator = Validator::make($request->all(), [
            'id_instansi' => 'required|integer|exists:instansi,id',
            'provinsi' => 'required|string',
            'type' => 'required|string',
            'jenis' => 'required|string',
            'photo' => 'file',
            'departement' => 'required|string',
            'alamat_instansi' =>'required|string',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'password' => 'nullable|string|max:255|min:6', // Minimal 6 karakter untuk password
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();
    
        $instansi = Instansi::find($validatedData['id_instansi']);
    
        if ($request->hasFile('photo')) {
            if ($instansi->photo && File::exists(storage_path('app/public/instansi_images/' . $instansi->photo))) {
                File::delete(storage_path('app/public/instansi_images/' . $instansi->photo));
            }
        
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/instansi_images', $photoName);
            $instansi->photo = $photoName;
        }

        if ($instansi) {
            $instansi->update([
                'name' => $instansi->name,
                'address' => $validatedData['alamat_instansi'],
                'provinsi' => $validatedData['provinsi'],
                'jenis' => $validatedData['jenis'],
                'type' => $validatedData['type'],
                'photo' => $validatedData['photo'],
            ]);
        }
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['email'], 
            'departement' => $validatedData['departement'], 
            'phone_number' => $validatedData['phone_number'],
            'password' => bcrypt($validatedData['password']), 
            'pass_view' => $validatedData['password'],
            'gender' => $validatedData['gender'],
            'level' => 'pic', 
            'id_instansi' => $instansi->id, 
            'slug' => Str::slug($validatedData['name']), 
        ]);
    
        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Data successfully stored.');
    }

    function store(Request $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/instansi_images', $photoName);
            $data['photo'] = $photoName;
        }

        Instansi::create($data);
        return redirect('/instansi')->with('success', 'Instansi Berhasil Di Tambah');
    }

    function detail($slug)  {
        $instansi = Instansi::where('slug', $slug)->first();
        $departements = ['Hospital Kitchen', 'CSSD', 'Purcashing', 'IPS-RS'];

        $user = User::where('id_instansi', $instansi->id)
            ->whereIn('departement', $departements)
            ->get();

        $equipment = Equipment::whereIn('departement', $departements)
        ->where('id_instansi', $instansi->id)
        ->whereIn('departement', $departements)
        ->get();

        $jumlahPeralatanPerDepartemen = [];
        
        foreach ($user as $users) {
            $departemen = $users->departement;
        
            // Count the equipment for the specific institution and department
            $jumlahPeralatanPerDepartemen[$departemen] = $equipment
                ->where('id_instansi', $instansi->id)
                ->where('departement', $departemen)
                ->count();
        }
        return view('instansi.detail-instansi', compact('instansi', 'user', 'equipment', 'jumlahPeralatanPerDepartemen'));
    }

    function edit($slug)  {
        $instansi = Instansi::where('slug', $slug)->first();
        return view('instansi.edit-instansi', compact('instansi'));
    }

    function update(Request $request, $id) {
        $instansi = Instansi::find($id);
        // Update gambar jika ada perubahan
        
        if ($request->hasFile('photo')) {
            if ($instansi->photo && File::exists(storage_path('app/public/instansi_images/' . $instansi->photo))) {
                File::delete(storage_path('app/public/instansi_images/' . $instansi->photo));
            }
        
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/instansi_images', $photoName);
            $instansi->photo = $photoName;
        }

        // Update data instansi
        $instansi->name = $request->input('name');
        $instansi->provinsi = $request->input('provinsi');
        $instansi->slug = Str::slug($request->input('name'));
        $instansi->type = $request->input('type');
        $instansi->jenis = $request->input('jenis');
        $instansi->address = $request->input('address');

        // Simpan perubahan

        $instansi->save();
        return redirect('/instansi')->with('success', 'Data Berhasil Di Update');
    }

    function delete($id) {
        $instansi = Instansi::find($id);

        $instansi->delete();
        return redirect()->back()->with('success', "$instansi->name berhasil di hapus");
    }

    public function import(Request $request) {
        $file = $request->file('file'); 
        Excel::import(new InstansiImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }
}