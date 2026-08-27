<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estimate;
use App\Equipment;
use App\History;
use App\User;
use App\Booking;
use App\Category;
use App\Part;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $booking = Booking::all();
        return view('booking.index-booking', compact('booking'));
    }

    public function create($slug) {
        $informationTools = Equipment::where('slug', $slug)->first();
        $teknisi = User::whereIn('level', ['teknisi', 'surveyor'])->get()->all();

        return view('booking.create-booking', compact('informationTools', 'teknisi'));
    }

    public function store(Request $request, $slug) {
        $data = $request->all();
        $data['slug'] = 'B-' . $request->date;
        $dataBooking = Booking::create($data);

        $dataHistory = [
            'status' => 'Jadwal Kunjungan Teknisi',
            'description' => 'Jadwal kedatangan ' . $request->date . ' rencana tindakan : '. $request->action_plan,
            'id_user' => $request->id_user,
            'equipment_id' => $request->equipment_id,
            'booking_id' => $dataBooking->id,
        ];
        History::create($dataHistory);
        return redirect('/detail-equipment/'. $slug)->with('success', 'jadwal Telah di atur');
    }

    public function detail($slug) {
        $booking = Booking::where('slug', $slug)->first();
        $informationTools = Equipment::where('slug', $booking->equipments->slug)->first();
        $user = User::whereIn('level', ['teknisi', 'surveyor', 'sub_service'])->get()->all();

        return view('booking.update-booking', compact('informationTools', 'booking', 'user'));
    }

    public function detailTwo($slug) {
        $informationTools = Equipment::where('slug', $slug)->first();
        $user = User::whereIn('level', ['teknisi', 'surveyor', 'sub_service'])->get()->all();
        return view('booking.update-second-booking', compact('informationTools', 'user'));
    }

    public function update(Request $request, $slug) {
        $booking = Booking::where('slug', $slug)->first();
        $booking->status = 'close';
        $booking->fill($request->all());
    
        $booking->save();

        $now = now(); // or $request->created_at

        $dataHistory = [
            [
                'status'       => 'Keluhan Rumah Sakit',
                'description'  => $request->conclusion,
                'id_user'      => $request->id_user,
                'equipment_id' => $request->equipment_id,
                'booking_id'   => $booking->id,
                'created_at'   => $request->created_at ?? $now,
                'updated_at'   => $now,
            ],
            [
                'status'       => 'Hasil Kunjungan Teknisi',
                'description'  => $request->results,
                'id_user'      => $request->id_user,
                'equipment_id' => $request->equipment_id,
                'booking_id'   => $booking->id,
                'created_at'   => $request->created_at ?? $now,
                'updated_at'   => $now,
            ],
        ];

        History::insert($dataHistory);
        return redirect('/jadwal-kedatangan')->with('success', 'Hasil telah diupload');
    }

    public function updateTwo(Request $request) {
        $data = $request->all();

        $data['slug'] = 'B-' . now('Asia/Jakarta')->format('i:s-d-m-Y');
        $data['status'] = 'close';
        $dataBooking = Booking::create($data);

        $now = now(); // or $request->created_at

        $dataHistory = [
            [
                'status'       => 'Keluhan Rumah Sakit',
                'description'  => $data['conclusion'], // example custom field
                'id_user'      => $request->id_user,
                'equipment_id' => $request->equipment_id,
                'booking_id'   => $dataBooking->id,
                'created_at'   => $request->created_at ?? $now,
                'updated_at'   => $now,
            ],
            [
                'status'       => 'Hasil Kunjungan Teknisi',
                'description'  => $data['results'],
                'id_user'      => $request->id_user,
                'equipment_id' => $request->equipment_id,
                'booking_id'   => $dataBooking->id,
                'created_at'   => $request->created_at ?? $now,
                'updated_at'   => $now,
            ],
        ];

        History::insert($dataHistory);
        return redirect('/detail-instansi/'. $dataBooking->instansi->slug)
            ->with([
                'success' => 'Hasil telah diupload',
                'button_access_route' => '/detail-kunjungan/'. $dataBooking->slug,
                'scroll_to_equipment' => $dataBooking->equipment_id
            ]);
    }

    public function show($slug) {
        $booking = Booking::where('slug', $slug)->first();

        return view('booking.detail-booking', compact('booking'));
    }
    
}
