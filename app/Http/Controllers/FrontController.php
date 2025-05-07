<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\CarouselImages;
use App\Models\FAQ;
use App\Models\Fasilitas;
use App\Models\Gallery;
use App\Models\InformasiPendaftaran;
use App\Models\Pengumuman;
use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $fasilitas = Fasilitas::take(6)->get();
        $galleries = Gallery::take(10)->get();
        $beritas = Berita::where('status', 'publish')->latest()->take(3)->get();
        $images = CarouselImages::all();
        $faqs = FAQ::all();
        $programUnggulan = ProgramUnggulan::all();
        $pengumumans = Pengumuman::latest()->take(5)->get();
        $informasiPendaftaran = InformasiPendaftaran::latest()->value('link_pendaftaran');

        return view('landingpage', compact(
            'fasilitas',
            'pengumumans',
            'faqs',
            'galleries',
            'beritas',
            'images',
            'programUnggulan',
            'informasiPendaftaran'
        ));
    }
}
