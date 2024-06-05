<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SKTMDataTable;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\SuratSKTM;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class SKTMController extends Controller
{
    public function index(SKTMDataTable $dataTable)
    {
        $sktm = SuratSKTM::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $pemohon = User::all();
        return $dataTable->render('sktm.home', ['sktm' => $sktm, 'rt' => $rt, 'rw' => $rw, 'pemohon' => $pemohon]);
    }

    public function store(Request $request)
    {
        // Buat pengguna baru berdasarkan data yang valid
        $suratSKTM = SuratSKTM::create([
            'pemohon_id' => $request->pemohon,
            'status' => 'Proses',
            'rt_id' => $request->rt,
            'rw_id' => $request->rw,
            'keterangan' => $request->keterangan,

        ]);

        // Cek apakah permintaan adalah AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Data berhasil ditambahkan', 'data' => $suratSKTM]);
        }

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('sktm.index');
    }

    public function accept(Request $request, $id)
    {
        try {
            // Find the SuratDomisili by ID
            $suratSKTM = SuratSKTM::findOrFail($id);

            // Update the status
            $suratSKTM->status = 'Selesai';
            $suratSKTM->save();

            // Return success response
            return response()->json(['success' => 'Status berhasil diperbarui']);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui status'], 500);
        }
    }
    public function show($id)
    {
        $SuratDomisili = SuratSKTM::with('pemohon', 'rw', 'rt')->findOrFail($id);
        return response()->json($SuratDomisili);
    }
}
