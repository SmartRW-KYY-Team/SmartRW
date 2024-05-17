<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Agama;
use App\Models\Keluarga;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class wargaController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $warga = User::all();
        $agama = Agama::all();
<<<<<<< HEAD
        $keluarga = Keluarga::with('kepala_keluarga_relation')->get();
        return $dataTable->render('warga.home', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga,]);
=======
        $keluarga = Keluarga::with('kepala_keluarga')->get();
        return $dataTable->render('warga.home', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga]);
>>>>>>> da460800c150ea606700369447c2d7987ed61555
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:users,nik',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required|string|max:255',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
            'notelp' => 'required|string|max:20',
            'keluarga' => 'required',
        ]);

        // Buat pengguna baru berdasarkan data yang valid
        User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama_id' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'password' => Hash::make($request->password),
            'notelp' => $request->notelp,
            'keluarga_id' => $request->keluarga,
        ]);

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('warga.index');
    }
}
