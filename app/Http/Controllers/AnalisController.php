<?php

namespace App\Http\Controllers;

use App\Models\Step10;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnalisController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('analis.home', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('analis.timeline', compact('data'));
    }
    public function verifikasilaksanakan($id)
    {
        $step10 = Timeline::find($id)->step_sepuluh;
        if ($step10 == null) {
            $n = new Step10;
            $n->timeline_id = $id;
            $n->verifikasilaksanakan = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step10->update([
                'verifikasilaksanakan' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function kirimstep10($id)
    {
        Timeline::find($id)->update([
            'step' => 10,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
