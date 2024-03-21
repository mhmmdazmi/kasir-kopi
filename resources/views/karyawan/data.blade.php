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
                @foreach ($karyawan as $karya)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $karya->nama }}</td>
                    <td>{{ $karya->email }}</td>
                    <td>{{ $karya->alamat }}</td>
                    <td>{{ $karya->no_telp }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormKaryawan" data-mode="edit" data-id="{{ $karya->id }}" data-nama="{{ $karya->nama }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('karyawan.destroy', $karya) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $karya->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>