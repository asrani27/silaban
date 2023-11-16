<?php

namespace App\Http\Controllers;

use App\Models\Step14;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KepalaTUController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('kepalatu.home', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('kepalatu.timeline', compact('data'));
    }
    public function verifikasikepalatu($id)
    {
        $step14 = Timeline::find($id)->step_empatbelas;
        if ($step14 == null) {
            $n = new Step14;
            $n->timeline_id = $id;
            $n->verifikasikepalatu = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step14->update([
                'verifikasikepalatu' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }

    public function kirimstep14($id)
    {
        Timeline::find($id)->update([
            'step' => 14,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
