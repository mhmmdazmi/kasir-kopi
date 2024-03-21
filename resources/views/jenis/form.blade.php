<div class="modal fade" id="modalFormJenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="jenis">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama_jenis" class="col-sm-4 col-form-label">Nama Jenis</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_jenis" id="nama_jenis">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>