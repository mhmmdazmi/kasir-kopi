<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($kategori as $kate)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $kate->nama_kategori }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormKategori" data-mode="edit" data-id="{{ $kate->id }}" data-nama_kategori="{{ $kate->nama_kategori }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('kategori.destroy', $kate) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $kate->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>