<x-layout>
    @if (Auth::user()->role == 'admin')
    <div class="mb-2">
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    @endif
    <x-slot:card_title>Pegawai</x-slot>
    <table id="table" class="table" table-bordered table-hover>
        <thead>
            <tr>
                <th>Id</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Nomer Telpon</th>
                <th>Alamat</th>
                <th>ID DIvisi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_pegawai as  $pegawai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->gender }}</td>
                <td>{{ $pegawai->tmp_lahir }}</td>
                <td>{{ $pegawai->tgl_lahir }}</td>
                <td>{{ $pegawai->telpon }}</td>
                <td>{{ $pegawai->alamat }}</td>
                <td>{{ $pegawai->divisi_id }}</td>
                <td>
                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="post">
                        <a href="{{ route('pegawai.view', $pegawai->id) }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-eye"></i></a>
                                @if (Auth::user()->role == 'admin')

                                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        </script>
    @endpush
</x-layout>
