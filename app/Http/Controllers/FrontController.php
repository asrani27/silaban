<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/superadmin/beranda');
            } elseif (Auth::user()->hasRole('pelanggan')) {
                return redirect('/pelanggan/home');
            } elseif (Auth::user()->hasRole('petugas_administrasi')) {
                return redirect('/administrasi/home');
            } elseif (Auth::user()->hasRole('pengawas_teknis')) {
                return redirect('/teknis/home');
            } else {
                return redirect('/rolelain/home');
            }
        }
        return view('home');
    }
}
