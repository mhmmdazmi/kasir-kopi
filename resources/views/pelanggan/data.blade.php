<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($pelanggan as $p)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telp }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPelanggan" data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama_pelanggan }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('pelanggan.destroy', $p) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $p->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>