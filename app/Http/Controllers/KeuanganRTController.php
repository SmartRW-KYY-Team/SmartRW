<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganRTDataTable;
use App\Models\KeuanganRT;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class keuanganRTController extends Controller
{
    public function index(KeuanganRTDataTable $dataTable)
    {
        $keuanganRT = KeuanganRT::all();
        return $dataTable->render('keuanganrt.index', ['keuanganrt' => $keuanganRT]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rt_id' => 'required',
        ]);

        KeuanganRT::create($request->all());

        Alert::success('Success', 'Data Keuangan Berhasil Ditambahkan');
        return redirect()->route('keuanganrt.index');
    }

    public function destroy($id)
    {
        $keuanganrt = KeuanganRT::findOrFail($id);
        $keuanganrt->delete();

        Alert::success('Success', 'Data Keuangan Berhasil Dihapus');
        return redirect()->route('keuanganrt.index');
    }

    public function edit($id)
    {
        $keuanganrt = KeuanganRT::findOrFail($id);
        return response()->json($keuanganrt);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rt_id' => 'required',
        ]);
    
        $keuanganrt = KeuanganRT::findOrFail($id);
    
        $keuanganrt->update([
            'tipe' => $request->tipe,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
        ]);
    
        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');
    
        return redirect()->route('keuanganrt.index');
    }
}
