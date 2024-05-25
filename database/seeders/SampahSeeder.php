<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laporans = [
            [
                'judul' => 'Laporan 1',
                'deskripsi' => 'Deskripsi laporan 1',
                'foto' => 'foto1.jpg',
                'status' => 'DIKIRIM',
                'keterangan' => '',
                'is_read' => '0',
                'user_id' => 1
            ],
            [
                'judul' => 'Laporan 2',
                'deskripsi' => 'Deskripsi laporan 2',
                'foto' => 'foto2.jpg',
                'status' => 'DISETUJUI',
                'keterangan' => 'Keterangan laporan 2',
                'is_read' => '1',
                'user_id' => 1
            ],
            [
                'judul' => 'Laporan 3',
                'deskripsi' => 'Deskripsi laporan 3',
                'foto' => 'foto3.jpg',
                'status' => 'DITOLAK',
                'keterangan' => 'Keterangan laporan 3',
                'is_read' => '1',
                'user_id' => 1
            ]
        ];

        foreach ($laporans as $laporanData) {
            $judul = $laporanData['judul'];
            $user_id = $laporanData['user_id'];

            $criteria = [
                'judul' => $judul,
                'user_id' => $user_id,
            ];

            $dataToUpdateOrCreate = [
                'deskripsi' => $laporanData['deskripsi'],
                'foto' => $laporanData['foto'],
                'status' => $laporanData['status'],
                'keterangan' => $laporanData['keterangan'],
                'is_read' => $laporanData['is_read'],
            ];

            Laporan::updateOrCreate($criteria, $dataToUpdateOrCreate);
        }

        $laporan_ids = Laporan::pluck('id');

        foreach ($laporan_ids as $id) {
            $criteria = [
                'laporan_id' => $id,
            ];

            $dataToUpdateOrCreate = [
                'latitude' => '3.4567',
                'longitude' => '7.8912',
            ];

            Lokasi::updateOrCreate($criteria, $dataToUpdateOrCreate);
        }
    }
}
