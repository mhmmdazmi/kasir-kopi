<body>
    <h2>Cafe CilazMart</h2>
    <h5>Jl. Limbangansari</h5>
    <hr>
    <!-- @if($transaksi)
    <h5>No. Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5>
    <table border="0">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailtransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga_menu,0,",",".") }}</td>
                <td>{{ number_format($item->subtotal,0,",",".") }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Totak</td>
                <td>{{ number_format($item->total_harga,0,",",".") }}</td>
            </tr>
        </tfoot>
    </table>
    @else -->
    <p>Transaksi tidak ditemukan.</p>
    @endif
</body>