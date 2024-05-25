<?php
namespace App\Http\Controllers;

use App\DataTables\KeuanganRWDataTable;
use App\Models\KeuanganRW;
use App\Models\Rw;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class KeuanganRWController extends Controller
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

        $keuanganrw = KeuanganRW::create($request->all());

        Log::info('Store: Created KeuanganRW', ['keuanganrw' => $keuanganrw]);

        $this->updateSaldo($keuanganrw->rw_id, $keuanganrw->jumlah, $keuanganrw->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Ditambahkan');
        return redirect()->route('keuanganrw.index');
    }

    public function destroy($id)
    {
        $keuanganrw = KeuanganRW::findOrFail($id);

        Log::info('Destroy: Deleting KeuanganRW', ['keuanganrw' => $keuanganrw]);

        $this->updateSaldo($keuanganrw->rw_id, $keuanganrw->jumlah, $keuanganrw->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

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
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rw_id' => 'required',
        ]);

        $keuanganrw = KeuanganRW::findOrFail($id);

        Log::info('Update: Updating KeuanganRW', ['keuanganrw' => $keuanganrw, 'request' => $request->all()]);

        // Mengembalikan saldo sebelumnya
        $this->updateSaldo($keuanganrw->rw_id, $keuanganrw->jumlah, $keuanganrw->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

        $keuanganrw->update($request->only(['tipe', 'tanggal', 'keterangan', 'jumlah', 'rw_id']));

        // Update saldo baru
        $this->updateSaldo($keuanganrw->rw_id, $request->jumlah, $request->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');

        return redirect()->route('keuanganrw.index');
    }

    private function updateSaldo($rwId, $jumlah, $tipe)
    {
        $rw = Rw::findOrFail($rwId);

        if ($tipe == 'Masuk') {
            $rw->saldo += $jumlah;
        } elseif ($tipe == 'Keluar') {
            $rw->saldo -= $jumlah;
        }

        Log::info('UpdateSaldo: Updating Rw saldo', ['rw' => $rw]);

        $rw->save();
    }
}
