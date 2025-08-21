<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Berita;
use App\Models\Cabang;
use App\Models\Gallery;
use App\Models\Fasilitas;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CarouselImages;
use App\Models\ProgramUnggulan;
use App\Models\LembagaPendidikan;
use App\Models\GelombangPendaftaran;
use App\Models\InformasiPendaftaran;

class FrontController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::take(6)->get();
        $galleries = Gallery::take(10)->get();
        $beritas = Berita::where('status', 'publish')->latest()->take(3)->get();
        $images = CarouselImages::all();
        $faqs = FAQ::all();
        $programUnggulan = ProgramUnggulan::all();
        $pengumumans = Pengumuman::latest()->take(4)->get();
        $informasiPendaftaran = InformasiPendaftaran::latest()
            ->select('link_pendaftaran', 'brosur_pendaftaran')
            ->first();
        $gelombangAktif = GelombangPendaftaran::where('is_active', true)->first();
        $lembagaPendidikan = LembagaPendidikan::all();

        return view('landingpage', compact(
            'fasilitas',
            'pengumumans',
            'faqs',
            'galleries',
            'beritas',
            'images',
            'programUnggulan',
            'informasiPendaftaran',
            'gelombangAktif',
            'lembagaPendidikan'
        ));
    }

    /**
     * Method untuk menangani logika pencarian di berbagai model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:3',
        ]);

        $query = $request->input('q');
        $queryLower = Str::lower($query);

        // Redirect langsung jika keyword tertentu ditemukan
        if (Str::contains($queryLower, ['pendaftaran', 'daftar siswa', 'info pendaftaran', 'daftar'])) {
            return redirect()->route('informasi.pendaftaran');
        }

        if (Str::contains($queryLower, ['fasilitas', 'gedung', 'ruangan', 'asrama', 'kelas'])) {
            return redirect()->route('profil.fasilitas');
        }

        // ... (lanjutkan proses pencarian seperti biasa)
        $beritaResults = Berita::where('status', 'publish')
            ->where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('isi', 'LIKE', "%{$query}%");
            })->get();

        $faqResults = FAQ::where('question', 'LIKE', "%{$query}%")
            ->orWhere('answer', 'LIKE', "%{$query}%")
            ->get();

        $lembagaResults = LembagaPendidikan::where('nama_lembaga', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        $programResults = ProgramUnggulan::where('nama_program', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        $results = collect([])
            ->concat($beritaResults)
            ->concat($faqResults)
            ->concat($lembagaResults)
            ->concat($programResults);

        return view('searchresults', compact('results', 'query'));
    }

    public function showLembaga($slug)
    {
        $lembaga = LembagaPendidikan::where('slug', $slug)->firstOrFail();

        // Data untuk sidebar (opsional, sesuaikan dengan kebutuhan)
        $pengumumans = Pengumuman::latest()->take(4)->get();
        $randomPosts = Berita::where('status', 'publish')->inRandomOrder()->take(5)->get();

        return view('lembaga.show', compact('lembaga', 'pengumumans', 'randomPosts'));
    }


    public function showPengumuman($slug)
    {
        // Mengambil data pengumuman yang sedang dilihat
        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();

        // Mengambil 5 pengumuman lain untuk sidebar (kecuali yang sedang dilihat)
        $otherPengumumans = Pengumuman::where('slug', '!=', $slug)->latest()->take(5)->get();

        // Mengambil data artikel acak untuk sidebar
        $randomPosts = Berita::where('status', 'publish')->inRandomOrder()->take(5)->get();

        // Kirim semua data ke view
        return view('pengumuman.show', compact('pengumuman', 'otherPengumumans', 'randomPosts'));
    }
    public function showCabang($slug)
    {
        // Ambil data cabang beserta relasi ke lembaga pendidikannya
        $cabang = Cabang::with('lembagaPendidikan')->where('slug', $slug)->firstOrFail();

        // Data untuk sidebar (sesuaikan dengan kebutuhan)
        $pengumumans = Pengumuman::latest()->take(4)->get();
        $randomPosts = Berita::where('status', 'publish')->inRandomOrder()->take(5)->get();

        return view('lembaga.cabang.details', compact('cabang', 'pengumumans', 'randomPosts'));
    }

    public function showProgram($slug)
    {
        $program = ProgramUnggulan::where('slug', $slug)->firstOrFail();

        // Data untuk sidebar (sesuaikan dengan kebutuhan)
        $pengumumans = Pengumuman::latest()->take(4)->get();
        $randomPosts = Berita::where('status', 'publish')->inRandomOrder()->take(5)->get();

        return view('program.show', compact('program', 'pengumumans', 'randomPosts'));
    }
}
