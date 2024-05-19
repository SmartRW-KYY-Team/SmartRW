<?php

namespace App\Http\Controllers;

use App\DataTables\DomisiliDatatable;
use Illuminate\Http\Request;
use App\Models\SuratDomisili;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class DomisiliController extends Controller
{
    public function index(DomisiliDatatable $dataTable)
    {
        $domisili = SuratDomisili::all();
        return $dataTable->render('domisili.home', ['domisili' => $domisili]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'pemohon' => 'required|string|max:255',
            'status' => 'required',
            'keterangan' => 'required|string|max:255',
        ]);

        // Buat pengguna baru berdasarkan data yang valid
        $suratDomisili = SuratDomisili::create([
            'pemohon' => $request->pemohon,
            'status' => $request->status,
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
}
