<x-layout>
    <x-slot:card_title>Jatah Cuti</x-slot>
    @if (Auth::user()->role == 'admin')
    <div class="mb-2">
        <a href="{{ route('jatahcuti.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    @endif
    <table id="table" class="table" table-bordered table-hover>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>NIP Pegawai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_jatah_cuti as  $jatah_cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jatah_cuti->tahun }}</td>
                <td>{{ $jatah_cuti->jumlah }}</td>
                <td>{{ $jatah_cuti->pegawai_nip }}</td>
                <td>
                    <form action="{{ route('jatahcuti.destroy', $jatah_cuti->id) }}" method="post">
                        <a href="{{ route('jatahcuti.view', $jatah_cuti->id) }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-eye"></i></a>
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('jatahcuti.edit', $jatah_cuti->id) }}" class="btn btn-warning btn-sm"><i
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
