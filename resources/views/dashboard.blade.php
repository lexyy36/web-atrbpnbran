@extends('layouts/app')
@section('content')

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
                <div class="h3 mb-0 text-gray-800">120</div>
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
                <div class="h3 mb-0 text-gray-800">118</div>
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
                <div class="h3 mb-0 text-gray-800">2</div>
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
                <div class="h3 mb-0 text-gray-800">0</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="row">
    <!-- Chart Card -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header card-header-custom">
                <h6 class="m-0 font-weight-bold">Absensi Per Bulan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

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
                                <th>Jam Masuk</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td><span class="badge badge-success">Hadir</span></td>
                                <td>08:00</td>
                                <td>21 Nov 2025</td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td><span class="badge badge-success">Hadir</span></td>
                                <td>08:15</td>
                                <td>21 Nov 2025</td>
                            </tr>
                            <tr>
                                <td>Bob Johnson</td>
                                <td><span class="badge badge-warning">Izin</span></td>
                                <td>-</td>
                                <td>21 Nov 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection