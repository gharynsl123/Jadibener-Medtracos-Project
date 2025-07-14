<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
        $user = User::all();
        
        return view('user.index-user', compact('user'));
    }

    function addPIC($slug) {
        $instansi = Instansi::where('slug', $slug)->first();


        return view('survey.add-pic', compact('instansi'));
    }

    function storePIC(Request $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['password'] = bcrypt($request->password);
        $data['pass_view'] = $request->password;
        $data['level'] = 'pic';

        User::create($data);
        return redirect()->back()->with('success', 'User Berhasil Di Tambahkan');
    }

    function create() {
        $user = User::all();
        $instansi = Instansi::all();
        return view('user.create-user', compact('user', 'instansi'));
    }

    function detail($id) {
        $user = User::find($id);
        return view('user.create-user', compact('user'));
    }

    function edit($slug) {
        $user = User::where('slug', $slug)->first();
        $instansi = Instansi::all();

        return view('user.edit-user', compact('user', 'instansi'));
    }

    function update(Request $request, $id) {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');
        $user->password = Hash::make($request->input('password'));
        $user->slug = Str::slug($request->input('name'));
        $user->pass_view = $request->input('password');
        $user->departement = $request->input('departement');
        $user->gender = $request->input('gender');
        $user->level = $request->input('level');
        $user->role = $request->input('role');
        $user->id_instansi = $request->input('id_instansi');

        $user->save();
        return redirect('/user-member')->with('success', 'User Berhasil Di Update');
    }

    function store(Request $request) {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['password'] = bcrypt($request->password);
        $data['pass_view'] = $request->password;

        User::create($data);
        return redirect('/user-member')->with('success', 'User Berhasil Di Tambahkan');
    }

    function profile($slug) {
        $user = User::where('slug', $slug)->first();

        $instansi = Instansi::where('id', $user->id_instansi)->get()->all();
        return view('user.profile', compact('instansi', 'user'));
    }

    function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Di Hapus.');
    }

    function acceptMember($id) {
        // Mencari data member berdasarkan ID
        $dataMember = Member::find($id);
        if (!$dataMember) {
            return redirect()->back()->with('failure', 'Member tidak ditemukan.');
        }

        // Mencari instansi berdasarkan nama
        $instansiName = Instansi::where('name', 'LIKE', '%' . $dataMember->instansi . '%')->first();

        // Membuat instance user baru
        $user = new User;

        // Jika instansi ditemukan, set id_instansi, jika tidak, buat instansi baru
        if ($instansiName) {
            $user->id_instansi = $instansiName->id;
        } else {
            $instansi = Instansi::create([
                'name' => $dataMember->instansi,
                'address' => $dataMember->address,
                'slug' => Str::slug($dataMember->instansi)
            ]);
            $user->id_instansi = $instansi->id;
        }

        // Set data user dari data member
        $user->name = $dataMember->name;
        $user->username = $dataMember->username;
        $user->email = $dataMember->email;        
        $user->phone_number = $dataMember->phone_number;
        $user->pass_view = $dataMember->password;
        $user->departement = $dataMember->departement;
        $user->gender = $dataMember->gender;
        $user->slug = Str::slug($dataMember->name);
        $user->password = Hash::make($dataMember->password);
        $user->level = 'pic';

        // Validasi duplikasi username
        $validator = Validator::make(['username' => $user->username], [
            'username' => 'unique:users,username'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('failure', 'Username tersebut sudah ada di dalam database. Tolong konfirmasi kepada user tersebut');
        }

        try {
            $user->save();
            $dataMember->delete();
            return redirect()->back()->with('success', 'User Berhasil Menjadi Member');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function rejectMember($id) {
        $reqMember = Member::findOrFail($id);
        $reqMember->delete();

        return redirect()->back()->with('success', 'User Berhasil di hapus');
    }

    function request() {
        $member = Member::all();
        return view('user.request-user', compact('member'));
    }
}
