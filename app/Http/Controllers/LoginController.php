<?php

namespace App\Http\Controllers;

use captcha;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        // Session::flash('success', 'Ini notifikasi success');
        // Session::flash('warning', 'Ini notifikasi warning');
        // Session::flash('info', 'Ini notifikasi info');
        // Session::flash('error', 'Ini notifikasi error');

        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/superadmin/beranda');
            } elseif (Auth::user()->hasRole('pelanggan')) {
                return redirect('/pelanggan/home');
            } elseif (Auth::user()->hasRole('petugas_administrasi')) {
                return redirect('/administrasi/home');
            } elseif (Auth::user()->hasRole('pengawas_teknis')) {
                return redirect('/teknis/home');
            } elseif (Auth::user()->hasRole('petugas_pengambil_contoh')) {
                return redirect('/pengambil/home');
            } elseif (Auth::user()->hasRole('penyelia')) {
                return redirect('/penyelia/home');
            } elseif (Auth::user()->hasRole('analis')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/analis/home');
            } elseif (Auth::user()->hasRole('kepala_sub_bagian_tata_usaha')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/kepalatu/home');
            } elseif (Auth::user()->hasRole('kepala_laboratorium')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/kepalalab/home');
            } else {
                Session::flash('success', 'Selamat Datang');
                return redirect('/rolelain/home');
            }
        }

        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function storeRegister(Request $req)
    {

        $checkEmail = User::where('email', $req->email)->first();
        if ($checkEmail != null) {
            Session::flash('error', 'Email Sudah digunakan');
            $req->flash();
            return back();
        }

        $checkUsername = User::where('username', $req->username)->first();
        if ($checkUsername != null) {
            Session::flash('error', 'Username Sudah digunakan');
            $req->flash();
            return back();
        }

        if ($req->password != $req->password2) {
            Session::flash('error', 'Repeat Password Tidak Sama');
            $req->flash();
            return back();
        }
        $role = Role::where('name', 'pelanggan')->first();
        $new = new User;
        $new->name = $req->name;
        $new->username = $req->username;
        $new->email = $req->email;
        $new->password = bcrypt($req->password);
        $new->save();
        $new->roles()->attach($role);

        Auth::login($new);
        $req->flash();
        return redirect('/pelanggan/home');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function login(Request $req)
    {
        $remember = $req->remember ? true : false;
        $credential = $req->only('username', 'password');

        if (Auth::attempt($credential, $remember)) {

            if (Auth::user()->hasRole('superadmin')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/superadmin/beranda');
            } elseif (Auth::user()->hasRole('pelanggan')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/pelanggan/home');
            } elseif (Auth::user()->hasRole('petugas_administrasi')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/administrasi/home');
            } elseif (Auth::user()->hasRole('pengawas_teknis')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/teknis/home');
            } elseif (Auth::user()->hasRole('petugas_pengambil_contoh')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/pengambil/home');
            } elseif (Auth::user()->hasRole('penyelia')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/penyelia/home');
            } elseif (Auth::user()->hasRole('analis')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/analis/home');
            } elseif (Auth::user()->hasRole('kepala_sub_bagian_tata_usaha')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/kepalatu/home');
            } elseif (Auth::user()->hasRole('kepala_laboratorium')) {
                Session::flash('success', 'Selamat Datang');
                return redirect('/kepalalab/home');
            } else {
                Session::flash('success', 'Selamat Datang');
                return redirect('/rolelain/home');
            }
        } else {
            Session::flash('error', 'username/password salah');
            $req->flash();
            return back();
        }
    }

    public function rolelain()
    {
        return view('rolelain.home');
    }
}
