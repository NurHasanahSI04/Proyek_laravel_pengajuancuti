<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DivisiController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Divisi'
        ];

        $list_divisi =  Divisi::all();
        View::share($data_layout);
        return view('divisi.show', ['list_divisi' => $list_divisi]);
    }

        public function create()
    {
        $divisi = Divisi::all();
        return view('divisi.create', compact('divisi'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'manager' => 'required',
        ]);

        Divisi::create($request->all());

        return redirect(route('divisi'))->with('pesan', 'Data Tersimpan');
    }
    public function edit(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('divisi.edit', ['divisi' => $divisi]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->update($request->all());

        return redirect(route('divisi'))->with('pesan', 'Data Berhasil Diperbaharui');
    }
    public function view(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('divisi.view', ['divisi' => $divisi]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Divisi::find($id)->delete();
        return redirect(route('divisi'))->with('pesan', 'Data Terhapus');
    }
}
