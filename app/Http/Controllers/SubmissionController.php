<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Submission;
use App\Equipment;
use App\User;
use App\Mail\PengajuanEmail;
use Illuminate\Support\Facades\Mail;
use App\Progress;
use App\History;
use Carbon\Carbon;
 
class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index() {
        if (Auth::user()->level == 'pic') {
            $submission = Submission::whereHas('user', function ($query) {
                $query->where('id_instansi', Auth::user()->instansi->id);
            })->get();
        } else {
            $submission = Submission::all();
        }
        return view('submission.index-submission', compact('submission'));
    }
    
    
    function create($slug) {
        $equipment = Equipment::where('slug', $slug)->first();
        $user = Auth::user();

        return view('submission.create-submission', compact('equipment', 'user'));
    }

    function store(Request $request) {
        $equipment = Equipment::find($request->id_peralatan);
        $dataSubmission = $request->all();
        // Menggunakan Carbon untuk memformat waktu
        $currentTime = Carbon::now();
        $tiketIdFormat = 'P' . $currentTime->format('ymdsv');
        $slugFormat = $tiketIdFormat . '-' . $currentTime->format('d-m-Y');

        $dataSubmission['tikects_id'] = $tiketIdFormat;
        $dataSubmission['slug'] = Str::slug($slugFormat);

        $dataPengajuan = Submission::create($dataSubmission);

        $history = [
            'id_user' => Auth::user()->id,
            'status' => 'pengajuan baru' ,
            'description' => 'pengajuan di buat oleh ' . Auth::user()->name,
            'equipment_id' => $request->equipment_id,
            'submissions_id' => $dataPengajuan->id,
        ];
        //  Data yang akan dikirimkan ke email
        $data = [
            'title' => $dataSubmission['title'],
            'message' => 'Keluhan sang user pada barang : '. $dataSubmission['description'],
            'request' => $dataPengajuan->user->name,
            'barang' => $dataPengajuan->equipments->name,
            'tanggal' => $dataPengajuan->created_at,
            'instansi' => $dataPengajuan->equipments->instansi->name,
            'layanan' => $dataSubmission['conditions']
        ];
    
        // Kirim email ke admin
        Mail::to('persolna1243@gmail.com')->send(new PengajuanEmail($data));

        History::create($history);
        return redirect('/detail-equipment/' . $dataPengajuan->equipments->slug)->with('success', 'Pengajuan telat di ajukan Mohon Ditunggu');
    }

    function detail($slug) {
        $submission = Submission::where('slug', $slug)->first();

        $progress = Progress::where('submissions_id', $submission->id)->first();
        $historyPengajuan = History::where('submissions_id', $submission->id)->get();

        $teknisiList = User::where('level', 'teknisi')->get();

        return view('submission.detail-submission', compact('submission', 'progress','historyPengajuan', 'teknisiList'));
    }

    function update(Request $request, $id) {
        $submission = Submission::find($id);
        $submission->status = $request->status;
        $submission->save();
            
        $today = Carbon::now();
        $formattedDate = $today->format('y-m-d');
    
        $history = [
            'id_user' => Auth::user()->id,
            'status' => 'masuk ke tahap teknisi',
            'description' => 'tiket di ' . $request->status . ' oleh ' . Auth::user()->name,
            'submissions_id' => $submission->id
        ];
        
        History::create($history);

        $data = [
            'title' => $submission->title,
            'message' => 'Pengajuan mu telah di '. $submission->status . ' oleh ' . Auth::user()->name,
            'request' => $submission->user->name,
            'barang' => $submission->equipments->name,
            'tanggal' => $submission->created_at,
            'instansi' => $submission->equipments->instansi->name,
            'layanan' => $submission->conditions
        ];
    
        // Kirim email ke admin
        Mail::to($submission->user->email)->send(new PengajuanEmail($data));
    
        // Berikan respon untuk Ajax
        return redirect()->back()->with('success', 'Data Peralatan Berhasil Diupdate');
    }
}