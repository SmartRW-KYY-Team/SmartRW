<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganWargaRWDataTable;
use App\Models\KeuanganRW;
use App\Models\Rw;
use Illuminate\Http\Request;

class KeuanganWargaRWController extends Controller
{
    public function index(Request $request, KeuanganWargaRWDataTable $dataTable)
    {
        $rw_id = $request->query('rw_id', session('no_role', 1));
        $currentMonth = $request->query('filter_month', date('m'));
        $currentYear = $request->query('filter_year', date('Y'));

        if ($rw_id) {
            $currentBalance = Rw::find($rw_id)->saldo;

            $monthlyIncome = KeuanganRW::where('rw_id', $rw_id)
                ->where('tipe', 'Masuk')
                ->whereMonth('tanggal', $currentMonth)
                ->whereYear('tanggal', $currentYear)
                ->sum('jumlah');

            $monthlyExpense = KeuanganRW::where('rw_id', $rw_id)
                ->where('tipe', 'Keluar')
                ->whereMonth('tanggal', $currentMonth)
                ->whereYear('tanggal', $currentYear)
                ->sum('jumlah');

            return $dataTable->render('keuanganWarga.rw.index', [
                'currentBalance' => $currentBalance,
                'monthlyIncome' => $monthlyIncome,
                'monthlyExpense' => $monthlyExpense
            ]);
        }
    }
}
