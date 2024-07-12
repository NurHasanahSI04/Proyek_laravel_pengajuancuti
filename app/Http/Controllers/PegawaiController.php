<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PegawaiController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Kategori'
        ];

        $list_pegawai =  Pegawai::all();
        View::share($data_layout);
        return view('pegawai.show', ['list_pegawai' => $list_pegawai]);
    }
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.create', compact('pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'divisi_id' => 'required',
        ]);

        Pegawai::create($request->all());

        return redirect(route('pegawai'))->with('pesan', 'Data Tersimpan');
    }
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nip' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());

        return redirect(route('pegawai'))->with('pesan', 'Data Berhasil Diperbaharui');
    }
    public function view(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.view', ['pegawai' => $pegawai]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Pegawai::find($id)->delete();
        return redirect(route('pegawai'))->with('pesan', 'Data Terhapus');
    }
}
