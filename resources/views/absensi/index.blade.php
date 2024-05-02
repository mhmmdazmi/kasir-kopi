@extends('layout.app')
@section('title', 'absensi')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Absensi Karyawan</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-mode="tambah" data-target="#modalFormAbsensi">
                Tambah
            </button>
        </div>
        @include('absensi.data')

    </div>

    @endsection
    @include('absensi.form')

    @push('scripts')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })
        $('#modalFormAbsensi').on('shown.bs.modal', function() {
            $('#nama_karyawan').delay(1000).focus().select();
        })

        $(function() {
            $('#tbl-absensi').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama_karyawan = $(".absensi" + $(this).attr('data-id')).text()
                console.log(nama_karyawan)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${nama_karyawan} </b> akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                }).then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })
        })

        // update or input
        $('#modalFormAbsensi ').on('show.bs.modal', function(e) {
            console.log('cob')
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = $(btn).data('mode')
            const id = $(btn).data('id')
            const nama_karyawan = $(btn).data('nama_karyawan')
            console.log(nama_karyawan)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data')
                modal.find('#nama_karyawan').val(nama_karyawan)
                modal.find('#method').html('@method("PUT")')
                modal.find('form').attr('action', `{{ url('absensi') }}/${id}`)
            } else {
                modal.find('.modal-title').text('Form Produk Titipan')
                modal.find('#nama_karyawan').val('')
                modal.find('#method').html('')
                modal.find('form').attr('action', `{{ url('absensi') }}/`)
            }
        })
        // Event listener untuk double klik pada status
        $(".status").dblclick(function() {
            var id = $(this).data("id");
            var oldValue = $(this).text();
            $(this).html('<input type="text" class="status-input" value="' + oldValue + '">');
            $(".status-input").focus();
        });
        // Event listener untuk menangkap keypress saat tombol Enter ditekan pada input field stok
        $(document).ready(function() {
            // Event listener untuk double klik pada stok
            // Edit Status
            $('.edit-status').change(function(e) {
                let id = $(this).attr('data-id');
                let status = $(this).val();
                // Menentukan waktu masuk dan waktu selesai berdasarkan status
                // Menentukan waktu masuk dan waktu selesai berdasarkan status
                let waktuMasuk = '00:00:00';
                let waktuSelesai = '00:00:00';

                if (status === 'Cuti', 'Sakit') {
                    waktuMasuk = '00:00:00';
                    waktuSelesai = '00:00:00';
                } else {
                    let now = new Date();
                    let hours = now.getHours().toString().padStart(2, '0');
                    let minutes = now.getMinutes().toString().padStart(2, '0');
                    let seconds = now.getSeconds().toString().padStart(2, '0');
                    waktuMasuk = `${hours}:${minutes}:${seconds}`;
                    waktuSelesai = `${hours}:${minutes}:${seconds}`;
                }

                $.ajax({
                    url: 'absensi/' + id,
                    type: 'PUT',
                    data: {
                        status: status,
                        waktu_masuk: waktuMasuk, // Mengirimkan waktu masuk sesuai dengan status
                        waktu_keluar: waktuSelesai, // Mengirimkan waktu selesai sesuai dengan status
                        // Menyertakan token CSRF dari meta tag
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        console.log(response.result.status);
                        // Reload halaman setelah permintaan AJAX berhasil
                        location.reload();
                        // console.log('berhasil');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Gagal memperbarui status.');
                    }
                })
            })
        });
    </script>
    @endpush