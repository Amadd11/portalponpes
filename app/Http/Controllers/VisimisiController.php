<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    //
    public function index()
    {

        $pengumumans = Pengumuman::latest()->take(5)->get();
        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('profil.visimisi', compact('pengumumans', 'randomPosts'));
    }
}
