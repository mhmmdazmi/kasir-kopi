<div class="modal fade" id="modalFormPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="pelanggan">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan">
            </div>
          </div>
          <div class="form-group row">
            <label for="static-email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="email" id="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="alamat" id="alamat">
            </div>
          </div>
          <div class="form-group row">
            <label for="no_telp" class="col-sm-4 col-form-label">No Telp</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="no_telp" id="no_telp">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>