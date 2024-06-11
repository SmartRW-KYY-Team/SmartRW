<?php

namespace App\Http\Controllers;

use App\DataTables\KeluargaDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Agama;
use App\Models\Keluarga;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KeluargaController extends Controller
{
    public function index(KeluargaDataTable $dataTable)
    {
        $pageTitle =  'Data Keluarga';
        $subPageTitle = 'Keluarga SmartRW';
        $activePosition = "home";
        $warga = User::all();
        $agama = Agama::all();
        $keluarga = Keluarga::with('kepala_keluarga')->get();
        return $dataTable->render('keluarga.home', ['warga' => $warga, 'agama' => $agama, 'keluarga' => $keluarga, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function create()
    {
        $pageTitle =  'Create Data Keluarga';
        $subPageTitle = 'Daftar Keluarga SmartRW';
        $activePosition = "create";
        if (Auth::user()->role == 'rw') {
            # code...
            $users = User::all();
            $keluarga = Keluarga::with('kepala_keluarga')->get();
            $rts = Rt::all();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 1) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 1)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 1)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 2) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 2)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 2)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 3) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 3)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 3)->get();
        }
        $rws = Rw::all();
        $existingKepalaKeluargas = Keluarga::pluck('kepala_keluarga_id')->toArray();
        $wargas = User::whereNotIn('id_user', $existingKepalaKeluargas)->get();

        return view('keluarga.create', compact('users', 'keluarga', 'rts', 'rws', 'wargas', 'pageTitle', 'subPageTitle', 'activePosition'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nokk' => 'required|unique:keluarga,nokk|numeric',
            'kepala_keluarga_id' => 'required|exists:users,id_user',
            'rt_id' => 'required|exists:rt,id_rt',
            'rw_id' => 'required|exists:rw,id_rw',
        ]);

        $keluarga =  Keluarga::create([
            'nokk' => $request->nokk,
            'kepala_keluarga_id' => $request->kepala_keluarga_id,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id
        ]);

        // Set keluarga_id untuk pengguna yang dipilih
        if ($request->has('user_id')) {
            $request->validate([
                'user_id' => 'required|exists:users,id_user', // validasi untuk user_id
            ]);
            User::whereIn('id_user', $request->user_id)->update(['keluarga_id' => $keluarga->id_keluarga]);
        }

        $user = User::findOrFail($request->kepala_keluarga_id);
        $user->update([
            'keluarga_id' => $keluarga->id_keluarga,
        ]);


        Alert::success('Success', 'Keluarga created successfully.');
        return redirect()->route('keluarga.index');
    }

    public function edit($id)
    {
        $pageTitle =  'Edit Data Keluarga';
        $subPageTitle = 'Daftar Keluarga SmartRW';
        $activePosition = "edit";
        if (Auth::user()->role == 'rw') {
            # code...
            $users = User::all();
            // $keluarga = Keluarga::with('kepala_keluarga')->get();
            $keluarga = Keluarga::with('members')->findOrFail($id);
            $rts = Rt::all();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 1) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 1)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 1)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 2) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 2)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 2)->get();
        } elseif (Auth::user()->role == 'rt' && Auth::user()->no_role == 3) {
            $keluarga = Keluarga::with('kepala_keluarga')->where('rt_id', 3)->get();
            $keluargaIds = $keluarga->pluck('id_keluarga');
            $users = User::whereIn('keluarga_id', $keluargaIds)->get();
            $rts = Rt::where('id_rt', 3)->get();
        }
        $keluarga = Keluarga::with('members')->findOrFail($id);
        // $users = User::all();
        // $rts = Rt::all();
        $rws = Rw::all();

        return view('keluarga.edit', compact('keluarga', 'users', 'rts', 'rws', 'pageTitle', 'subPageTitle', 'activePosition'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nokk' => 'required|string|max:255',
            'kepala_keluarga_id' => 'required|exists:users,id_user',
            'rt_id' => 'required|exists:rt,id_rt',
            'rw_id' => 'required|exists:rw,id_rw',
            'user_id.*' => 'required|exists:users,id_user',
        ]);

        // Temukan data keluarga berdasarkan ID
        $keluarga = Keluarga::findOrFail($id);
        $keluarga->nokk = $request->nokk;
        $keluarga->kepala_keluarga_id = $request->kepala_keluarga_id;
        $keluarga->rt_id = $request->rt_id;
        $keluarga->rw_id = $request->rw_id;
        $keluarga->save();

        // Reset keluarga_id untuk semua user yang saat ini termasuk dalam keluarga
        User::where('keluarga_id', $keluarga->id_keluarga)->update(['keluarga_id' => null]);


        $user = User::findOrFail($request->kepala_keluarga_id);
        $user->update([
            'keluarga_id' => $keluarga->id_keluarga,
        ]);

        // Set keluarga_id untuk pengguna yang dipilih
        if ($request->has('user_id')) {
            User::whereIn('id_user', $request->user_id)->update(['keluarga_id' => $keluarga->id_keluarga]);
        }

        Alert::success('success', 'Data Keluarga Berhasil Diperbarui');
        return redirect()->route('keluarga.index');
    }

    public function show($id)
    {
        $keluarga = Keluarga::with(['kepala_keluarga', 'rt', 'rw', 'members'])->findOrFail($id);

        return response()->json([
            'nokk' => $keluarga->nokk,
            'kepala_keluarga' => $keluarga->kepala_keluarga->nama,
            'rt' => $keluarga->rt->nama,
            'rw' => $keluarga->rw->nama,
            'anggota' => $keluarga->members->map(function ($member) {
                return [
                    'nama' => $member->nama,
                    'nik' => $member->nik
                ];
            })
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $find_kk = Keluarga::where('id_keluarga', $user->keluarga_id)->first();

        if ($find_kk->kepala_keluarga_id == $user->id_user) {
            Alert::error('error', 'Failed Delete Data User');
            return redirect()->route('warga.index');
        } else {
            $user->delete();
            Alert::success('Success', 'Success Delete Data User');
            return redirect()->route('warga.index');
        }
    }
}
