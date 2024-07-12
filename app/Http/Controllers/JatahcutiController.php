<?php

namespace App\Http\Controllers;

use App\Models\Jatahcuti;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JatahcutiController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Jatah Cuti'
        ];

        $list_jatah_cuti =  Jatahcuti::all();
        View::share($data_layout);
        return view('jatahcuti.show', ['list_jatah_cuti' => $list_jatah_cuti]);
    }
    public function create()
    {
        $list_jatah_cuti = Jatahcuti::all();
        return view('jatahcuti.create', compact('list_jatah_cuti'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tahun' => 'required',
            'jumlah' => 'required',
            'pegawai_nip' => 'required',
        ]);

        Jatahcuti::create($request->all());

        return redirect(route('jatahcuti'))->with('pesan', 'Data Tersimpan');
    }
    public function edit(string $id)
    {
        $list_jatah_cuti = Jatahcuti::findOrFail($id);
        return view('jatahcuti.edit', ['jatahcuti' => $list_jatah_cuti]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        $list_jatah_cuti = Jatahcuti::findOrFail($id);
        $list_jatah_cuti->update($request->all());

        return redirect(route('jatahcuti'))->with('pesan', 'Data Berhasil Diperbaharui');
    }
    public function view(string $id)
    {
        $list_jatah_cuti = Jatahcuti::findOrFail($id);
        return view('jatahcuti.view', ['jatahcuti' => $list_jatah_cuti]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Jatahcuti::find($id)->delete();
        return redirect(route('jatahcuti'))->with('pesan', 'Data Terhapus');
    }
}
