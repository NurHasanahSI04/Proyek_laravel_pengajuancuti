<x-layout>
    <x-slot:card_title>Tambah Pengajuan Cuti</x-slot>
    <form action="{{ route('pengajuancuti.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <div class="input-group date" id="tanggal_awal" data-target-input="nearest">
                <input type="date" class="form-control datetimepicker-input" value="{{ old('tanggal_awal') }}"
                       data-target="#tanggal_awal" name="tanggal_awal">
                <div class="input-group-append" data-target="#tanggal_awal" data-toggle="datetimepicker">
                </div>
            </div>
            @error('tanggal_awal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <div class="input-group date" id="tanggal_akhir" data-target-input="nearest">
                <input type="date" class="form-control datetimepicker-input" value="{{ old('tanggal_akhir') }}"
                       data-target="#tanggal_akhir" name="tanggal_akhir">
                <div class="input-group-append" data-target="#tanggal_akhir" data-toggle="datetimepicker">
                </div>
            </div>
            @error('tanggal_akhir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Cuti" value="{{ old('jumlah') }}">
            @error('jumlah')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukan Keterangan Cuti" value="{{ old('ket') }}">
            @error('ket')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Masukan Status Cuti" value="{{ old('status') }}">
            @error('status')
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
        <a href="{{ route('pengajuancuti') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
