<?php

namespace App\Http\Controllers;

use App\DataTables\DomisiliDatatable;
use App\DataTables\PengaduanDataTable;
use App\DataTables\SKTMDataTable;
use App\Models\SuratSKTM;
use App\Models\Pengaduan;
use App\Models\SuratDomisili;
use App\Models\User;
use App\Models\Rt;
use App\Models\Rw;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function viewPengaduanWarga()
    {
        $rt = Rt::all();
        $rw = Rw::all();

        return view('pengaduan_page', compact('rt', 'rw'));
    }

    public function createPengaduanWarga(Request $request)
    {
        $request->validate([
            'keluhan' => 'required',
            'tanggal_kejadian' => 'required|date',
            'rt' => 'required',
            'rw' => 'required',
            'lampiran' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $image = $request->file('lampiran');
        $hashedName = $image->hashName();
        $image->storeAs('public/lampiran', $hashedName);

        // Buat pengguna baru berdasarkan data yang valid
        Pengaduan::create([
            'pengadu_id' => 'Anonymous',
            'deskripsi' => $request->keluhan,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'rt_id' => $request->rt,
            'rw_id' => $request->rw,
            'lampiran' => $hashedName,
        ]);

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success', 'Success Add Data Pengaduan');
        return redirect()->route('pengaduan_page');
    }

    public function viewSktmWarga()
    {
        $rt = Rt::all();
        $rw = Rw::all();

        return view('sktm_page', compact('rt', 'rw'));
    }

    public function createSktmWarga(Request $request)
    {
        $request->validate([
            'nikPemohon' => 'required',
            'namaPemohon' => 'required',
            'namaOrtu' => 'required',
            'pekerjaan' => 'required',
            'gaji' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'keterangan' => 'required',
        ]);

        $trace_user_id =  User::where('nik', $request->nikPemohon)->first();
        if ($trace_user_id == null) {
            Alert::error('error', 'Data Anda Tidak Ditemukan');
            return redirect()->route('sktm_page');
        }

        SuratSKTM::create([
            'pemohon_id' => $trace_user_id->id_user,
            'nama_orang_tua' => $request->namaOrtu,
            'pekerjaan_orang_tua' => $request->pekerjaan,
            'gaji_orang_tua' => $request->gaji,
            'status' => 'Proses',
            'keterangan' => $request->keterangan,
            'rt_id' => $request->rt,
            'rw_id' => $request->rw,
        ]);

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('sktm_page');
    }

    public function viewDomisiliWarga()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view('domisili_page', compact('rt', 'rw'));
    }

    public function createDomisiliWarga(Request $request)
    {

        $request->validate([
            'nikPemohon' => 'required',
            'namaPemohon' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'keterangan' => 'required',
        ]);

        $trace_user_id =  User::where('nik', $request->nikPemohon)->first();
        if ($trace_user_id == null) {
            Alert::error('error', 'Data Anda Tidak Ditemukan');
            return redirect()->route('domisili_page');
        }

        SuratDomisili::create([
            'pemohon_id' => $trace_user_id->id_user,
            'status' => 'Proses',
            'rt_id' => $request->rt,
            'rw_id' => $request->rw,
            'keterangan' => $request->keterangan,
        ]);


        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('domisili_page');
    }
}
