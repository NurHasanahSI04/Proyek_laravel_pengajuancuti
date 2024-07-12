<x-layout>
    <x-slot:card_title>Divisi</x-slot>
    @if (Auth::user()->role == 'admin')
    <div class="mb-2">
        <a href="{{ route('divisi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    @endif
    <table id="table" class="table" table-bordered table-hover>
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Manager</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_divisi as  $divisi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $divisi->kode }}</td>
                <td>{{ $divisi->nama }}</td>
                <td>{{ $divisi->manager }}</td>
                <td>
                    <form action="{{ route('divisi.destroy', $divisi->id) }}" method="post">
                        <a href="{{ route('divisi.view', $divisi->id) }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-eye"></i></a>
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-warning btn-sm"><i
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
