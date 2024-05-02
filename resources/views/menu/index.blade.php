@extends('layout.app')
@section('title', 'menu')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Menu</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-mode="tambah" data-target="#modalFormMenu">
                Tambah
            </button>
        </div>
        @include('menu.data')

    </div>

    @endsection
    @include('menu.form')

    @push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })
        $('#modalFormMenu').on('shown.bs.modal', function() {
            $('#nama_menu').delay(1000).focus().select();
        })

        $(function() {
            $('#tbl-menu').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama_menu = $(".menu" + $(this).attr('data-id')).text()
                console.log(nama_menu)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${nama_menu} </b> akan dihapus?`,
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
            $('#modalFormMenu ').on('show.bs.modal', function(e) {
                console.log('cob')
                const btn = $(e.relatedTarget)
                const modal = $(this)
                const mode = $(btn).data('mode')
                const id = $(btn).data('id')
                const nama_menu = $(btn).data('nama_menu')
                console.log(nama_menu)
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data')
                    modal.find('#nama_menu').val(nama_menu)
                    modal.find('#method').html('@method("PUT")')
                    modal.find('form').attr('action', `{{ url('menu') }}/${id}`)
                } else {
                    modal.find('.modal-title').text('Form Menu')
                    modal.find('#nama_menu').val('')
                    modal.find('#method').html('')
                    modal.find('form').attr('action', `{{ url('menu') }}/`)
                }
            })
        })
    </script>
    @endpush