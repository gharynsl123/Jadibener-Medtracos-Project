<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use App\Member;
use App\Part;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function viewPart(Request $request) {
        $search = $request->input('search');

        $part = Part::query();

        if ($search) {
            $part->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('kategori', 'like', '%' . $search . '%');
            });
        }

        $parts = $part->get();

        // Main categories & subcategories
        $mainCategories = [];
        $subCategories = [];
        $groupedParts = [];


        foreach ($parts as $item) {
            $groupedParts[$item->kategori][] = $item;
        }

        foreach ($parts as $part) {
            // Misalnya kategori = "Kulkas 1 Pintu"
            $kategoriParts = Str::of($part->kategori)->explode(' '); // ['Kulkas', '1', 'Pintu']
            $main = $kategoriParts[0]; // "Kulkas"
            $fullKategori = $part->kategori; // "Kulkas 1 Pintu"

            if (!in_array($main, $mainCategories)) {
                $mainCategories[] = $main;
            }

            $subCategories[$main][] = $fullKategori;
        }

        // Hapus duplikat subkategori
        foreach ($subCategories as $key => $subs) {
            $subCategories[$key] = array_unique($subs);
        }

        return view('guest.spare-part', compact('mainCategories', 'subCategories', 'groupedParts'));
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
            'categories' => $service['katogori'],
            'subtitle' => $service['subtitle'],
            'descriptions' => $service['description']
        ]);
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

    public function detailAlat($name) {
        $part = Part::where('name', $name)->first();
        return view('guest.detail-part', compact('part'));
    }
      
    function requestUser() {
        $instansi = Instansi::all();
        return view('guest.request-member', compact('instansi'));
    }

    public function createRequestMember() {

        $instansi = Instansi::all();

        return view('auth.register', compact('instansi'));

    }

    public function storeRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'tools_type' => 'required|string',
            'address' => 'required|string',
            'issue' => 'nullable|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    
        Member::create($request->only(['name', 'phone_number', 'tools_type', 'address', 'issue']));
    
        return redirect('/')->with('success', 'Data berhasil disimpan. Silakan menunggu.');
    }

    function contact() {
        return view('guest.contact');
    }

    function greeting() {
        return view('guest.greating');
    }
}
