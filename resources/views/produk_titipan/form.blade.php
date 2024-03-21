<div class="modal fade" id="modalFormProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('produk_titipan.store') }}">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="col-sm-8">
                            <input type="number" name="harga_beli" id="harga_beli" onchange="hitungHargaJual()" min="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="text" id="harga_jual" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="stok" id="stok">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="keterangan" id="keterangan">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>