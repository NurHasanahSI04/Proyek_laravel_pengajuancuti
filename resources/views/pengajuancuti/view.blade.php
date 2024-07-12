<x-layout>
    <x-slot:card_title>Pengajuan Cuti</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Tanggal Awal</th>
            <td>{{ $pengajuancuti->tanggal_awal }}</td>
        </tr>
        <tr>
            <th class="w-25">Tanggal Akhir</th>
            <td>{{ $pengajuancuti->tanggal_akhir }}</td>
        </tr>
        <tr>
            <th class="w-25">Jumlah</th>
            <td>{{ $pengajuancuti->jumlah }}</td>
        </tr>
        <tr>
            <th class="w-25">Keterangan</th>
            <td>{{ $pengajuancuti->ket }}</td>
        </tr>
        <tr>
            <th class="w-25">Status</th>
            <td>{{ $pengajuancuti->status }}</td>
        </tr>
        <tr>
            <th class="w-25">NIP Pegawai</th>
            <td>{{ $pengajuancuti->pegawai_nip }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('pengajuancuti') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
