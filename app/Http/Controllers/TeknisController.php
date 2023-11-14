<?php

namespace App\Http\Controllers;

use App\Models\Step2;
use App\Models\Step3;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class TeknisController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('teknis.home', compact('data'));
    }
    public function verifikasipengambilansample($id)
    {
        $step3 = Timeline::find($id)->step_tiga;
        if ($step3 == null) {
            $n = new Step3;
            $n->timeline_id = $id;
            $n->verifikasi_pengambilan_sample = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step3->update([
                'verifikasi_pengambilan_sample' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('teknis.timeline', compact('data'));
    }

    public function kirimstep3($id)
    {
        Timeline::find($id)->update([
            'step' => 3,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
