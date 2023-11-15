<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

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
}
