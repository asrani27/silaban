<?php

namespace App\Http\Controllers;

use App\Models\Step1;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function home()
    {
        $data = Timeline::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        return view('pelanggan.home', compact('data'));
    }
    public function uploadBukti(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'file'  => 'mimes:jpg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            $req->flash();
            Session::flash('error', 'File harus gambar atau PDF dan Maks 2MB');
            return back();
        }

        $path = public_path('storage') . '/' . Auth::user()->username;

        if ($req->file == null) {
            $filename = Timeline::find($req->timeline_id)->file_buktibayar;
        } else {
            $file = $req->file('file');
            $ext = $req->file->getClientOriginalExtension();
            $filename = 'file_buktibayar' . uniqid() . '.' . $ext;
            $file->move($path, $filename);
        }
        $data = Timeline::find($req->timeline_id)->update([
            'file_buktibayar' => $filename,
        ]);

        Session::flash('success', 'Berhasil Di upload');
        return back();
    }

    public function permohonan($id)
    {
        return view('pelanggan.step.step1', compact('id'));
    }
    public function addPermohonan()
    {
        return view('pelanggan.permohonan.add');
    }

    public function simpanPermohonan(Request $req)
    {
        $n = new Timeline;
        $n->tanggal = $req->tanggal;
        $n->nama = $req->nama;
        $n->telp = $req->telp;
        $n->user_id = Auth::user()->id;
        $n->save();
        Session::flash('success', 'Berhasil Di simpan');
        return redirect('/pelanggan/home');
    }
    public function editPermohonan($id)
    {
        $data = Timeline::find($id)->step_satu;
        return view('pelanggan.step.step1edit', compact('id', 'data'));
    }
    public function storePermohonan(Request $req, $id)
    {
        $param = $req->all();
        $param['timeline_id'] = $id;
        $param['parameter_uji'] = json_encode($req->parameter_uji);

        $check = Step1::where('timeline_id', $id)->first();
        if ($check == null) {
            //simpan
            Step1::create($param);
            Session::flash('success', 'Berhasil Di simpan');
            return redirect('/pelanggan/timeline/' . $id);
        } else {
            Session::flash('error', 'Sudah ada');
            return back();
        }
    }

    public function kirimPermohonan($id)
    {
        Timeline::find($id)->update([
            'step' => 1,
        ]);
        Session::flash('success', 'Berhasil Di kirim');
        return back();
    }
    public function wordPermohonan($id)
    {
        $data = Timeline::find($id)->step_satu;

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
    public function updatePermohonan(Request $req, $id)
    {
        $param = $req->all();
        $param['parameter_uji'] = json_encode($req->parameter_uji);

        Step1::find($req->step1_id)->update($param);
        Session::flash('success', 'Berhasil Di Update');
        return redirect('/pelanggan/timeline/' . $id);
    }
    public function deletePermohonan($id)
    {
        Timeline::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return redirect('/pelanggan/home');
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('pelanggan.timeline', compact('data'));
    }
}
