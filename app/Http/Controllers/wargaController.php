<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Agama;
use App\Models\Keluarga;
use App\Models\User;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $warga = User::all();
        $agama = Agama::all();
        $keluarga = Keluarga::with('kepalaKeluarga')->get();
        return $dataTable->render('warga.home', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga]);
    }
}
