<?php

namespace App\Http\Controllers;

use App\Models\Pengajuancuti;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PengajuancutiController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Pengajuan Cuti'
        ];

        $list_pengajuan_cuti =  Pengajuancuti::all();
        View::share($data_layout);
        return view('pengajuancuti.show', ['list_pengajuan_cuti' => $list_pengajuan_cuti]);
    }

    public function create()
    {
        $list_pengajuan_cuti = Pengajuancuti::all();
        return view('pengajuancuti.create', compact('list_pengajuan_cuti'));
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

        return redirect(route('pengajuancuti'))->with('pesan', 'Data Tersimpan');
    }
    public function edit(string $id)
    {
        $list_pengajuan_cuti = Pengajuancuti::findOrFail($id);
        return view('pengajuancuti.edit', ['pengajuancuti' => $list_pengajuan_cuti]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tanggal_awal' => 'required',
        ]);

        $list_pengajuan_cuti = Pengajuancuti::findOrFail($id);
        $list_pengajuan_cuti->update($request->all());

        return redirect(route('pengajuancuti'))->with('pesan', 'Data Berhasil Diperbaharui');
    }
    public function view(string $id)
    {
        $list_pengajuan_cuti = Pengajuancuti::findOrFail($id);
        return view('pengajuancuti.view', ['pengajuancuti' => $list_pengajuan_cuti]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Pengajuancuti::find($id)->delete();
        return redirect(route('pengajuancuti'))->with('pesan', 'Data Terhapus');
    }
}
