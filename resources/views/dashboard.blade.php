@extends('layout.app')

 @section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Transaksi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">100 Transaksi</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp7.8000.102</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Laba Rugi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.700.100</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <!-- Card Body -->
            <div class="card-body">
                            <div class="sparkline" sparktype="bar">
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Nasi Goreng Spesial</div>
                                    <div class="label" style="font-size: small;">50 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Vietnam Drip Coffee</div>
                                    <div class="label" style="font-size: small;">30 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Ayam Asam Manis</div>
                                    <div class="label" style="font-size: small;">28 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Roti Bakar Macok(Madu dan Coklat)</div>
                                    <div class="label" style="font-size: small;">28 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Tikentu (Spagheti Chicken Katsu)</div>
                                    <div class="label" style="font-size: small;">26 Terjual</div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

     <!-- Pie Chart -->
     <div class="col-md-6">
        <div class="card shadow mb-4">
                 <!-- Card Body -->
                 <div class="card-body">
                            <div class="sparkline" sparktype="bar">
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Nasi Goreng Spesial</div>
                                    <div class="label" style="font-size: small;">50 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Vietnam Drip Coffee</div>
                                    <div class="label" style="font-size: small;">30 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Ayam Asam Manis</div>
                                    <div class="label" style="font-size: small;">28 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Roti Bakar Macok(Madu dan Coklat)</div>
                                    <div class="label" style="font-size: small;">28 Terjual</div>
                                </div>
                                <hr>
                                <div class="bar">
                                    <div class="font-weight-bold text-gray-800">Tikentu (Spagheti Chicken Katsu)</div>
                                    <div class="label" style="font-size: small;">26 Terjual</div>
                                </div>
                            </div>
                        </div>
</div>
<div class="row">

     <!-- Pie Chart -->
     <div class="col-md-6">
        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <div class="bar">
                            <div class="font-weight-bold text-gray-800">Nasi Goreng Spesial</div>
                            <div class="text-right mt-2" style="font-weight: bold;">Rp25.000</div>
                            <div class="label" style="font-size: small;">1 Hari yang lalu</div>
                        </div>
                        <hr>
                        <div class="bar">
                            <div class="font-weight-bold text-gray-800">Roti Bakar Macok(Madu dan Coklat)</div>
                            <div class="text-right mt-2" style="font-weight: bold;">Rp15.000</div>
                            <div class="label" style="font-size: small;">1 Hari yang lalu</div>
                        </div>
                        <hr>
                        <div class="bar">
                            <div class="font-weight-bold text-gray-800">Vietnam Drip Coffee</div>
                            <div class="text-right mt-2" style="font-weight: bold;">Rp15.000</div>
                            <div class="label" style="font-size: small;">1 Hari yang lalu</div>
                        </div>
                    </ul>
                </div>
            </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
