<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    //
    public function index()
    {

        $faqs = FAQ::orderBy('question', 'asc')->get();
        $pengumumans = Pengumuman::latest()->take(5)->get();
        $randomPosts = Berita::where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('faq.index', compact(
            'faqs',
            'pengumumans',
            'randomPosts'
        ));
    }
}
