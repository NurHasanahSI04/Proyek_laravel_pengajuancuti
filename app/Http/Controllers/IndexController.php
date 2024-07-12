<?php

namespace App\Http\Controllers;

use App\Models\Pengajuancuti;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
            'status' => 'required',
            'pegawai_nip' => 'required',
        ]);

        Pengajuancuti::create($request->all());

        return redirect(route('/'))->with('pesan', 'Data Tersimpan');
    }
}
