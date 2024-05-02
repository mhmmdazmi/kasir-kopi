<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga Menu</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($menu as $men)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $men->nama_menu }}</td>
                    <td>{{ $men->harga_menu }}</td>
                    <td>{{ $men->jenis_id }}</td>
                    <td>{{ $men->deskripsi }}</td>
                    <td>{{ $men->qty }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormMenu" data-mode="edit" data-id="{{ $men->id }}" data-nama_menu="{{ $men->nama_menu }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('menu.destroy', $men) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $men->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>