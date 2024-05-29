<?php

namespace App\Http\Controllers;

use App\DataTables\DomisiliDatatable;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Models\SuratDomisili;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class DomisiliController extends Controller
{
    public function index(DomisiliDatatable $dataTable)
    {
        $domisili = SuratDomisili::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $pemohon = User::all();
        return $dataTable->render('domisili.home', ['domisili' => $domisili, 'rt' => $rt, 'rw' => $rw, 'pemohon' => $pemohon]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        // $request->validate([
        //     'pemohon' => 'required|',
        //     'status' => 'required',
        //     'keterangan' => 'required|string|max:255',
        // ]);

        // Buat pengguna baru berdasarkan data yang valid
        $suratDomisili = SuratDomisili::create([
            'pemohon_id' => $request->pemohon,
            'status' => 'Proses',
            'rt_id' => $request->rt,
            'rw_id' => $request->rw,
            'keterangan' => $request->keterangan,

        ]);

        // Cek apakah permintaan adalah AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Data berhasil ditambahkan', 'data' => $suratDomisili]);
        }

        // Redirect ke halaman yang sesuai (misalnya halaman daftar pengguna)
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('domisili.index');
    }

    public function accept(Request $request, $id)
    {
        try {
            // Find the SuratDomisili by ID
            $suratDomisili = SuratDomisili::findOrFail($id);

            // Update the status
            $suratDomisili->status = 'Selesai';
            $suratDomisili->save();

            // Return success response
            return response()->json(['success' => 'Status berhasil diperbarui']);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui status'], 500);
        }
    }

    public function show($id)
    {
        $SuratDomisili = SuratDomisili::with('pemohon', 'rw', 'rt')->findOrFail($id);
        return response()->json($SuratDomisili);
    }
}