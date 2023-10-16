<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Timeline;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{

    public function index()
    {
        $data = Timeline::orderBy('id', 'DESC')->paginate(15);
        return view('superadmin.home', compact('data'));
    }
    public function pelanggan()
    {
        $data = User::where('is_petugas', null)->where('username', '!=', 'superadmin')->paginate(10);

        return view('superadmin.pelanggan.index', compact('data'));
    }

    public function timeline($id)
    {
        $data = Timeline::find($id);
        return view('superadmin.pelanggan.timeline', compact('data'));
    }

    public function deletePermohonan($id)
    {
        Timeline::find($id)->delete();
        Session::flash('success', 'Berhasil Di hapus');
        return redirect('/superadmin/beranda');
    }
}
