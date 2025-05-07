<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    //
    public function index()
    {

        $akademiks = Akademik::latest()->first();

        return view('akademik.index', compact('akademiks'));
    }
}
