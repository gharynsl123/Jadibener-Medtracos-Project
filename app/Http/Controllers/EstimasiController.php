<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Estimate;
use App\Equipment;
use App\History;
use App\Category;
use App\Part;

class EstimasiController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $dataEstimasi = null;

        if (auth::user()->level == 'pic'){
            $dataEstimasi = Estimate::where('id_instansi', Auth::user()->instansi->id)->get();
        } else{
            $dataEstimasi = Estimate::all();
        }
        
        return view('estimate.index-estimasi', compact('dataEstimasi'));
    }
    public function create($slug) {
        $informationTools = Equipment::where('slug', $slug)->first();
        $kategori = Category::all();
        $part = Part::all();

        return view('estimate.create-estimasi', compact('informationTools', 'kategori', 'part'));
    }

    public function store(Request $request) {
        $estimateData = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/biaya_estimasi_images', $photoName);
            $estimateData['photo'] = $photoName; // Simpan hanya nama file ke database
        }        

        $estimateData['id_instansi'] = $request->id_instansi;
        $estimateData['equipment_id'] = $request->equipment_id;

        $createEstimate = Estimate::create($estimateData);

        $history = [
            'status' => 'Estimasi Biaya Alat',
            'description' => 'Diajukan Biaya Oleh ' . Auth::user()->name,
            'equipment_id' => $request->equipment_id,
            'estimate_id' => $createEstimate->id,
            'id_user' => Auth::user()->id
        ];

        History::create($history);

        return redirect('/estimasi-biaya');
    }
}
