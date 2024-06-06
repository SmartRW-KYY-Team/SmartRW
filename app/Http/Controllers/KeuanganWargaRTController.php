<?php

namespace App\Http\Controllers;

use App\DataTables\KeuanganWargaRTDataTable;
use App\Models\KeuanganRT;
use App\Models\Rt;
use Illuminate\Http\Request;

class KeuanganWargaRTController extends Controller
{
    public function index(Request $request, KeuanganWargaRTDataTable $dataTable)
    {
        $rt_id = $request->query('rt_id', session('no_role', 1)); 
        $currentMonth = $request->query('filter_month', date('m'));
        $currentYear = $request->query('filter_year', date('Y'));
    
        if ($rt_id) {
            $currentBalance = Rt::find($rt_id)->saldo;
    
            $monthlyIncome = KeuanganRT::where('rt_id', $rt_id)
                ->where('tipe', 'Masuk')
                ->whereMonth('tanggal', $currentMonth)
                ->whereYear('tanggal', $currentYear)
                ->sum('jumlah');
    
            $monthlyExpense = KeuanganRT::where('rt_id', $rt_id)
                ->where('tipe', 'Keluar')
                ->whereMonth('tanggal', $currentMonth)
                ->whereYear('tanggal', $currentYear)
                ->sum('jumlah');
    
            return $dataTable->render('keuanganWarga.rt.index', [
                'currentBalance' => $currentBalance,
                'monthlyIncome' => $monthlyIncome,
                'monthlyExpense' => $monthlyExpense
            ]);
        }
    }
}
