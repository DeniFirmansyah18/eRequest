<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarpengajuanController extends Controller
{
    public function index()
    {
        return view('pages/admin/pengajuan/daftar-pengajuan');
    }
}
