<x-layout>
    <x-slot:card_title>Pengajuan Cuti</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">NIP Pegawai</th>
            <td>{{ $pegawai->nip }}</td>
        </tr>
        <tr>
            <th class="w-25">Nama Pegawai</th>
            <td>{{ $pegawai->nama }}</td>
        </tr>
        <tr>
            <th class="w-25">Jenis Kelamin</th>
            <td>{{ $pegawai->gender }}</td>
        </tr>
        <tr>
            <th class="w-25">Tempat Lahir</th>
            <td>{{ $pegawai->tmp_lahir}}</td>
        </tr>
        <tr>
            <th class="w-25">Nomer Telpon</th>
            <td>{{ $pegawai->telpon }}</td>
        </tr>
        <tr>
            <th class="w-25">Alamat</th>
            <td>{{ $pegawai->alamat }}</td>
        </tr>
        <tr>
            <th class="w-25">ID Divisi</th>
            <td>{{ $pegawai->divisi_id }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('pegawai') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
