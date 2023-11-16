<?php

namespace App\Http\Controllers;

use App\Models\Step15;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KepalaLabController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('kepalalab.home', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('kepalalab.timeline', compact('data'));
    }
    public function verifikasikepalalab($id)
    {
        $step15 = Timeline::find($id)->step_limabelas;
        if ($step15 == null) {
            $n = new Step15;
            $n->timeline_id = $id;
            $n->verifikasikepalalab = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step15->update([
                'verifikasikepalalab' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }

    public function kirimstep15($id)
    {
        Timeline::find($id)->update([
            'step' => 15,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
