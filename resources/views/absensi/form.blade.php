<div class="modal fade" id="modalFormAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('absensi.store') }}">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_masuk" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="waktu_masuk" id="waktu_masuk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <select name="status" id="">
                            <option value="Masuk">Masuk</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_keluar" class="col-sm-4 col-form-label">Waktu Keluar</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" name="waktu_keluar" id="waktu_keluar">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>