<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    //
    public function index()
    {

        $brosurs = Brosur::latest()->get();

        return view('brosur.index', compact('brosurs'));
    }
}
