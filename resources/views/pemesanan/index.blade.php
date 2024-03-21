@extends('layout.app')

@push('style')

@endpush

@section('content')
<section class="content">
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">transaksi</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        Transaksi
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
@endsection

@push('script')
    <script>
        $(function(){
            //inisialisasi
            const orderedList = []
            let total = 0

            const sum = () => {
            return orderedList.reduce((accumulator, object) => {
            return accumulator + (object.harga * object.qty);
            }, 0)
            };

            const changeQty = (el,inc) => {
            // ubah di array
            const id = $(el).closest('li')[0].dataset.idn      
            }
            })
    </script>
@endpush