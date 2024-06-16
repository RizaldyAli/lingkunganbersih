<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $data = (object) [
                'total_user' => number_format(User::where('email_verified_at', '!=', null)->count(), 0, ',', '.'),
                'total_admin' => number_format(User::where('email_verified_at', '!=', null)->role('admin')->count(), 0, ',', '.'),
                'total_masyarakat' => number_format(User::where('email_verified_at', '!=', null)->role('masyarakat')->count(), 0, ',', '.'),
                'total_laporan' => number_format(Laporan::count(), 0, ',', '.'),
                'total_dikirim' => number_format(Laporan::where('status', 'DIKIRIM')->count(), 0, ',', '.'),
                'total_disetujui' => number_format(Laporan::where('status', 'DISETUJUI')->count(), 0, ',', '.'),
                'total_ditolak' => number_format(Laporan::where('status', 'DITOLAK')->count(), 0, ',', '.'),
            ];
            return view('pages.dashboard.index', compact('data'));
        }
        if (auth()->user()->hasRole('masyarakat')) {
            return view('pages.dashboard.index');
        }
    }

    public function laporan($kategori)
    {
        if (auth()->user()->hasRole('admin')) {
            $data = (object) [
                'total_laporan' => number_format(Laporan::where('kategori', $kategori)->count(), 0, ',', '.'),
                'total_dikirim' => number_format(Laporan::where('kategori', $kategori)->where('status', 'DIKIRIM')->count(), 0, ',', '.'),
                'total_disetujui' => number_format(Laporan::where('kategori', $kategori)->where('status', 'DISETUJUI')->count(), 0, ',', '.'),
                'total_ditolak' => number_format(Laporan::where('kategori', $kategori)->where('status', 'DITOLAK')->count(), 0, ',', '.'),
            ];
        }
        if (auth()->user()->hasRole('masyarakat')) {
            $data = (object) [
                'total_laporan' => number_format(Laporan::where('kategori', $kategori)->where('user_id', auth()->id())->count(), 0, ',', '.'),
                'total_dikirim' => number_format(Laporan::where('kategori', $kategori)->where('user_id', auth()->id())->where('status', 'DIKIRIM')->count(), 0, ',', '.'),
                'total_disetujui' => number_format(Laporan::where('kategori', $kategori)->where('user_id', auth()->id())->where('status', 'DISETUJUI')->count(), 0, ',', '.'),
                'total_ditolak' => number_format(Laporan::where('kategori', $kategori)->where('user_id', auth()->id())->where('status', 'DITOLAK')->count(), 0, ',', '.'),
            ];
        }
        return response()->json($data);
    }
}
