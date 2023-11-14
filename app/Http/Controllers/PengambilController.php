<?php

namespace App\Http\Controllers;

use App\Models\Step5;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengambilController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('pengambil.home', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('pengambil.timeline', compact('data'));
    }
    public function verifikasitindaklanjut($id)
    {
        $step5 = Timeline::find($id)->step_lima;
        if ($step5 == null) {
            $n = new Step5;
            $n->timeline_id = $id;
            $n->verifikasitindaklanjut = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step5->update([
                'verifikasitindaklanjut' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
}
