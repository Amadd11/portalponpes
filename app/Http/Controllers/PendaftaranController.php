<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\InformasiPendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $informasiPendaftaran = InformasiPendaftaran::first();

        $pengumumans = Pengumuman::latest()->take(5)->get();
        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('informasi.pendaftaran', compact('informasiPendaftaran', 'pengumumans', 'randomPosts'));
    }
}
