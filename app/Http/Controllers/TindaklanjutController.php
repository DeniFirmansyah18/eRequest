<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TindaklanjutController extends Controller
{
    public function index()
    {
        return view('pages/admin/pengajuan/tindak-lanjut');
    }
}
