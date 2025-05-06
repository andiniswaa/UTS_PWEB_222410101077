@extends('layouts.app')

@section('title', 'Pengelolaan Buku')

@section('content')
<div class="pengelolaan-buku">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold mb-0">
                    <i class="fas fa-book me-2"></i>Daftar Buku
                </h2>
                <button class="btn btn-toko btn-toko-primary" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                    <i class="fas fa-plus me-1"></i>Tambah Buku
                </button>
            </div>
        </div>
    </div>

    <div class="card card-buku">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari judul buku atau penulis...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-secondary active">Semua</button>
                        <button type="button" class="btn btn-outline-secondary">Tersedia</button>
                        <button type="button" class="btn btn-outline-secondary">Habis</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-buku table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span>{{ $item['judul'] }}</span>
                                </div>
                            </td>
                            <td>{{ $item['penulis'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $badgeClass = $item['stok'] > 10 ? 'badge-stok-tersedia' : 
                                                ($item['stok'] > 0 ? 'badge-stok-sedikit' : 'badge-stok-habis');
                                @endphp
                                <span class="badge badge-stok {{ $badgeClass }}">
                                    {{ $item['stok'] }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <p class="text-muted">Menampilkan 1 sampai 10 dari {{ count($buku) }} buku</p>
                </div>
                <div class="col-md-6">
                    <nav class="float-md-end">
                        <ul class="pagination pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Selanjutnya</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="judulBuku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judulBuku" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulisBuku" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulisBuku" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategoriBuku" class="form-label">Kategori</label>
                        <select class="form-select" id="kategoriBuku">
                            <option selected>Pilih kategori</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Non-Fiksi">Non-Fiksi</option>
                            <option value="Sains">Sains</option>
                            <option value="Sejarah">Sejarah</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hargaBuku" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" id="hargaBuku" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stokBuku" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stokBuku" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-toko-primary">Simpan Buku</button>
            </div>
        </div>
    </div>
</div>
@endsection