<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($jenis as $jeni)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $jeni->nama_jenis }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormJenis" data-mode="edit" data-id="{{ $jeni->id }}" data-nama_jenis="{{ $jeni->nama_jenis }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('jenis.destroy', $jeni) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $jeni->id }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>