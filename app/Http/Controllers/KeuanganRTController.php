<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganRTDataTable;
use App\Models\KeuanganRT;
use App\Models\Rt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KeuanganRTController extends Controller
{
    public function index(KeuanganRTDataTable $dataTable)
    {
        $pageTitle =  'Keuangan RT';
        $subPageTitle = '';
        $activePosition = "home";
        $rt_id = session('no_role');
        $role = session('role');

        if (Auth::check() && $rt_id && $role === 'rt') {

            $keuanganRT = KeuanganRT::where('rt_id', $rt_id)->get();

            $currentBalance = Rt::find($rt_id)->saldo;
            $currentMonth = date('m');

            $monthlyIncome = KeuanganRT::where('rt_id', $rt_id)
                ->where('tipe', 'Masuk')
                ->whereMonth('tanggal', $currentMonth)
                ->sum('jumlah');

            $monthlyExpense = KeuanganRT::where('rt_id', $rt_id)
                ->where('tipe', 'Keluar')
                ->whereMonth('tanggal', $currentMonth)
                ->sum('jumlah');

            return $dataTable->render('keuanganrt.index', [
                'keuanganrt' => $keuanganRT,
                'currentBalance' => $currentBalance,
                'monthlyIncome' => $monthlyIncome,
                'monthlyExpense' => $monthlyExpense,
                'pageTitle' => $pageTitle,
                'subPageTitle' => $subPageTitle,
                'activePosition' => $activePosition
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
        $rt_id = session('no_role');

        $request->merge(['rt_id' => $rt_id]);

        KeuanganRT::create($request->all());

        $this->updateSaldo($rt_id, $request->jumlah, $request->tipe);

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
        ]);

        $rt_id = session('no_role');

        $keuanganrt = KeuanganRT::findOrFail($id);

        $this->updateSaldo($keuanganrt->rt_id, $keuanganrt->jumlah, $keuanganrt->tipe == 'Masuk' ? 'Keluar' : 'Masuk');

        $keuanganrt->fill($request->except('id'));
        $keuanganrt->rt_id = $rt_id;
        $keuanganrt->save();

        $this->updateSaldo($rt_id, $request->jumlah, $request->tipe);

        Alert::success('Success', 'Data Keuangan Berhasil Diperbarui');
        return redirect()->route('keuanganrt.index');
    }

    private function updateSaldo($rtId, $jumlah, $tipe)
    {
        $rt = Rt::findOrFail($rtId);

        $keuanganRT = KeuanganRT::where('rt_id', $rtId)->latest()->first();

        $totalSaldo = $rt->saldo;

        if ($tipe == 'Masuk') {
            $totalSaldo += $jumlah;
        } elseif ($tipe == 'Keluar') {
            $totalSaldo -= $jumlah;
        }

        $keuanganRT->sisa_saldo = $totalSaldo;
        $keuanganRT->save();

        $rt->saldo = $totalSaldo;
        $rt->save();
    }
}
