<x-layout>
    <x-slot:card_title>Edit Divisi</x-slot>
    <form action="{{ route('divisi.update', $divisi->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" value="{{ $divisi->kode }}">
            @error('kode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $divisi->nama }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="manager">Manager</label>
            <input type="text" class="form-control" id="manager" name="manager" value="{{ $divisi->manager }}">
            @error('manager')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('divisi') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
</x-layout>
