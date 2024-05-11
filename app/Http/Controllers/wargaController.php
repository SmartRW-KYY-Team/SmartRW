<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $warga = User::all();
        return $dataTable->render('warga.home', ['warga' => $warga]);
    }
}
