@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<style>
    .stats-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color-start), var(--card-color-end));
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .stats-card.primary {
        --card-color-start: #3b82f6;
        --card-color-end: #2563eb;
    }

    .stats-card.success {
        --card-color-start: #10b981;
        --card-color-end: #059669;
    }

    .stats-card.warning {
        --card-color-start: #f59e0b;
        --card-color-end: #d97706;
    }

    .stats-card .card-title {
        color: #94a3b8;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stats-card h2 {
        color: #f8fafc;
        font-weight: 700;
        font-size: 2.25rem;
        margin: 0;
    }

    .stats-card .icon-bg {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 4rem;
        opacity: 0.1;
    }

    .stats-card.primary .icon-bg {
        color: #3b82f6;
    }

    .stats-card.success .icon-bg {
        color: #10b981;
    }

    .stats-card.warning .icon-bg {
        color: #f59e0b;
    }

    .content-card {
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 16px;
        overflow: hidden;
    }

    .content-card .card-header {
        background: rgba(15, 23, 42, 0.5);
        border-bottom: 1px solid rgba(148, 163, 184, 0.1);
        padding: 1.25rem 1.5rem;
    }

    .content-card .card-header h5 {
        color: #f8fafc;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-card .card-body {
        padding: 1.5rem;
    }

    .table {
        color: #cbd5e1;
        margin: 0;
    }

    .table thead th {
        color: #64748b;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        padding: 1rem 0.75rem;
        background: transparent;
    }

    .table tbody td {
        color: #1e293b;
        padding: 1rem 0.75rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.15);
        vertical-align: middle;
        font-weight: 500;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background: rgba(59, 130, 246, 0.08);
    }

    .table tbody tr:hover td {
        color: #0f172a;
    }

    .table code {
        background: rgba(59, 130, 246, 0.15);
        color: #60a5fa;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .badge {
        padding: 0.4rem 0.75rem;
        font-weight: 500;
        font-size: 0.8rem;
        border-radius: 8px;
    }

    .badge.bg-info {
        background: rgba(59, 130, 246, 0.2) !important;
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .badge.bg-danger {
        background: rgba(239, 68, 68, 0.2) !important;
        color: #fca5a5;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .badge.bg-success {
        background: rgba(16, 185, 129, 0.2) !important;
        color: #6ee7b7;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .welcome-card {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 16px;
        padding: 2.5rem;
        text-align: center;
    }

    .welcome-card .icon-wrapper {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .welcome-card .icon-wrapper i {
        font-size: 2rem;
        color: #ffffff;
    }

    .welcome-card h5 {
        color: #f8fafc;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .welcome-card p {
        color: #94a3b8;
        margin: 0;
        font-size: 0.95rem;
    }

    .text-muted {
        color: #64748b !important;
    }

    @media (max-width: 768px) {
        .stats-card h2 {
            font-size: 1.75rem;
        }

        .stats-card .icon-bg {
            font-size: 3rem;
        }

        .welcome-card {
            padding: 2rem 1.5rem;
        }
    }
</style>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="stats-card primary">
            <h6 class="card-title">Total Barang</h6>
            <h2>{{ $totalBarang }}</h2>
            <i class="bi bi-box icon-bg"></i>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="stats-card success">
            <h6 class="card-title">Total Stok</h6>
            <h2>{{ $totalStok }}</h2>
            <i class="bi bi-stack icon-bg"></i>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="stats-card warning">
            <h6 class="card-title">Stok Menipis</h6>
            <h2>{{ $stokMenipis }}</h2>
            <i class="bi bi-exclamation-triangle icon-bg"></i>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="content-card">
            <div class="card-header">
                <h5><i class="bi bi-graph-up"></i> Barang Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
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
        <div class="welcome-card">
            <div class="icon-wrapper">
                <i class="bi bi-info-circle"></i>
            </div>
            <h5>Selamat Datang, {{ auth()->user()->name }}!</h5>
            <p>Kelola inventory Anda dengan mudah dan efisien</p>
        </div>
    </div>
</div>
@endsection