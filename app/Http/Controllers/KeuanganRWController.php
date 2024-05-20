<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganRWDataTable;
use App\Models\KeuanganRW;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class keuanganRWController extends Controller
{
    public function index(KeuanganRWDataTable $dataTable)
    {
        $keuanganRW = KeuanganRW::all();
        return $dataTable->render('keuanganrw.index', ['keuanganrw' => $keuanganRW]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rw_id' => 'required',
        ]);

        KeuanganRW::create($request->all());

        Alert::success('Success', 'Data Keuangan Berhasil Ditambahkan');
        return redirect()->route('keuanganrw.index');
    }

    public function destroy($id)
    {
        $keuanganrw = KeuanganRW::findOrFail($id);
        $keuanganrw->delete();

        Alert::success('Success', 'Data Keuangan Berhasil Dihapus');
        return redirect()->route('keuanganrw.index');
    }

    public function edit($id)
    {
        $keuanganrw = KeuanganRW::findOrFail($id);
        return response()->json($keuanganrw);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rw_id' => 'required',
        ]);
    
        $keuanganrw = KeuanganRW::findOrFail($id);
    
        $keuanganrw->update([
            'tipe' => $request->tipe,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
        ]);
    
        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');
    
        return redirect()->route('keuanganrw.index');
    }
}
