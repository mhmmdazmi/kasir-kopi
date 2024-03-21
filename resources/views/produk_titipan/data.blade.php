<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Nama Supplier</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($produk_titipan as $prod)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $prod->nama_produk }}</td>
                    <td>{{ $prod->nama_supplier }}</td>
                    <td>{{ $prod->harga_beli }}</td>
                    <td>{{ $prod->harga_jual }}</td>
                    <td class="stok-edit" data-id="{{ $prod->id }}" style="cursor:pointer;">{{ $prod->stok }}</td>
                    <td>{{ $prod->keterangan }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProduk" data-mode="edit" data-id="{{ $prod->id }}" data-nama="{{ $prod->nama_produk }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('produk_titipan.destroy', $prod) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $prod->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>