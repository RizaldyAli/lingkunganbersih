<?php

namespace App\Http\Controllers\Laporan;

use App\DataTables\Laporan\LaporanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index($kategori)
    {
        $kategori = str_replace('-', '_', strtoupper($kategori));
        if (auth()->user()->can('admin-view')) {
            $dataTable = new LaporanDataTable($kategori);
            return $dataTable->render('pages.laporan.index');
        }
        if (auth()->user()->can('masyarakat-view')) {
            $datas = Laporan::where('user_id', auth()->id())->where('kategori', $kategori)->orderBy('created_at', 'desc')->get();
            return view('pages.laporan.index', compact('datas'));
        }
    }

    public function show($kategori, Laporan $laporan)
    {
        if (auth()->user()->can('admin-view')) {
            if ($laporan->is_read == '0') {
                $laporan->update(['is_read' => '1']);
            }
        }
        $laporan->load('user', 'lokasi');
        return view('pages.laporan.show', compact('laporan'));
    }

    public function create($kategori)
    {
        $datas = Laporan::where('user_id', auth()->id())->where('kategori', $kategori)->orderBy('created_at', 'desc')->get();
        return view('pages.laporan.create', compact('datas'));
    }

    public function store(Request $request, $kategori)
    {
        $request['kategori'] = strtoupper(str_replace('-', '_', $kategori));
        $request->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'required|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'required',
            'kategori' => 'required|in:SAMPAH,GOT_TERSUMBAT,JALAN_RUSAK',
        ]);

        $fotoPath = $request->file('foto')->store('laporan', 'public');

        $laporan = new Laporan();
        $laporan->judul = $request->judul;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->foto = $fotoPath;
        $laporan->user_id = auth()->id();
        $laporan->kategori = $request->kategori;
        $laporan->save();

        $lokasi = new Lokasi();
        $lokasi->laporan_id = $laporan->id;
        $lokasi->latitude = json_decode($request->lokasi)[0];
        $lokasi->longitude = json_decode($request->lokasi)[1];
        $lokasi->save();

        return redirect()->route('laporan.index', ['kategori' => $kategori])->with('status', 'Laporan berhasil dibuat');
    }

    public function update(Request $request, $kategori, Laporan $laporan)
    {
        $laporan->update($request->all());
        return redirect()->back()->with('status', 'Status berhasil diubah');
    }
}
