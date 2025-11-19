@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Barang</h6>
                        <h2 class="mb-0">{{ $totalBarang }}</h2>
                    </div>
                    <i class="bi bi-box" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Stok</h6>
                        <h2 class="mb-0">{{ $totalStok }}</h2>
                    </div>
                    <i class="bi bi-stack" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Stok Menipis</h6>
                        <h2 class="mb-0">{{ $stokMenipis }}</h2>
                    </div>
                    <i class="bi bi-exclamation-triangle" style="font-size: 3rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="bi bi-graph-up"></i> Barang Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barangTerbaru as $item)
                                <tr>
                                    <td><code>{{ $item->kode_barang }}</code></td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                                    <td>{{ $item->stok }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if($item->stok < 10)
                                            <span class="badge bg-danger">Stok Rendah</span>
                                        @else
                                            <span class="badge bg-success">Tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data barang</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card bg-light border-0">
            <div class="card-body text-center">
                <i class="bi bi-info-circle text-primary" style="font-size: 2rem;"></i>
                <h5 class="mt-3">Selamat Datang, {{ auth()->user()->name }}!</h5>
                <p class="text-muted">Kelola inventory Anda dengan mudah dan efisien</p>
            </div>
        </div>
    </div>
</div>
@endsection