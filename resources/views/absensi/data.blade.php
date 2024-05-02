<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Masuk</th>
                    <th>Waktu Masuk</th>
                    <th>Status</th>
                    <th>Waktu Selesai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($absensi as $absen)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $absen->nama_karyawan }}</td>
                    <td>{{ $absen->tanggal_masuk }}</td>
                    <td>{{ $absen->waktu_masuk }}</td>
                    <td>
                        <select class="form-control col-sm edit-status" data-id="{{ $absen->id }}" name="status" id="status">
                            <option value="Masuk" {{ $absen->status === 'Masuk' ? 'selected' : '' }}>Masuk</option>
                            <option value="Sakit" {{ $absen->status === 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Cuti" {{ $absen->status === 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        </select>
                    </td>
                    <td>{{ $absen->waktu_keluar }}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormAbsensi" data-mode="edit" data-id="{{ $absen->id }}" data-nama_jenis="{{ $absen->nama_karyawan }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('absensi.destroy', $absen) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $absen->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>