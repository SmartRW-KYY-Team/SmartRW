<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganRWDataTable;
use App\Models\KeuanganRW;
use App\Models\Rw;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KeuanganRWController extends Controller
{
    public function index(KeuanganRWDataTable $dataTable)
    {
        $rw_id = session('no_role');
        $role = session('role');

        if (Auth::check() && $rw_id && $role === 'rw') {
            $keuanganRW = KeuanganRW::where('rw_id', $rw_id)->get();

            $currentBalance = Rw::find($rw_id)->saldo;
            $currentMonth = date('m');

            $monthlyIncome = KeuanganRW::where('rw_id', $rw_id)
                ->where('tipe', 'Masuk')
                ->whereMonth('tanggal', $currentMonth)
                ->sum('jumlah');

            $monthlyExpense = KeuanganRW::where('rw_id', $rw_id)
                ->where('tipe', 'Keluar')
                ->whereMonth('tanggal', $currentMonth)
                ->sum('jumlah');

            return $dataTable->render('keuanganrw.index', [
                'keuanganrw' => $keuanganRW,
                'currentBalance' => $currentBalance,
                'monthlyIncome' => $monthlyIncome,
                'monthlyExpense' => $monthlyExpense
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);
        $rw_id = session('no_role');


        $request->merge(['rw_id' => $rw_id]);

        KeuanganRW::create($request->all());

        $this->updateSaldo($rw_id, $request->jumlah, $request->tipe);

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
        ]);

        $rw_id = session('no_role');

        $keuanganrw = KeuanganRW::findOrFail($id);

        $this->updateSaldo($keuanganrw->rw_id, $keuanganrw->jumlah, $keuanganrw->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

        $keuanganrw->fill($request->except('id'));
        $keuanganrw->rw_id = $rw_id;
        $keuanganrw->save();

        $this->updateSaldo($rw_id, $request->jumlah, $request->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');
        return redirect()->route('keuanganrw.index');
    }

    private function updateSaldo($rwId, $jumlah, $tipe)
    {
        $rw = Rw::findOrFail($rwId);

        $keuanganRW = KeuanganRW::where('rw_id', $rwId)->latest()->first();
        
        $totalSaldo = $rw->saldo;

        if ($tipe == 'Masuk') {
            $totalSaldo += $jumlah;
        } elseif ($tipe == 'Keluar') {
            $totalSaldo -= $jumlah;
        }

        $keuanganRW->sisa_saldo = $totalSaldo;
        $keuanganRW->save();

        $rw->saldo = $totalSaldo;
        $rw->save();
    }
}
