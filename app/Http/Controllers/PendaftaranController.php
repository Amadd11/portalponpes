<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $informasiPendaftaran = InformasiPendaftaran::first();


        return view('informasi.pendaftaran', compact('informasiPendaftaran'));
    }
}
