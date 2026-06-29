@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row g-4 mb-4">

    {{-- Total Data --}}
    <div class="col-xl-3 col-md-6">

        <div class="stats-card">

            <div>

                <p class="stats-title">
                    Total Data
                </p>

                <h2 class="stats-number">

                    {{ number_format($total) }}

                </h2>

                <small class="stats-subtitle">

                    Semua Data ID Card

                </small>

            </div>

            <div class="stats-icon bg-primary-soft">

                <i class="bi bi-people-fill"></i>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="stats-card">

            <div>

                <p class="stats-title">

                    Hari Ini

                </p>

                <h2 class="stats-number">

                    {{ number_format($hariIni) }}

                </h2>

                <small class="stats-subtitle">

                    Cetak Hari Ini

                </small>

            </div>

            <div class="stats-icon bg-success-soft">

                <i class="bi bi-calendar-check-fill"></i>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="stats-card">

            <div>

                <p class="stats-title">

                    Bulan Ini

                </p>

                <h2 class="stats-number">

                    {{ number_format($bulanIni) }}

                </h2>

                <small class="stats-subtitle">

                    Total Bulan Ini

                </small>

            </div>

            <div class="stats-icon bg-warning-soft">

                <i class="bi bi-bar-chart-fill"></i>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6">

        <div class="stats-card">

            <div>

                <p class="stats-title">

                    Tahun Ini

                </p>

                <h2 class="stats-number">

                    {{ number_format($tahunIni) }}

                </h2>

                <small class="stats-subtitle">

                    Total Tahun Ini

                </small>

            </div>

            <div class="stats-icon bg-danger-soft">

                <i class="bi bi-graph-up-arrow"></i>

            </div>

        </div>

    </div>

</div>
</div>

    <div class="row mt-4">

    <div class="col-12">

        <div class="card card-custom">

            <div class="card-header d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-bar-chart-line-fill text-primary me-2"></i>
                        Grafik Cetak ID Card
                    </h5>

                    <small class="text-muted">
                        Statistik Pencetakan ID Card
                    </small>

                </div>

                <div class="d-flex gap-2">

                    {{-- Filter Status --}}
                    <select
                        id="filterStatus"
                        class="form-select"
                        style="width:180px">

                        <option value="semua">
                            Semua Status
                        </option>

                        @foreach($statusLabel as $item)

                            <option value="{{ $item }}">
                                {{ $item }}
                            </option>

                        @endforeach

                    </select>

                    {{-- Filter Periode --}}
                    <select
                        id="filterPeriode"
                        class="form-select"
                        style="width:160px">

                        <option value="tahun" selected>
                            Tahunan
                        </option>

                        <option value="bulan">
                            Bulanan
                        </option>

                        <option value="hari">
                            Harian
                        </option>

                    </select>

                </div>

            </div>

            <div class="card-body">

                <div style="height:480px">

                  <canvas id="grafikCetak"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('grafikCetak');

    if (!ctx) return;

    const filterStatus = document.getElementById('filterStatus');
    const filterPeriode = document.getElementById('filterPeriode');

    let chart = new Chart(ctx, {

        type: 'bar',

        data: {

            labels: @json($labelBulan),

            datasets: [

                {
                    label: 'Alih Daya',
                    data: @json($statusDataset[0]['data']),
                    backgroundColor: '#2563EB'
                },

                {
                    label: 'Dewas',
                    data: @json($statusDataset[1]['data']),
                    backgroundColor: '#22C55E'
                },

                {
                    label: 'Honorer / TPBW',
                    data: @json($statusDataset[2]['data']),
                    backgroundColor: '#F59E0B'
                },

                {
                    label: 'KCA',
                    data: @json($statusDataset[3]['data']),
                    backgroundColor: '#EF4444'
                },

                {
                    label: 'Magang',
                    data: @json($statusDataset[4]['data']),
                    backgroundColor: '#8B5CF6'
                },

                {
                    label: 'PKWT',
                    data: @json($statusDataset[5]['data']),
                    backgroundColor: '#06B6D4'
                },

                {
                    label: 'Petugas Luar',
                    data: @json($statusDataset[6]['data']),
                    backgroundColor: '#EC4899'
                },

                {
                    label: 'Organik',
                    data: @json($statusDataset[7]['data']),
                    backgroundColor: '#84CC16'
                },

                {
                    label: 'Visitor / VIP',
                    data: @json($statusDataset[8]['data']),
                    backgroundColor: '#F97316'
                },

                {
                    label: 'Project IOT',
                    data: @json($statusDataset[9]['data']),
                    backgroundColor: '#64748B'
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {
                mode: 'index',
                intersect: false
            },

            plugins: {

                legend: {

                    display: true,

                    position: 'right',

                    labels: {
                        boxWidth: 12,
                        boxHeight: 12,
                        font: {
                            size: 11
                        }
                    }

                }

            },

            scales: {

                x: {
                    stacked: false,
                    grid: {
                        display: false
                    }
                },

                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }

            }

        }

    });

    function loadGrafik() {

        fetch(`/dashboard/filter?status=${filterStatus.value}&periode=${filterPeriode.value}`)

            .then(response => response.json())

            .then(res => {

                chart.data.labels = res.labels;
                chart.data.datasets = res.datasets;

                chart.update();

            })

            .catch(error => console.log(error));

    }

    filterStatus.addEventListener('change', loadGrafik);
    filterPeriode.addEventListener('change', loadGrafik);

});

</script>

@endpush