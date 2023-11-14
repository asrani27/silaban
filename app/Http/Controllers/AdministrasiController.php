<?php

namespace App\Http\Controllers;

use App\Models\Step2;
use App\Models\Step4;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;

class AdministrasiController extends Controller
{
    public function home()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('administrasi.home', compact('data'));
    }
    public function verifikasipembayaran($id)
    {
        $step2 = Timeline::find($id)->step_dua;
        if ($step2 == null) {
            $n = new Step2;
            $n->timeline_id = $id;
            $n->verifikasi_pembayaran = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step2->update([
                'verifikasi_pembayaran' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function verifikasikaji($id)
    {
        $step2 = Timeline::find($id)->step_dua;
        if ($step2 == null) {
            $n = new Step2;
            $n->timeline_id = $id;
            $n->verifikasi_kaji = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step2->update([
                'verifikasi_kaji' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function verifikasisuratsample($id)
    {
        $step4 = Timeline::find($id)->step_empat;
        if ($step4 == null) {
            $n = new Step4;
            $n->timeline_id = $id;
            $n->verifikasisuratsample = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step4->update([
                'verifikasisuratsample' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }

    public function wordPermohonan($id)
    {
        $data = Timeline::find($id)->step_satu;
        if ($data == null) {
            Session::flash('error', 'Belum ada data');
            return back();
        } else {
            $word = new TemplateProcessor(public_path() . '/word/step1.docx');
            $word->setValues([
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'jenis' => $data->jenis,
                'personil' => $data->personel,
                'telp' => $data->telp,
                'email' => $data->email,
                'pembayaran' => $data->pembayaran,
                'tujuan' => $data->tujuan,
                'bidang' => $data->bidang,
                'parameter_uji' => $data->parameter_uji,
            ]);

            $file = 'permohonan_' . $data->id . '_' . $data->nama . '.docx';
            $word->saveAs(public_path() . '/export/' . $file);

            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="' . $file . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

            readfile(public_path() . '/export/' . $file);
        }
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('administrasi.timeline', compact('data'));
    }

    public function kirimstep2($id)
    {
        Timeline::find($id)->update([
            'step' => 2,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function kirimstep4($id)
    {
        Timeline::find($id)->update([
            'step' => 4,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
}
