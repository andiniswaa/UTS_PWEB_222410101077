<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

 
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (empty($credentials['username']) || empty($credentials['password'])) {
            return back()->with('error', 'Username dan password harus diisi');
        }

        return redirect()->route('dashboard', ['username' => $credentials['username']]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        $stats = [
            'total_buku' => 1280,
            'total_kategori' => 24,
            'total_penulis' => 185,
            'total_penjualan' => 342,
            'pendapatan_bulan_ini' => 12500000
        ];

        $bukuTerbaru = [
            [
                'id' => 1,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'harga' => 75000,
                'rating' => 4.5
            ],
            [
                'id' => 2,
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'harga' => 85000,
                'rating' => 4.8
            ],
        ];

        $kategoriPopuler = [
            ['nama' => 'Fiksi', 'jumlah' => 320],
            ['nama' => 'Non-Fiksi', 'jumlah' => 280],
            ['nama' => 'Sains', 'jumlah' => 150],
        ];

        return view('dashboard', compact('stats', 'bukuTerbaru', 'kategoriPopuler', 'username'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return view('profile', ['username' => null]);
        }

        $user = [
            'nama' => $username,
            'email' => $username.'@example.com',
            'role' => 'Administrator',
            'bergabung_sejak' => '1 Januari 2022',
            'alamat' => 'Jl. Koptu Berlian No. 24, Sumbersari',
            'telepon' => '+62 838 4732 5224',
            'foto' => 'https://ui-avatars.com/api/?name='.urlencode($username).'&background=random'
        ];

        $aktivitasTerakhir = [
            [
                'waktu' => 'Hari ini, 10:30',
                'aktivitas' => 'Menambahkan buku baru',
                'ikon' => 'fas fa-book'
            ],
            [
                'waktu' => 'Kemarin, 14:45',
                'aktivitas' => 'Memperbarui stok buku',
                'ikon' => 'fas fa-edit'
            ],
        ];

        return view('profile', compact('user', 'aktivitasTerakhir', 'username'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        
        $buku = [
            [
                'id' => 1,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'kategori' => 'Fiksi',
                'harga' => 75000,
                'stok' => 15
            ],
            [
                'id' => 2,
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'kategori' => 'Sastra',
                'harga' => 85000,
                'stok' => 8
            ],
            [
                'id' => 3,
                'judul' => 'Harry Potter',
                'penulis' => 'J.K. Rowling',
                'kategori' => 'Fantasi',
                'harga' => 95000,
                'stok' => 0
            ],
        ];

        return view('pengelolaan', ['buku' => $buku, 'username' => $username]);
    }
}