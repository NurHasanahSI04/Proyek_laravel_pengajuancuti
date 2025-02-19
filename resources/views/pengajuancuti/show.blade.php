<x-layout>
    <x-slot:card_title>Pengajuan Cuti</x-slot>
    @if (Auth::user()->role == 'admin')
    <div class="mb-2">
        <a href="{{ route('pengajuancuti.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    @endif
    <table id="table" class="table" table-bordered table-hover>
        <thead>
            <tr>
                <th>Id</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Pegawai NIP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_pengajuan_cuti as  $pengajuan_cuti)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengajuan_cuti->tanggal_awal }}</td>
                <td>{{ $pengajuan_cuti->tanggal_akhir }}</td>
                <td>{{ $pengajuan_cuti->jumlah }}</td>
                <td>{{ $pengajuan_cuti->ket }}</td>
                <td>{{ $pengajuan_cuti->status }}</td>
                <td>{{ $pengajuan_cuti->pegawai_nip }}</td>
                <td>
                    <form action="{{ route('pengajuancuti.destroy', $pengajuan_cuti->id) }}" method="post">
                        <a href="{{ route('pengajuancuti.view', $pengajuan_cuti->id) }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-eye"></i></a>
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('pengajuancuti.edit', $pengajuan_cuti->id) }}" class="btn btn-warning btn-sm"><i
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
