@extends('layout.app')
@section('title', 'jenis')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Jenis</h1>
<!-- DataTales Example  -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
        @endif
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-mode="tambah" data-target="#modalFormJenis">
                Tambah
            </button>
        </div>
        @include('jenis.data')

    </div>

    @endsection
    @include('jenis.form')

    @push('scripts')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })
        $('#modalFormJenis').on('shown.bs.modal', function() {
            $('#nama_jenis').delay(1000).focus().select();
        })

        $(function() {
            $('#tbl-jenis').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama_jenis = $(".jenis" + $(this).attr('data-id')).text()
                console.log(nama_jenis)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${nama_jenis} </b> akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })

            // update or input
            $('#modalFormJenis ').on('show.bs.modal', function(e) {
                console.log('cob')
                const btn = $(e.relatedTarget)
                const modal = $(this)
                const mode = $(btn).data('mode')
                const id = $(btn).data('id')
                const nama_jenis = $(btn).data('nama_jenis')
                console.log(nama_jenis)
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data')
                    modal.find('#nama_jenis').val(nama_jenis)
                    modal.find('#method').html('@method("PUT")')
                    modal.find('form').attr('action', `{{ url('jenis') }}/${id}`)
                } else {
                    modal.find('.modal-title').text('Form Jenis')
                    modal.find('#nama_jenis').val('')
                    modal.find('#method').html('')
                    modal.find('form').attr('action', `{{ url('jenis') }}/`)
                }
            })
        })
    </script>
    @endpush