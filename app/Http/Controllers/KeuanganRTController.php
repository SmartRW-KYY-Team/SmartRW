<?php
namespace App\Http\Controllers;

use App\DataTables\KeuanganRTDataTable;
use App\Models\KeuanganRT;
use App\Models\Rt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class KeuanganRTController extends Controller
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

        $keuanganrt = KeuanganRT::create($request->all());

        Log::info('Store: Created KeuanganRT', ['keuanganrt' => $keuanganrt]);

        $this->updateSaldo($keuanganrt->rt_id, $keuanganrt->jumlah, $keuanganrt->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Ditambahkan');
        return redirect()->route('keuanganrt.index');
    }

    public function destroy($id)
    {
        $keuanganrt = KeuanganRT::findOrFail($id);

        Log::info('Destroy: Deleting KeuanganRT', ['keuanganrt' => $keuanganrt]);

        $this->updateSaldo($keuanganrt->rt_id, $keuanganrt->jumlah, $keuanganrt->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

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
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'rt_id' => 'required',
        ]);

        $keuanganrt = KeuanganRT::findOrFail($id);

        Log::info('Update: Updating KeuanganRT', ['keuanganrt' => $keuanganrt, 'request' => $request->all()]);

        // Mengembalikan saldo sebelumnya
        $this->updateSaldo($keuanganrt->rt_id, $keuanganrt->jumlah, $keuanganrt->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

        $keuanganrt->update($request->only(['tipe', 'tanggal', 'keterangan', 'jumlah', 'rt_id']));

        // Update saldo baru
        $this->updateSaldo($keuanganrt->rt_id, $request->jumlah, $request->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');

        return redirect()->route('keuanganrt.index');
    }

    private function updateSaldo($rtId, $jumlah, $tipe)
    {
        $rt = Rt::findOrFail($rtId);

        if ($tipe == 'Masuk') {
            $rt->saldo += $jumlah;
        } elseif ($tipe == 'Keluar') {
            $rt->saldo -= $jumlah;
        }

        Log::info('UpdateSaldo: Updating RT saldo', ['rt' => $rt]);

        $rt->save();
    }
}
