<?php

namespace App\Http\Controllers\Akun;

use App\DataTables\Akun\AdminDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('pages.akun.admin.index');
    }
}
