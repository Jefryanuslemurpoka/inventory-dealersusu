<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard
     */
    public function index()
    {
        // Hitung statistik
        $totalBarang = Barang::count();
        $totalStok = Barang::sum('stok');
        $stokMenipis = Barang::where('stok', '<', 10)->count();
        $totalNilaiInventory = Barang::selectRaw('SUM(stok * harga) as total')->value('total');
        
        // Barang terbaru
        $barangTerbaru = Barang::latest()->take(5)->get();
        
        return view('dashboard', compact(
            'totalBarang',
            'totalStok',
            'stokMenipis',
            'totalNilaiInventory',
            'barangTerbaru'
        ));
    }
}