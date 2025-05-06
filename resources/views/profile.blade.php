@extends('layouts.app')

@section('title', 'Profile Pengguna')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="mb-0">Profile Pengguna</h2>
    </div>
</div>

@if(isset($username))
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($username) }}&background=random&size=150" 
                     alt="Profile" class="rounded-circle mb-3" width="120">
                <h4>{{ $username }}</h4>
                <p class="text-muted">Administrator</p>
                
                <hr>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-key me-2"></i> Ubah Password
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <i class="fas fa-info-circle me-2"></i> Informasi Akun
                </h5>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Username</div>
                    <div class="col-md-8">{{ $username }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Email</div>
                    <div class="col-md-8">{{ $username }}@example.com</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Bergabung Pada</div>
                    <div class="col-md-8">1 Januari 2023</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Status</div>
                    <div class="col-md-8">
                        <span class="badge bg-success">
                            <i class="fas fa-check-circle me-1"></i> Aktif
                        </span>
                    </div>
                </div>
                
                <hr>
                
                <h5 class="card-title mb-4">
                    <i class="fas fa-history me-2"></i> Aktivitas Terakhir
                </h5>
                
                <div class="list-group">
                    <div class="list-group-item border-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-1">Login ke sistem</h6>
                                <small class="text-muted">Hari ini, 10:30</small>
                            </div>
                            <span class="text-muted">Dashboard</span>
                        </div>
                    </div>
                    <div class="list-group-item border-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-1">Update data produk</h6>
                                <small class="text-muted">Kemarin, 14:45</small>
                            </div>
                            <span class="text-muted">Pengelolaan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="card shadow-sm">
    <div class="card-body text-center py-5">
        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
        <h3>Anda Belum Login</h3>
        <p class="text-muted mb-4">Silakan login terlebih dahulu untuk melihat halaman profile</p>
        <a href="{{ route('login') }}" class="btn btn-primary">
            <i class="fas fa-sign-in-alt me-2"></i> Login Sekarang
        </a>
    </div>
</div>
@endif
@endsection