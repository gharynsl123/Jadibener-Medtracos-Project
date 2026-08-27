<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use App\Member;
use App\Product;
use App\Part;
use App\RequestPart;
use App\Mail\GuestRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function sodapur(Request $request) {

        return view('guest.profile-sodapur');
    }

    public function about($slug)
    {
        $json = File::get(resource_path('data/services.json'));
        $services = json_decode($json, true);

        $service = collect($services)->firstWhere('id', $slug);

        if (!$service) {
            abort(404);
        }

        return view('guest.layanan-detail', [
            'title' => $service['title'],
            'subtitle' => $service['subtitle'],
            'descriptions' => $service['description'],
            'layanan' => $service['layanan'],
            'kelebihan' => $service['kelebihan'],
            'images' => $service['image']
        ]);
    }

    public function dataProduct($slug) {
        $json = File::get(resource_path('data/product.json'));
        $products = json_decode($json, true);

        $product = collect($products)->firstWhere('id', $slug);

        if (!$product) {
            abort(404);
        }

        return view('guest.product', compact('product'));
    }

    public function requestPart(Request $request, $name) {
        // no validation needed. send data to db and email user
        $dataPart = Part::where('name', $name)->first();

        $dataRequest = [
            'part_name' => $request->input('part-name'),
            'part_code' => $request->input(''),
            'part_category' => $request->input(''),
            'price_part' => $request->input(''),
            'name_user' => $request->input('name-user'),
            'email_user' => $request->input('email'),
            'phone_user' => $request->input('phone'),
            'part_image' => $request->input(''),
            'part_description' => $request->input('description'),
        ];

        
    }
    
    public function detailAlat($slug) {
        $part = Part::where('slug', $slug)->first();
        return view('guest.detail-part', compact('part'));
    }
      
    function requestUser() {
        $instansi = Instansi::all();
        return view('guest.request-member', compact('instansi'));
    }

    public function storeRequestPart(Request $request)
    {
        // Validate required fields including captcha
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'issue' => 'required|string'
        ], [
            'g-recaptcha-response.required' => 'Silakan centang reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'reCAPTCHA tidak valid. Silakan coba lagi.'
        ]);

        $data = [
            'name' => $request->input('name'),
            'instansi' => $request->input('instansi'),
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'title' => $request->input('title'),
            'issue' => $request->input('issue')
        ];
        
        // error catch email
        try {
            Mail::to('persolna1243@gmail.com')->send(new GuestRequest($data));
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Pesan Gagal Di kirim ke Admin, Mohon Coba Lagi');
        }
        
        return redirect('/')->with('success', 'Pesan Sudah Di kirim ke Admin, Mohon Menunggu Balasan');
    }

    public function createRequestMember() {
        $instansi = Instansi::all();
        return view('auth.register', compact('instansi'));
    }

    public function requestMember(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
        ]);

        Member::create($request->only(['name', 'email', 'phone_number', 'instansi', 'address']));

        return redirect('/')->with('success', 'Permintaan keanggotaan berhasil dikirim. Silakan menunggu konfirmasi dari admin.');
    }

    function contact() {
        return view('guest.contact');
    }

    function greeting() {
        return view('guest.greating');
    }
}
