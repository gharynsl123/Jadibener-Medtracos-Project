<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Progress;
use App\Submission;
use Carbon\Carbon;
use App\Peralatan;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProgressController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    function store(Request $request) {
        $progress = $request->all();

        $today = Carbon::now();
        $formatedDate = $today->format('y-m-d');
        $formattedSV = $today->format('sv');
        $slugvalue = "P" . $formattedSV;
        
        $progress['slug'] = Str::slug($slugvalue).'-'.$formatedDate;
        $progress['id_instansi'] = $request->id_instansi;

        // create
        $dataProgress = Progress::create($progress);

        $history = [
            'id_user' => Auth::user()->id,
            'status' => 'progress update' ,
            'description' => 'progress dilakukan oleh ' . Auth::user()->name . ' pada tanggal ' . $dataProgress->schedule,
            'id_progress' => $dataProgress->id,
            'submissions_id' => $request->submissions_id,
        ];

        History::create($history);
        return redirect()->back()->with('success', 'Progress has been updated');
    }

    function update(Request $request, $id) {
        $progress = Progress::find($id);

        // Cek jika id_user sudah terisi maka update kolom yang lain
        if (!is_null($progress->id_user)) {
            // Update kolom yang lain
            $progress->work_value = $request->work_value;
            $progress->description = $request->description;
    
            $progress->save();

            $history = [
                'id_user' => Auth::user()->id,
                'status' => 'progress update' ,
                'description' => 'progress di update oleh ' . Auth::user()->name . ' dengan nilai pengerjaan ' . $progress->work_value . ' dan keterangan ' . $progress->description,
                'id_progress' => $progress->id,
                'submissions_id' => $request->submissions_id,
            ];

            $submission = Submission::find($request->submissions_id);

            if ($progress->work_value == 100) {
                $history['status'] = 'selesai';
                $submission->status = 'closing & unpaid';
            }
        
            $submission->save();
            History::create($history);
    
            return redirect()->back()->with('success', 'Progress has been updated');
        }
        
        return redirect()->back()->with('success', 'Progress has been updated');
    }


    public function payment(Request $request, $id) {
        $submission = Submission::find($id);

        $data = $request->all();
        $data['status'] = 'selesai';

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('public/bukti_pemabayaran', $photoName);
            $data['photo'] = $photoName;
        }

        $history = [
            'id_user' => Auth::user()->id,
            'status' => 'pebayaran' ,
            'description' => 'bukti pebayaran di kirim oleh ' . Auth::user()->name,
            'equipment_id' => $submission->equipments->id,
            'submissions_id' => $submission->id,
        ];

        $submission->update($data);

        return redirect()->back()->with('success', 'Bukti Pembayaran telah di Aploud');
    }
}
