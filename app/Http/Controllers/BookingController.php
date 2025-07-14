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
        $teknisi = User::where('level', 'teknisi')->get()->all();
        return view('booking.create-booking', compact('informationTools', "teknisi"));
    }

    public function store(Request $request, $slug) {
        $data = $request->all();
        $data['slug'] = 'B-' . $request->date;
        Booking::create($data);
        return redirect('/detail-equipment/'. $slug)->with('success', 'jadwal Telah di atur');
    }

    public function detail($slug) {
        $booking = Booking::where('slug', $slug)->first();
        $informationTools = Equipment::where('slug', $booking->equipments->slug)->first();
        $user = User::whereIn('level', ['teknisi'])->get()->all();

        return view('booking.update-booking', compact('informationTools', 'booking', 'user'));
    }

    public function detailTwo($slug) {
        $informationTools = Equipment::where('slug', $slug)->first();
        $user = User::whereIn('level', ['teknisi'])->get()->all();

        return view('booking.update-second-booking', compact('informationTools', 'user'));
    }

    public function update(Request $request, $slug) {
        $booking = Booking::where('slug', $slug)->first();
        $booking->status = 'close';
        $booking->fill($request->all());
    
        $booking->save();
        return redirect('/jadwal-kedatangan')->with('success', 'Hasil telah diupload');
    }

    public function updateTwo(Request $request) {
        $data = $request->all();

        $data['slug'] = 'B-' . now('Asia/Jakarta')->format('i:s-d-m-Y');
        $data['status'] = 'close';
        Booking::create($data);
        return redirect('/jadwal-kedatangan')->with('success', 'Hasil telah diupload');
    }

    public function show($slug) {
        $booking = Booking::where('slug', $slug)->first();

        return view('booking.detail-booking', compact('booking'));
    }
    
}
