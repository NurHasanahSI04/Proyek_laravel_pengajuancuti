<x-layout>
    <x-slot:card_title>Edit Jatah Cuti</x-slot>
    <form action="{{ route('jatahcuti.update', $jatahcuti->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $jatahcuti->tahun }}">
            @error('tahun')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $jatahcuti->jumlah }}">
            @error('jumlah')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="pegawai_nip">NIP Pegawai</label>
            <input type="text" class="form-control" id="pegawai_nip" name="pegawai_nip" value="{{ $jatahcuti->pegawai_nip }}">
            @error('pegawai_nip')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('jatahcuti') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
</x-layout>
