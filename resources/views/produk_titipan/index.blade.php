@extends('layout.app')
@section('title', 'produk_titipan')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Produk Titipan</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-mode="tambah" data-target="#modalFormProduk">
                Tambah
            </button>
        </div>
        @include('produk_titipan.data')

    </div>

    @endsection
    @include('produk_titipan.form')

    @push('scripts')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })
        $('#modalFormProduk').on('shown.bs.modal', function() {
            $('#nama_produk').delay(1000).focus().select();
        })

        $(function() {
            $('#tbl-produk_titipan').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e) {
                let nama_produk = $(".produk_titipan" + $(this).attr('data-id')).text()
                console.log(nama_produk)
                Swal.fire({
                    icon: 'error',
                    title: 'Hapus Data',
                    html: `Apakah data <b> ${nama_produk} </b> akan dihapus?`,
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
        $('#modalFormProduk ').on('show.bs.modal', function(e) {
            console.log('cob')
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = $(btn).data('mode')
            const id = $(btn).data('id')
            const nama_produk = $(btn).data('nama_produk')
            console.log(nama_produk)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#method').html('@method("PUT")')
                modal.find('form').attr('action', `{{ url('produk_titipan') }}/${id}`)
            } else {
                modal.find('.modal-title').text('Form Produk Titipan')
                modal.find('#nama_produk').val('')
                modal.find('#method').html('')
                modal.find('form').attr('action', `{{ url('produk_titipan') }}/`)
            }
        })
        // Harga jual otomatis
        $(document).ready(function() {
            $('#harga_beli').on('input', function() {
                $.ajax({
                    url: '/hitung-harga-jual',
                    type: 'POST',
                    data: $('#form-harga').serialize(),
                    success: function(response) {
                        $('#harga_jual').val(response.harga_jual);
                    }
                });
            });
        });

        function hitungHargaJual() {
            const hargaBeli = parseFloat(document.getElementById("harga_beli").value);
            const keuntungan = hargaBeli * 0.7;
            const hargaJual = Math.round((hargaBeli + keuntungan) / 500) * 500;
            document.getElementById("harga_jual").value = hargaJual;
        }
        $(document).ready(function() {
            // Event listener untuk double klik pada stok
            $(".stock").dblclick(function() {
                var id = $(this).data("id");
                var oldValue = $(this).text();
                $(this).html('<input type="number" class="stock-input" value="' + oldValue + '">');
                $(".stock-input").focus();
            });
        })
        // Event listener untuk menangkap keypress saat tombol Enter ditekan pada input field stok
        $(document).ready(function() {
            // Event listener untuk double klik pada stok
            $(".stok-edit").dblclick(function() {
                var stokCell = $(this);
                var stokValue = stokCell.text().trim();
                stokCell.empty();
                $('<input type="number" class="form-control" value="' + stokValue + '">')
                    .appendTo(stokCell)
                    .focus()
                    .keypress(function(event) {
                        // Ketika pengguna menekan tombol "Enter"
                        if (event.which === 13) {
                            var newStok = $(this).val();
                            var productId = stokCell.closest('tr').find('.product-id').text();

                            // Validasi input
                            if (isNaN(newStok) || newStok < 0) {
                                alert('Stok harus berupa angka positif.');
                                return;
                            }

                            $.ajax({
                                url: '/produk_titipan/',
                                type: 'POST', // Ubah menjadi POST jika Anda mengalami kesalahan 419 Unknown Status
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    stok: newStok
                                },
                                success: function(response) {
                                    // Handle success
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                }
                            });
                        }
                    });
            });
        });
    </script>
    @endpush