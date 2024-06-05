<?php

namespace App\Http\Controllers;

use App\DataTables\PengaduanDataTable;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Rt;
use App\Models\Rw;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaduanController extends Controller
{
    public function index(PengaduanDataTable $dataTable)
    {
        $pageTitle =  'Pengaduan Masalah';
        $subPageTitle = 'Kegiatan SmartRW';
        $activePosition = "home";
        $pengaduan = Pengaduan::all();
        $user = User::with('pengaduan')->get();
        $rt = Rt::with('pengaduan')->get();
        $rw = Rw::with('pengaduan')->get();
        return $dataTable->render('pengaduan.index', ['pengaduan' => $pengaduan, 'users' => $user, 'rts' => $rt, 'rws' => $rw, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function create()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $user = User::all();
        return view('pengaduan.create', ['rt' => $rt, 'rw' => $rw, 'user' => $user]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'pengadu_id' => 'required|integer|exists:users,id_user',
            'deskripsi' => 'required|string|max:255',
            'rt_id' => 'required|integer|exists:rt,id_rt',
            'rw_id' => 'required|integer|exists:rw,id_rw',
            'tanggal_kejadian' => 'required|date',
            'lampiran' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $image = $request->file('lampiran');
        $hashedName = $image->hashName();
        $image->storeAs('public/lampiran', $hashedName);

        // Buat pengguna baru berdasarkan data yang valid
        Pengaduan::create([
            'pengadu_id' => $request->pengadu_id,
            'deskripsi' => $request->deskripsi,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lampiran' => $hashedName,
        ]);

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success', 'Success Add Data Pengaduan');
        return redirect()->route('pengaduan.index');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return response()->json($pengaduan);
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        Alert::success('Success', 'Success Delete Data Pengaduan');
        return redirect()->route('pengaduan.index');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'pengadu_id' => 'required|integer|exists:users,id_user',
            'deskripsi' => 'required|string|max:255',
            'rt' => 'required|integer|exists:rt,id_rt',
            'rw' => 'required|integer|exists:rw,id_rw',
            'tanggal_kejadian' => 'required|date',
            'lampiran' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        // Cari pengguna berdasarkan id dan perbarui data
        $pengaduan = Pengaduan::findOrFail($id);

        // $file = $request->file('lampiran');
        // $filePath = $file->store('lampiran', 'public');

        if ($request->hasFile('lampiran')) {
            $filePath = $request->file('lampiran')->store('lampiran', 'public');
        } else {
            $filePath = $pengaduan->lampiran;
        }

        $pengaduan->update([
            'pengadu_id' => $request->pengadu_id,
            'deskripsi' => $request->deskripsi,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'lampiran' => $filePath,
        ]);

        Alert::success('Success', 'Data pengaduan berhasil diperbarui');
        return redirect()->route('pengaduan.index');
    }
}
