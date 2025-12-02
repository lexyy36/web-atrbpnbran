@extends('layouts/app')
@section('content')

<?php
use App\Models\Pegawai;
use App\Models\Absensi;
use Carbon\Carbon;

$totalPegawai = Pegawai::count();
$today = Carbon::today();
$hariIni = Absensi::whereDate('tanggal', $today)->where('status', 'Hadir')->count();
$izin = Absensi::whereDate('tanggal', $today)->where('status', 'Izin')->count();
$cuti = Absensi::whereDate('tanggal', $today)->where('status', 'Cuti')->count();
?>

<style>
    .card-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px 10px 0 0;
    }
    .stat-card {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(102, 126, 234, 0.3);
    }
    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.8;
    }
</style>

<!-- Statistics Row -->
<div class="row mb-4">
    <!-- Total Pegawai Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-primary font-weight-bold text-uppercase mb-1">
                    <i class="fas fa-users stat-icon"></i> Total Pegawai
                </div>
                <div class="h3 mb-0 text-gray-800">{{ $totalPegawai }}</div>
            </div>
        </div>
    </div>

    <!-- Hadir Hari Ini Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-success font-weight-bold text-uppercase mb-1">
                    <i class="fas fa-check-circle stat-icon"></i> Hadir Hari Ini
                </div>
                <div class="h3 mb-0 text-gray-800">{{ $hariIni }}</div>
            </div>
        </div>
    </div>

    <!-- Izin Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-warning font-weight-bold text-uppercase mb-1">
                    <i class="fas fa-file-alt stat-icon"></i> Izin
                </div>
                <div class="h3 mb-0 text-gray-800">{{ $izin }}</div>
            </div>
        </div>
    </div>

    <!-- Cuti Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="text-danger font-weight-bold text-uppercase mb-1">
                    <i class="fas fa-calendar-alt stat-icon"></i> Cuti
                </div>
                <div class="h3 mb-0 text-gray-800">{{ $cuti }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="row">
    

    <!-- Quick Links Card -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header card-header-custom">
                <h6 class="m-0 font-weight-bold">Menu Cepat</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('jabatan.index') }}" class="btn btn-primary btn-sm btn-block mb-2">
                    <i class="fas fa-briefcase"></i> Kelola Jabatan
                </a>
                <a href="{{ route('pegawai.index') }}" class="btn btn-primary btn-sm btn-block mb-2">
                    <i class="fas fa-users"></i> Kelola Pegawai
                </a>
                <a href="{{ route('absensi.index') }}" class="btn btn-primary btn-sm btn-block">
                    <i class="fas fa-clipboard-check"></i> Kelola Absensi
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Activity Table Row -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header card-header-custom">
                <h6 class="m-0 font-weight-bold">Aktivitas Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $recentAbsensi = Absensi::with('pegawai')->orderBy('tanggal', 'desc')->limit(10)->get();
                            @endphp
                            @forelse($recentAbsensi as $absensi)
                                <tr>
                                    <td>{{ $absensi->pegawai->nama ?? '-' }}</td>
                                    <td>
                                        @if($absensi->status == 'Hadir')
                                            <span class="badge badge-success">{{ $absensi->status }}</span>
                                        @elseif($absensi->status == 'Izin')
                                            <span class="badge badge-warning">{{ $absensi->status }}</span>
                                        @elseif($absensi->status == 'Cuti')
                                            <span class="badge badge-danger">{{ $absensi->status }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $absensi->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Belum ada data absensi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Prepare data for chart
    @php
        $absensiPerTanggal = Absensi::selectRaw('tanggal, COUNT(*) as total')
            ->orderBy('tanggal', 'asc')
            ->groupBy('tanggal')
            ->get();
        
        $dates = [];
        $totals = [];
        
        foreach($absensiPerTanggal as $item) {
            $dates[] = \Carbon\Carbon::parse($item->tanggal)->format('d M Y');
            $totals[] = $item->total;
        }
    @endphp

    var ctx = document.getElementById("myAreaChart");
    var totalData = {!! json_encode($totals) !!};
    var maxValue = totalData.length > 0 ? Math.max(...totalData) : 10;
    
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: "Total Absensi",
                lineTension: 0.3,
                backgroundColor: "rgba(102, 126, 234, 0.05)",
                borderColor: "rgba(102, 126, 234, 1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(102, 126, 234, 1)",
                pointBorderColor: "rgba(255, 255, 255, 0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(102, 126, 234, 1)",
                pointHoverBorderColor: "rgba(255, 255, 255, 1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: totalData,
            }],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true,
                labels: {
                    fontColor: '#858796'
                }
            },
            title: {
                display: false,
                fontColor: '#858796'
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 15,
                        fontColor: '#858796'
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: maxValue + 2,
                        maxTicksLimit: 5,
                        padding: 10,
                        fontColor: '#858796',
                        beginAtZero: true,
                        stepSize: Math.ceil((maxValue + 2) / 5)
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                        display: true,
                        drawBorder: false,
                        zeroLineColor: "rgba(0, 0, 0, .125)"
                    }
                }],
            },
            plugins: {
                filler: {
                    propagate: false
                },
                defaults: {
                    globals: {
                        defaultFontFamily: "'Nunito', sans-serif",
                    }
                }
            }
        }
    });
</script>

@endsection