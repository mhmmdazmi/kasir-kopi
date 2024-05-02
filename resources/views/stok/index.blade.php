@extends('layout.app')
@section('title', 'stok')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Stok</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-mode="tambah" data-target="#modalFormStok">
                Tambah
            </button>
        </div>
        @include('stok.data')

    </div>

    @endsection
    @include('stok.form')

    @push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })
        $('#modalFormStok').on('shown.bs.modal', function() {
            $('#menu_id').delay(1000).focus().select();
        })

        $(function() {
            $('#tbl-stok').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let menu_id = $(".stok" + $(this).attr('data-id')).text()
                console.log(menu_id)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${menu_id} </b> akan dihapus?`,
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
            $('#modalFormStok ').on('show.bs.modal', function(e) {
                console.log('cob')
                const btn = $(e.relatedTarget)
                const modal = $(this)
                const mode = $(btn).data('mode')
                const id = $(btn).data('id')
                const menu_id = $(btn).data('menu_id')
                const qty = $(btn).data('qty')
                console.log(menu_id)
                console.log(qty)
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data')
                    modal.find('#menu_id').val(menu_id)
                    modal.find('#qty').val(qty)
                    modal.find('#method').html('@method("PUT")')
                    modal.find('form').attr('action', `{{ url('stok') }}/${id}`)
                } else {
                    modal.find('.modal-title').text('Form Stok')
                    modal.find('#menu_id').val('')
                    modal.find('#qty').val('')
                    modal.find('#method').html('')
                    modal.find('form').attr('action', `{{ url('stok') }}/`)
                }
            })
        })
    </script>
    @endpush