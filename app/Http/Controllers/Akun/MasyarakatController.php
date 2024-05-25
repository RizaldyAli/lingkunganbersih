<?php

namespace App\Http\Controllers\Akun;

use App\DataTables\Akun\MasyarakatDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(MasyarakatDataTable $dataTable)
    {
        return $dataTable->render('pages.akun.masyarakat.index');
    }
}
