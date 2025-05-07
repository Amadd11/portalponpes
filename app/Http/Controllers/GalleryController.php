<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {

        $galeris = Gallery::latest()->paginate(12);

        return view('gallery.foto', compact('galeris',));
    }
}
