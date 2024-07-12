<x-layout>
    <x-slot:card_title>Divisi</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Kode</th>
            <td>{{ $divisi->kode }}</td>
        </tr>
        <tr>
            <th class="w-25">Nama</th>
            <td>{{ $divisi->nama }}</td>
        </tr>
        <tr>
            <th class="w-25">Manager</th>
            <td>{{ $divisi->manager }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('divisi') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
