<?php

namespace App\Http\Controllers;

use App\Models\Step2;
use App\Models\Step4;
use App\Models\Step7;
use App\Models\Step8;
use App\Models\Step13;
use App\Models\Step16;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;

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

    public function verifikasiidentifikasi($id)
    {
        $step8 = Timeline::find($id)->step_delapan;
        if ($step8 == null) {
            $n = new Step8;
            $n->timeline_id = $id;
            $n->verifikasiidentifikasi = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step8->update([
                'verifikasiidentifikasi' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }

    public function verifikasisampleterima($id)
    {
        $step7 = Timeline::find($id)->step_tujuh;
        if ($step7 == null) {
            $n = new Step7;
            $n->timeline_id = $id;
            $n->verifikasisampleterima = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step7->update([
                'verifikasisampleterima' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function verifikasiselesaiisi($id)
    {
        $step13 = Timeline::find($id)->step_tigabelas;
        if ($step13 == null) {
            $n = new Step13;
            $n->timeline_id = $id;
            $n->verifikasiselesaiisi = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step13->update([
                'verifikasiselesaiisi' => 1,
            ]);

            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        }
    }
    public function verifikasiuploadlhu($id)
    {
        $step16 = Timeline::find($id)->step_enambelas;
        if ($step16 == null) {
            $n = new Step16;
            $n->timeline_id = $id;
            $n->verifikasiuploadlhu = 1;
            $n->save();
            Session::flash('success', 'Verifikasi Di simpan');
            return back();
        } else {
            $step16->update([
                'verifikasiuploadlhu' => 1,
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


    public function kirimstep7($id)
    {
        Timeline::find($id)->update([
            'step' => 7,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function kirimstep8($id)
    {
        Timeline::find($id)->update([
            'step' => 8,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function kirimstep13($id)
    {
        Timeline::find($id)->update([
            'step' => 13,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }

    public function kirimstep16($id)
    {
        Timeline::find($id)->update([
            'step' => 16,
        ]);

        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }


    public function uploadInvoice(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file'  => 'mimes:jpg,png,pdf|max:2048',
        ]);

        $user =  Timeline::find($req->timeline_id)->user;

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus gambar atau PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . $user->username;

        if ($req->file == null) {
            $filename = Timeline::find($req->timeline_id)->file_invoice;
        } else {
            $file = $req->file('file');
            $ext = $req->file->getClientOriginalExtension();
            $filename = 'file_invoice' . uniqid() . '.' . $ext;
            $file->move($path, $filename);
        }
        $data = Timeline::find($req->timeline_id)->update([
            'file_invoice' => $filename,
        ]);

        Session::flash('success', 'Berhasil Di upload');
        return back();
    }

    public function uploadLHU(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file'  => 'mimes:jpg,png,pdf|max:2048',
        ]);

        $user =  Timeline::find($req->timeline_id)->user;

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus gambar atau PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . $user->username;

        if ($req->file == null) {
            $filename = Timeline::find($req->timeline_id)->file_lhu;
        } else {
            $file = $req->file('file');
            $ext = $req->file->getClientOriginalExtension();
            $filename = 'file_lhu' . uniqid() . '.' . $ext;
            $file->move($path, $filename);
        }
        $data = Timeline::find($req->timeline_id)->update([
            'file_lhu' => $filename,
        ]);

        Session::flash('success', 'Berhasil Di upload');
        return back();
    }
}
