<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = Laporan::orderBy('created_at', 'asc')
            ->where('status', 'DISETUJUI')
            ->take(5)
            ->get();

        // dd($data);
        return view('pages.landing.index', ['data' => $data]);
    }
}
