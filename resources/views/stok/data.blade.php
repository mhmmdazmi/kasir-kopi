<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Menu Id</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($stok as $s)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $s->menu_id }}</td>
                    <td>{{ $s->qty }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormStok" data-mode="edit" data-id="{{ $s->id }}" data-nama_barang="{{ $s->menu_id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('stok.destroy', $s) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $s->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>