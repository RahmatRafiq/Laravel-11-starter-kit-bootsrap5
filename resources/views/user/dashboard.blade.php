@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Ini Halaman Dashboard Untuk User</h1>
<div class="row gx-3">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card mb-3 card-custom background-gradient-1">
            <div class="card-body">
                <div class="circle-shape shape-1"></div>
                <div class="circle-shape shape-2"></div>
                <div class="circle-shape shape-3"></div>
                <div class="mb-2">
                    <i class="bi bi-list-check fs-1 text-white lh-1"></i>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0 text-white fw-normal">Tugas Selesai</h5>
                    <h3 class="m-0 text-white">100</h3> <!-- Data dummy -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card mb-3 card-custom background-gradient-2">
            <div class="card-body">
                <div class="circle-shape shape-1"></div>
                <div class="circle-shape shape-2"></div>
                <div class="circle-shape shape-3"></div>
                <div class="mb-2">
                    <i class="bi bi-clock-history fs-1 text-white lh-1"></i>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0 text-white fw-normal">Tugas Pending</h5>
                    <h3 class="m-0 text-white">50</h3> <!-- Data dummy -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card mb-3 card-custom background-gradient-3">
            <div class="card-body">
                <div class="circle-shape shape-1"></div>
                <div class="circle-shape shape-2"></div>
                <div class="circle-shape shape-3"></div>
                <div class="mb-2">
                    <i class="bi bi-file-earmark-bar-graph fs-1 text-white lh-1"></i>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0 text-white fw-normal">Proyek Selesai</h5>
                    <h3 class="m-0 text-white">150</h3> <!-- Data dummy -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card mb-3 card-custom background-gradient-4">
            <div class="card-body">
                <div class="circle-shape shape-1"></div>
                <div class="circle-shape shape-2"></div>
                <div class="circle-shape shape-3"></div>
                <div class="mb-2">
                    <i class="bi bi-file-earmark-play fs-1 text-white lh-1"></i>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0 text-white fw-normal">Proyek Berjalan</h5>
                    <h3 class="m-0 text-white">80</h3> <!-- Data dummy -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gx-3">
    <div class="col-xl-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Monitoring Progres Harian</h5>
            </div>
            <div class="card-body">
                <div id="donutChartHarian"></div>
            </div>
            <div class="grid text-center">
                <div class="g-col-4">
                    <i class="bi bi-check-circle-fill text-success"></i>
                    <h3 class="m-0 mt-1">80</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Tervalidasi</p>
                </div>
                <div class="g-col-4">
                    <i class="bi bi-clock-fill text-primary"></i>
                    <h3 class="m-0 mt-1 fw-bolder">20</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Pending</p>
                </div>
                <div class="g-col-4">
                    <i class="bi bi-arrow-repeat text-danger"></i>
                    <h3 class="m-0 mt-1">10</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Laporan Terevisi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Monitoring Progres Mingguan</h5>
            </div>
            <div class="card-body">
                <div id="donutChartMingguan"></div>
            </div>
            <div class="grid text-center">
                <div class="g-col-4">
                    <i class="bi bi-check-circle-fill text-success"></i>
                    <h3 class="m-0 mt-1">70</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Laporan Tervalidasi</p>
                </div>
                <div class="g-col-4">
                    <i class="bi bi-clock-fill text-primary"></i>
                    <h3 class="m-0 mt-1 fw-bolder">30</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Laporan Pending</p>
                </div>
                <div class="g-col-4">
                    <i class="bi bi-arrow-repeat text-danger"></i>
                    <h3 class="m-0 mt-1">15</h3> <!-- Data dummy -->
                    <p class="text-secondary m-0">Laporan Terevisi</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/customcard.css') }}">
@endpush

@push('javascript')
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data dummy untuk grafik donat
        var optionsHarian = {
            series: [80, 20, 10], // Data dummy
            labels: ['Validasi', 'Pending', 'Revisi'],
            colors: ['#96e6a1', '#ffd200', '#FF5E62'],
            chart: {
                type: 'donut',
                height: 350,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%'
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'vertical',
                    gradientToColors: ['#96e6a1', '#ffd200', '#FF5E62'],
                    stops: [0, 100]
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var donutChartHarian = new ApexCharts(document.querySelector("#donutChartHarian"), optionsHarian);
        donutChartHarian.render();

        var optionsMingguan = {
            series: [70, 30, 15], // Data dummy
            labels: ['Validasi', 'Pending', 'Revisi'],
            colors: ['#96e6a1', '#ffd200', '#FF5E62'],
            chart: {
                type: 'donut',
                height: 350,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%'
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'vertical',
                    gradientToColors: ['#96e6a1', '#ffd200', '#FF5E62'],
                    stops: [0, 100]
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var donutChartMingguan = new ApexCharts(document.querySelector("#donutChartMingguan"), optionsMingguan);
        donutChartMingguan.render();
    });
</script>
@endpush
