<?php

namespace App\Http\Controllers;

use App\Models\Step9;
use App\Models\Step11;
use App\Models\Step12;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenyeliaController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('penyelia.home', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('penyelia.timeline', compact('data'));
    }
    public function verifikasisuratuji($id)
    {
        $step9 = Timeline::find($id)->step_sembilan;
        if ($step9 == null) {
            $n = new Step9;
            $n->timeline_id = $id;
            $n->verifikasisuratuji = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step9->update([
                'verifikasisuratuji' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function kirimstep9($id)
    {
        Timeline::find($id)->update([
            'step' => 9,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function verifikasirekaman($id)
    {
        $step11 = Timeline::find($id)->step_sebelas;
        if ($step11 == null) {
            $n = new Step11;
            $n->timeline_id = $id;
            $n->verifikasirekaman = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step11->update([
                'verifikasirekaman' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function kirimstep11($id)
    {
        Timeline::find($id)->update([
            'step' => 11,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function verifikasirekapitulasi($id)
    {
        $step12 = Timeline::find($id)->step_duabelas;
        if ($step12 == null) {
            $n = new Step12;
            $n->timeline_id = $id;
            $n->verifikasirekapitulasi = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step12->update([
                'verifikasirekapitulasi' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function kirimstep12($id)
    {
        Timeline::find($id)->update([
            'step' => 12,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
