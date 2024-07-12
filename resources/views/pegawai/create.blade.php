<x-layout>
    <x-slot:card_title>Tambah Pegawai</x-slot>
    <form action="{{ route('pegawai.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nip">NIP Pegawai</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP Pegawai" value="{{ old('nip') }}">
            @error('nip')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pegawai" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" id="gender1" value="L"
                    {{ old('gender') == 'L' ? 'checked' : '' }}>
                <label for="gender1" class="custom-control-label">Laki-laki</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" id="gender2" value="P"
                    {{ old('gender') == 'P' ? 'checked' : '' }}>
                <label for="gender2" class="custom-control-label">Perempuan</label>
            </div>
            @error('gender')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Masukan Tempat Lahir Pegawai" value="{{ old('tmp_lahir') }}">
            @error('tmp_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
                <input type="date" class="form-control datetimepicker-input" value="{{ old('tgl_lahir') }}"
                       data-target="#tgl_lahir" name="tgl_lahir">
                <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                </div>
            </div>
            @error('tgl_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telpon">Nomer Telpon</label>
            <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Masukan Nomer Telpon Pegawai" value="{{ old('telpon') }}">
            @error('telpon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="divisi_id">ID Divisi</label>
            <input type="text" class="form-control" id="divisi_id" name="divisi_id" placeholder="Masukan Id Divisi Pegawai" value="{{ old('divisi_id') }}">
            @error('divisi_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('pegawai') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
