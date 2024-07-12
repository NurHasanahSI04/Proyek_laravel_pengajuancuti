<x-layout>
    <x-slot:card_title>Jatah Cuti</x-slot>
    <table id="table" class="table table-bordered table-hover mb-2">
        <tr>
            <th class="w-25">Tahun</th>
            <td>{{ $jatah_cuti->tahun }}</td>
        </tr>
        <tr>
            <th class="w-25">Jumlah</th>
            <td>{{ $jatah_cuti->jumlah }}</td>
        </tr>
        <tr>
            <th class="w-25">NIP Pegawai</th>
            <td>{{ $jatah_cuti->pegawai_nip }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('jatahcuti') }}" class="btn btn-danger">Kembali</a>
    </div>
</x-layout>
