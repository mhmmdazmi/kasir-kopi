<div class="modal fade" id="modalFormStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="stok">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="menu_id" class="col-sm-4 col-form-label">Menu Id</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="menu_id" id="menu_id">
            </div>
          </div>
          <div class="form-group row">
            <label for="qty" class="col-sm-4 col-form-label">Jumlah</label>
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