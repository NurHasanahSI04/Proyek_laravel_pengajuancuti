<x-layout>
    <x-slot:card_title>Tambah Jatah Cuti</x-slot>
    <form action="{{ route('jatahcuti.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun Jatah Cuti" value="{{ old('tahun') }}">
            @error('tahun')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Jatah Cuti" value="{{ old('jumlah') }}">
            @error('jumlah')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="pegawai_nip">NIP Pegawai</label>
            <input type="text" class="form-control" id="pegawai_nip" name="pegawai_nip" placeholder="Masukan NIP Pegawai" value="{{ old('pegawai_nip') }}">
            @error('pegawai_nip')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('jatahcuti') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
