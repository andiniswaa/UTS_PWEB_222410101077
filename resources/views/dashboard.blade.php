@extends('layouts.app')

@section('title', 'Dashboard Toko Buku')

@section('content')
<div class="dashboard-toko">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold mb-0">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard Toko Buku
            </h2>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card card-toko h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Buku</h6>
                            <h3 class="mb-0">{{ number_format($stats['total_buku'], 0, ',', '.') }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-book text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card card-toko h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Kategori</h6>
                            <h3 class="mb-0">{{ $stats['total_kategori'] }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-tags text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card card-toko h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Penulis</h6>
                            <h3 class="mb-0">{{ $stats['total_penulis'] }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-user-edit text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card card-toko h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Penjualan Bulan Ini</h6>
                            <h3 class="mb-0">Rp {{ number_format($stats['pendapatan_bulan_ini'], 0, ',', '.') }}</h3>
                        </div>
                        <div class="bg-danger bg-opacity-10 p-3 rounded">
                            <i class="fas fa-chart-line text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">
                    <i class="fas fa-bookmark me-2"></i>Buku Terbaru
                </h4>
                <a href="{{ route('pengelolaan') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-5">
        @foreach($bukuTerbaru as $buku)
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <div class="card card-buku h-100">
                <div class="card-body">
                    <h6 class="card-title">{{ Str::limit($buku['judul'], 20) }}</h6>
                    <p class="card-text text-muted small">{{ $buku['penulis'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">Rp {{ number_format($buku['harga'], 0, ',', '.') }}</span>
                        <span class="badge bg-warning text-dark small">
                            <i class="fas fa-star"></i> {{ $buku['rating'] }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-toko h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-tags me-2"></i>Kategori Populer
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($kategoriPopuler as $kategori)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $kategori['nama'] }}
                            <span class="badge bg-primary rounded-pill">{{ $kategori['jumlah'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card card-toko h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2"></i>Statistik Penjualan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-4">
                        <p class="text-muted small mt-3">Grafik penjualan 30 hari terakhir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection