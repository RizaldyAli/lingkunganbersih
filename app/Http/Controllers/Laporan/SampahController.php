<?php

namespace App\Http\Controllers\Laporan;

use App\DataTables\Laporan\SampahDataTable;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index(Laporan $kategori)
    {
        if (auth()->user()->can('admin-view')) {
            $dataTable = new SampahDataTable();
            return $dataTable->render('pages.laporan.sampah.index');
        }
        if (auth()->user()->can('masyarakat-view')) {
            $datas = Laporan::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
            return view('pages.laporan.sampah.index', compact('datas'));
        }
    }

    public function create()
    {
        return view('pages.laporan.sampah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'required|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi' => 'required',
        ]);

        $fotoPath = $request->file('foto')->store('laporan', 'public');

        $laporan = new Laporan();
        $laporan->judul = $request->judul;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->foto = $fotoPath;
        $laporan->user_id = auth()->id();
        $laporan->save();

        $lokasi = new Lokasi();
        $lokasi->laporan_id = $laporan->id;
        $lokasi->latitude = json_decode($request->lokasi)[0];
        $lokasi->longitude = json_decode($request->lokasi)[1];
        $lokasi->save();

        return redirect()->route('sampah.index')->with('status', 'Laporan berhasil dibuat');
    }

    public function show(Laporan $laporan)
    {
        if (auth()->user()->can('admin-view')) {
            if ($laporan->is_read == '0') {
                $laporan->update(['is_read' => '1']);
            }
        }
        $laporan->load('user', 'lokasi');
        return view('pages.laporan.sampah.show', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $laporan->update($request->all());
        return redirect()->back()->with('status', 'Status berhasil diubah');
    }
}
