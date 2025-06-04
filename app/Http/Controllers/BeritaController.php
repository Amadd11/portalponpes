<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $artikels = Berita::query()
            ->when($request->has('kategori') && $request->kategori != '', function ($query) use ($request) {
                $query->where('category_id', $request->kategori);
            })
            ->when($request->has('q'), function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request->q . '%');
            })
            ->where('status', 'publish')
            ->orderBy('tanggal_publish', 'desc')
            ->paginate(5); // Default 5, bisa diubah via request

        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $pengumumans = Pengumuman::latest()->take(5)->get();


        return view('informasi.artikel.index', compact(
            'artikels',
            'categories',
            'randomPosts',
            'pengumumans'
        ));
    }

    public function show($slug)
    {
        $artikel = Berita::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        // Artikel terkait (kategori sama, bukan artikel sekarang)
        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $pengumumans = Pengumuman::latest()->take(5)->get();

        return view('informasi.artikel.show', compact(
            'artikel',
            'randomPosts',
            'pengumumans'
        ));
    }
}
