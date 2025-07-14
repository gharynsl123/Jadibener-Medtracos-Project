<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;
use App\Equipment;
use App\Mail\GaransiAnnouncement;
use App\Booking;
use App\History;
use App\User;
use App\Instansi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index() {
        $equipment = null;
        $warrantyEquip = Equipment::where('warranty_state', 'true')->get()->all();
        $userAuth = Auth::user()->id_instansi;
        $departemenUser = Auth::user()->departement;

        if (Auth::user()->level == 'pic'){
            $equipment = Equipment::where('id_instansi', $userAuth)->get();

        } else if (Auth::user()->level == 'pic' && Auth::user()->departement) {
            $equipment = Equipment::where('id_instansi', $userAuth)
            ->where('departement', $departemenUser)
            ->get();   
        }
        else {
            $equipment = Equipment::all();
        }
        $brand = Brand::all();
        $category = Category::all();
        $instansi = Instansi::all();
        
        return view('equipment.index-equipment', compact('equipment', 'brand', 'warrantyEquip', 'category', 'instansi'));
    }
    function create() {
        $brand = Brand::all();
        $category = Category::all();
        $equipment = Equipment::all();
        $product = Product::all();
        $instansi = Instansi::all();
        return view('equipment.create-equipment', compact('brand', 'product', 'category', 'equipment', 'instansi'));
    }

    function edit($slug) {
        $equipment = Equipment::where('slug', $slug)->first();
        $instansi = Instansi::all();
        $brand = Brand::all();
        $category = Category::all();
        $product = Product::all();

        return view('equipment.edit-equipment', compact('equipment', 'instansi', 'brand', 'category', 'product'));
    }

    function update(Request $request, $id) {
        $equipmentData = Equipment::find($id);
        $today = Carbon::now();
        $equipmentData['slug'] = Str::slug($request->serial_number . '-' . $today);
        $equipmentData->update($request->all());

        $dataHistory = [
            'status' => 'Pendataan Alat',
            'description' => 'Diupdate oleh ' . Auth::user()->name,
            'equipment_id' => $equipmentData->id,
            'id_user' => $request->id_user,
        ];

        History::create($dataHistory);
        return redirect('/detail-instansi/' . $equipmentData->instansi->slug);

    }

    function store(Request $request) {
        $data = $request->all();
        $today = Carbon::now();
        
        // Generate slug menggunakan serial number dan tanggal
        $data['slug'] = Str::slug($request->serial_number . '-' . $today);

        // Pengecekan garansi
        if ($request->warranty) {
            $warrantyPeriod = $request->warranty; // Ambil data garansi dari request
            $installDate = Carbon::parse($request->installation); // Ambil tanggal instalasi
            $years = intval(explode(' ', $warrantyPeriod)[0]); // Ambil jumlah tahun dari periode garansi
            
            // Hitung tanggal akhir masa garansi
            $endDate = $installDate->copy()->addYears($years);

            // Tentukan warranty_state, 'true' jika garansi masih berlaku, 'false' jika tidak
            if ($today->lt($endDate)) {
                $data['warranty_state'] = 'true'; // Garansi masih berlaku
            } else {
                $data['warranty_state'] = 'false'; // Garansi telah habis
            }
        } else {
            // Jika tidak ada informasi garansi
            $data['warranty_state'] = 'false';
        }
        
        $idEquipment = Equipment::create($data);

        $dataHistory = [
            'status' => 'Pendataan Alat',
            'description' => 'Disurvey oleh ' . Auth::user()->name,
            'equipment_id' => $idEquipment->id,
            'id_user' => $request->id_user,
        ];

        History::create($dataHistory);
        return redirect('barang-rumah-sakit')->with('success', 'Peralatan Berhasil Di Tambahkan');
    }

    function delete($id) {
        $tools = Equipment::find($id);

        $alatname = $tools->poducts->name;

        $tools->delete();
        return redirect()->back()->with('success', "$alatname berhasil di hapus ");
    }

    function detail($slug) {
        // Ambil data equipment berdasarkan slug
        $equipment = Equipment::where('slug', $slug)->first();
    
        // Ambil data booking yang memiliki equipment_id yang sesuai dan status close
        $booking = Booking::where('equipment_id', $equipment->id)
                          ->where('status', 'ongoing')
                          ->first();
                          
        $history = History::where('equipment_id', $equipment->id)->get();


        return view('equipment.detail-equipment', compact('equipment', 'history', 'booking'));
    }

    function sendNotification($slug) {
        $equipment = Equipment::where('slug', $slug)->first();
        
        if ($equipment) {
            $data = [
                'title' => "Garansi Hampir Habis",
                'layanan' => "Peralatan ".$equipment->name,
                'tanggal' => now()->toDateString(),
                'request' => $equipment->user->name, // misalnya PIC dari equipment
                'message' => "Masa garansi peralatan Anda akan habis. Silakan lakukan pengecekan kondisi barang.",
            ];

            $users = $equipment->instansi->users;
            
            foreach ($users as $user) {
                Mail::to($user->email)->send(new GaransiAnnouncement($data)); // Kirim email ke masing-masing user
            }

            return response()->json(['message' => 'Notification sent'], 200);
        }

        return response()->json(['error' => 'Equipment not found'], 404);
    }


    function updateWarranty(Request $request, $slug) {
        // Validasi input
        $request->validate([
            'warranty_state' => 'required|in:true,false', // Hanya boleh true atau false
        ]);
    
        // Temukan equipment berdasarkan slug
        $equipment = Equipment::where('slug', $slug)->firstOrFail();
    
        // Update status garansi
        $equipment->warranty_state = $request->warranty_state;
        $equipment->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Status garansi berhasil diperbarui',
        ]);
    }
    
    function surveyAdd($slug) {
        $user = User::where('slug', $slug)->first();
        $brand = Brand::all();
        $category = Category::all();
        $equipment = Equipment::all();
        $instansi = Instansi::all();
        $product = Product::all();

        return view('survey.equipment-survey', compact('user','brand','category','equipment','instansi','product'));
    }

    function surveyStore(Request $request, $id) {
        $data = $request->all();
        $today = Carbon::now();
        $data['slug'] = Str::slug($request->serial_number . '-' . $today);

        $idEquipment = Equipment::create($data);

        $dataHistory = [
            'status' => 'Pendataan Alat',
            'description' => 'Disurvey pada oleh ' . Auth::user()->name,
            'equipment_id' => $idEquipment->id,
            'id_user' => $request->id_user,
        ];

        History::create($dataHistory);
        return redirect()->back()->with('success', 'Peralatan Berhasil Di input');
    }
}
