<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    //
    public function index()
    {
        // Ambil semua data pengumuman dengan paginasi (misalnya, 9 per halaman)
        $pengumumans = Pengumuman::latest()->paginate(5);

        // Ambil data untuk sidebar
        $randomPosts = Berita::where('status', 'publish')->inRandomOrder()->take(5)->get();

        // Kirim data ke view baru
        return view('informasi.pengumuman', compact('pengumumans', 'randomPosts'));
    }
}
