<x-layout>
    <x-slot:card_title>Tambah Divisi</x-slot>
    <form action="{{ route('divisi.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode Divisi" value="{{ old('kode') }}">
            @error('kode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Divisi" value="{{ old('nama') }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="manager">Manager</label>
            <input type="text" class="form-control" id="manager" name="manager" placeholder="Masukan Nama Manager Divisi" value="{{ old('manager') }}">
            @error('manager')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('divisi') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
