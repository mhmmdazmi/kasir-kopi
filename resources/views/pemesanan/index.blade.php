@extends('layout.app')
@section('content')
<section class="content">
    <main id="main" class="main">
        <div class="content">
            <div class="pagetitle">
                <h1>Pemesanan</h1>
            </div><!-- End Page Title -->

            <div class="container">
                <div class="menu-container-wrapper">
                    <div class="item">
                        <ul class="menu-container">
                        @foreach ($jenis as $jen)
                        <li>
                            <h3>{{ $jen->nama_jenis }}</h3>
                            <ul class="">
                            @foreach ($jen->menu as $menu)
                            <li>
                                <button class="menu-item" data-harga="{{ $menu->harga_menu }}" data-id="{{ $menu->id }}">
                                {{ $menu->nama_menu }}
                                </button>
                            </li>
            @endforeach
        </ul>
    </li>
@endforeach
                        </ul>
                    </div>
                </div>

                <div class="item content order-section">
                    <h3>Order</h3>
                    <ul class="ordered-list"></ul>
                    Total Bayar : <h2 id="total">0</h2>
                    <div>
                        <button id="btn-bayar">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
</section>
@endsection
<style>
    .menu-container {
        list-style-type: none;
    }

    .menu-container li {
        margin-bottom: 20px;
    }

    .menu-container li h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 18px;
        background-color: aliceblue;
        padding: 5px 15px;
    }

    .menu-item {
        list-style-type: none;
        display: flex;
        gap: 1em;
        margin: 10px 20px;
    }

    .menu-item li {
        background-color: beige;
        padding: 10px 20px;
    }

    .container {
        display: flex;
    }

    .menu-container-wrapper { 
        flex: 1; margin-right: 20px; /* Tambahkan ini */ 
    } 
    
    .item, .item.content { /* Buat kolom sama besar */ 
    padding: 0 20px; box-sizing: border-box; 
    } 
    
    .order-section { 
        flex: 1; 
    } 
</style>

@push('script')
<script>
    $(function(){
        let orderedList = []
        $(".menu-item").click(function(){
            const menu_clicked = $(this).text();
            const data = $(this)[0].dataset;
            const harga_menu = data.harga;
            const id = data.id;
            console.log("tes");

            if(orderedList.length !== 0 && orderedList.some(list => list.id === id)){
                let index = orderedList.findIndex(list => list.id === id)
                orderedList[index].qty += 1
            }
            else {
                let dataN = {'id' : id, 'menu': menu_clicked, 'harga': harga_menu, 'qty':1}
                orderedList.push(dataN);
            }
            $('.ordered-list li').remove()
            orderedList.forEach(function(data){
                $('.ordered-list').append('<li>'+data.menu+' Rp. '+data.harga_menu+'x '+data.qty+ ' ='+
            data.harga_menu * data.qty+'</li>')
            })
        });
    });
    $(function() {
        //inisialisasi
        const orderedList = []
        let total = 0

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga_menu * object.qty);
            }, 0)
        };

        const changeQty = (el, inc) => {
            // ubah di array
            const id = $(el).closest('li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.menu_id == id)
            function changeQty(index, inc) {
            if (orderedList && orderedList[index] && orderedList[index].harga_menu !== undefined) {
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;
                txt_subtotal.innerHTML = orderedList[index].harga_menu * orderedList[index].qty;
            } else {
                console.error('Error: Objek tidak terdefinisi atau properti harga_menu tidak valid.');
                // Lakukan penanganan kesalahan lainnya sesuai kebutuhan
            }
        }


            // ubah qty dam ubah subtotal
            const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
            const txt_qty = $(el).closest('li').find('.qty-item')[0]
            txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga_menu * orderedList[index].qty;

            // ubah jumlah total
            $('#total').html(sum())
        }
        $(".menu-item").click(function() {
            // mengambil data
    const menu_clicked = $(this).text();
    const harga_menu = parseFloat($(this).data('harga')); // Mengambil nilai harga_menu dari attribut data-harga
    const id = parseInt($(this).data('id'));
            
            if (orderedList.every(list => list.id !== id)) {
                let dataN = {
                    'id': id,
                    'menu': menu_clicked,
                    'harga': harga_menu,
                    'qty': 1
                }
                orderedList.push(dataN);
                let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`
                listOrder += 'Sub Total : Rp. '+harga_menu
                listOrder += `<button class='remove-item'>hapus</button>
                                    <button class="btn-dec"> - </button>`
                listOrder += `<input class="qty-item"
                                        type="number"
                                        value="1"
                                        style="width:30px"
                                        readonly 
                                        />
                                  <button class="btn-inc">+</button><h2>
                                  <span class="subtotal">${harga_menu * 1}</span>\
                                  </li>`
                $('.ordered-list').append(listOrder)
            }
            $('#total').html(sum())
        });
        // events
        $('.ordered-list').on('click', '.btn-dec', function() {
            changeQty(this, -1)
        })
        $('.ordered-list').on('click', '.btn-inc', function() {
            changeQty(this, 1)
        })
        $('.ordered-list').on('click', '.remove-item', function() {
            const item = $(this).closest('li')[0];
            let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))
            orderedList.splice(index, 1)
            $(item).remove();
            $('#total').html(sum())
        })

        $('#btn-bayar').on('click', function() {
            $.ajax({
                url: "{{ route('pemesanan.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}", // Perubahan di sini
                    orderedList: orderedList,
                    total: sum()
                },
                success: function(data) {
                    console.log(data)
                    swal.fire({
                        title: data.message,
                        html: `Transaksi Berhasil!`,
                        showDenyButton: true,
                        confirmButtonText: "Cetak Nota",
                        denyButtonText: `Ok`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open("{{ url('nota') }}/"+data.notrans)
                            location.reload()
                        } else if (result.isDenied){
                            location.reload()
                        }
                    });
                }, 
                error: function(request, status, error){
                    console.log(status, error)
                    swal.fire('Pemesanan Gagal!')
                }
            });
        })
        function kurangiStokMenu(id_menu, qty_pemesanan) {
            $.ajax({
                url: '/kurangi-qty-menu', // Ganti dengan URL endpoint yang sesuai di backend Anda
                method: 'POST', // Ubah metode sesuai dengan kebutuhan Anda
                data: {
                    id_menu: id_menu,
                    qty_pemesanan: qty_pemesanan
                },
                success: function(response) {
                    console.log(response); // Handle respons dari backend jika diperlukan
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Handle error jika terjadi
                }
            });
        }
        $('#btn-selesai').click(function() {
            // Misalnya, ambil data id_menu dan qty_pesanan dari elemen yang sesuai
            let id_menu = $('#id_menu').val(); // Ganti dengan cara yang sesuai dalam aplikasi Anda
            let qty_pemesanan = $('#qty_pemesanan').val(); // Ganti dengan cara yang sesuai dalam aplikasi Anda

            kurangiStokMenu(id_menu, qty_pemesanan);
        });
    });
</script>

@endpush