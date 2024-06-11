<?php

namespace App\Http\Controllers;

use App\DataTables\DomisiliDatatable;
use App\DataTables\KegiatanWargaDataTable;
use App\DataTables\PengaduanDataTable;
use App\DataTables\SKTMDataTable;
use App\Models\Kegiatan;
use App\Models\Keluarga;
use App\Models\SuratSKTM;
use App\Models\Pengaduan;
use App\Models\SuratDomisili;
use App\Models\User;
use App\Models\Rt;
use App\Models\Rw;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function viewHome()
    {
        $rt = Rt::with('sekretarisRT', 'bendaharaRT', 'ketuaRT')->get();
        $rw = Rw::with('ketuaRW', 'sekretarisRW', 'bendaharaRW')->first();
        $jumlahRT = $rt->count();
        $user = User::count('id_user');
        $keluarga = Keluarga::count('id_keluarga');
        return view('landing_page', compact('rt', 'rw', 'user', 'jumlahRT', 'keluarga'));
    }
    public function viewPengaduanWarga()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        $jumlahPengaduan = Pengaduan::count('id_pengaduan');
        return view('pengaduan_page', compact('rt', 'rw', 'jumlahPengaduan'));
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
        Alert::success('Success', 'Pengaduan Anda Berhasil Dikirim');
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
        Alert::success('Success', 'Surat Anda Berhasil Diajukan');
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
        Alert::success('Success', 'Surat Anda Berhasil Diajukan');
        return redirect()->route('domisili_page');
    }

    public function generatePDFDomisili($id)
    {
        $domisili = SuratDomisili::with('pemohon')->findOrFail($id);
        $pdf = PDF::loadView('domisili.suratdomisili.index', compact('domisili'));
        return $pdf->stream('SuratDomisil.pdf');
    }

    public function generatePDFSktm($id)
    {
        $sktm = SuratSKTM::with('pemohon')->findOrFail($id);
        $pdf = PDF::loadView('sktm.suratsktm.index', compact('sktm'));
        return $pdf->stream('SuratSktm.pdf');
    }

    public function cekStatusSktm($nik)
    {
        // cek apakah nik berada pada table users
        $cek_nik = User::where('nik', $nik)->first();
        if (!$cek_nik) {
            return response()->json(['message' => 'NIK tidak ditemukan']);
        }

        $cek_nik_sktm = SuratSKTM::where('pemohon_id', $cek_nik->id_user)->latest()->first();
        if (!$cek_nik_sktm) {
            return response()->json(['message' => 'NIK tidak ditemukan pada daftar pengajuan SKTM']);
        }

        if ($cek_nik_sktm->status == 'Proses') {
            return response()->json(['message' => 'Pengajuan Surat Anda Masih Di Proses Oleh Pengurus']);
        }
        return response()->json([
            'message' => 'NIK ditemukan pada daftar pengajuan SKTM',
            'id' => $cek_nik_sktm->id_suratSKTM
        ]);
    }

    public function cekStatusDomisili($nik)
    {
        // cek apakah nik berada pada table users
        $cek_nik = User::where('nik', $nik)->first();
        if (!$cek_nik) {
            return response()->json(['message' => 'NIK tidak dapat ditemukan']);
        }
        $cek_nik_domisili = SuratDomisili::where('pemohon_id', $cek_nik->id_user)->latest()->first();
        if (!$cek_nik_domisili) {
            return response()->json(['message' => 'NIK tidak ditemukan pada daftar pengajuan Surat Domisili']);
        }

        if ($cek_nik_domisili->status == 'Proses') {
            return response()->json(['message' => 'Pengajuan Surat Anda Masih Di Proses Oleh Pengurus']);
        }

        return response()->json([
            'message' => 'NIK ditemukan pada daftar pengajuan Surat Domisili',
            'id' => $cek_nik_domisili->id_suratDomisili
        ]);
    }


    public function showKegiatanWarga(Request $request, KegiatanWargaDataTable $dataTable)
    {
        return $dataTable->with([
            'filter_month' => $request->query('filter_month', date('m')),
            'filter_year' => $request->query('filter_year', date('Y')),
        ])->render('kegiatan_page');
    }
}
