<div class="modal fade" id="modalFormMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="menu">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_menu" id="nama_menu">
            </div>
          </div>
          <div class="form-group row">
            <label for="harga_menu" class="col-sm-4 col-form-label">Harga Menu</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="harga_menu" id="harga_menu">
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jenis_id" id="jenis_id">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="deskripsi" id="deskripsi">
            </div>
          </div>
          <div class="form-group row">
            <label for="qty" class="col-sm-4 col-form-label">Qty</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="qty" id="qty">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>