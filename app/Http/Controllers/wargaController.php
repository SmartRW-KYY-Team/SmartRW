<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Agama;
use App\Models\Keluarga;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class wargaController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $pageTitle =  'Data Warga';
        $subPageTitle = 'Warga SmartRW';
        $activePosition = "home";
        $warga = User::all();
        $agama = Agama::all();
        $keluarga = Keluarga::with('kepala_keluarga')->get();
        return $dataTable->render('warga.home', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function create()
    {
        $pageTitle =  'Create Data Warga';
        $subPageTitle = 'Warga SmartRW';
        if (Auth::user()->role == 'rw') {
            # code...
            $warga = User::all();
            $keluarga = Keluarga::with('kepala_keluarga')->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 1) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 1)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $warga = User::whereIn('keluarga_id', $keluargaIds)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 2) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 2)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $warga = User::whereIn('keluarga_id', $keluargaIds)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 3) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 3)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $warga = User::whereIn('keluarga_id', $keluargaIds)->get();
        }
        $activePosition = "create";
        $agama = Agama::all();
        return view('warga.create', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
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
            'notelp' => $request->notelp,
            'keluarga_id' => $request->keluarga,
        ]);

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success', 'Success Add Data User');
        return redirect()->route('warga.index');
    }

    public function edit($id)
    {
        $pageTitle =  'Edit Data Warga';
        $subPageTitle = 'Warga SmartRW';
        $activePosition = "edit";
        $agama = Agama::all();
        if (Auth::user()->role == 'rw') {
            # code...
            $keluarga = Keluarga::with('kepala_keluarga')->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 1) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 1)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 2) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 2)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 3) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 3)->get();
        }
        $warga = User::findOrFail($id);
        return view('warga.edit', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga, 'id_warga' => $id, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function show($id)
    {
        $agama = Agama::all();
        $keluarga = Keluarga::all();
        $warga = User::with('agama', 'keluarga')->findOrFail($id);
        return response()->json($warga);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $find_kk = Keluarga::where('id_keluarga', $user->keluarga_id)->first();

        if ($find_kk->kepala_keluarga_id == $user->id_user) {
            Alert::error('error', 'Bahaya gess');
            return redirect()->route('warga.index');
        } else {
            $user->delete();
            Alert::success('Success', 'Success Delete Data User');
            return redirect()->route('warga.index');
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:users,nik,' . $id . ',id_user',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'keluarga' => 'required',
        ]);

        // Cari pengguna berdasarkan id dan perbarui data
        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama_id' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'notelp' => $request->notelp,
            'keluarga_id' => $request->keluarga,
        ]);

        Alert::success('Success', 'Data pengguna berhasil diperbarui');
        return redirect()->route('warga.index');
    }
}
