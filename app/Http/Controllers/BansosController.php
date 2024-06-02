<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\Keluarga;
use App\Models\User;
use App\DataTables\BansosDataTable;
use App\Models\KriteriaBansos;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BansosController extends Controller
{
    public function index(BansosDataTable $dataTable)
    {
        $keluarga = Keluarga::all();
        return $dataTable->render('bansos.index', ['keluarga' => $keluarga]);
    }

    public function create()
    {
        $users = User::whereIn('id_user', Keluarga::pluck('kepala_keluarga_id'))->get();

        $users->each(function ($user) {
            $keluarga = Keluarga::where('kepala_keluarga_id', $user->id_user)->first();
            $user->keluarga_id = $keluarga->id_keluarga;
        });
        return view('bansos.create', ['users' => $users]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keluarga_id' => 'required|numeric',
            'K1' => 'required|numeric',
            'K2' => 'required|numeric',
            'K3' => 'required|numeric',
            'K4' => 'required|numeric',
            'K5' => 'required|numeric',
            'K6' => 'required|numeric',
            'K7' => 'required|numeric',
            'K8' => 'required|numeric',
            'K9' => 'required|numeric',
        ]);

        Bansos::create($validatedData);

        Alert::success('Success', 'Data Keluarga Berhasil Ditambahkan');
        return redirect()->route('bansos.index');
    }

    public function delete($id)
    {
        $bansos = Bansos::findOrFail($id);
        $bansos->delete();

        Alert::success('Success', 'Data Keluarga Berhasil Dihapus');
        return redirect()->route('bansos.index');
    }

    public function process()
    {
        $kriteria =  DB::table('kriteria_bansos')->get();
        $bobotKriteria = $kriteria->pluck('bobot')->toArray();
        $tipeKriteria = $kriteria->pluck('tipe')->toArray();

        $alternatives = DB::table('bansos')->get();

        // Hitung AV
        $averageSolution = [];
        for ($i = 1; $i <= count($alternatives); $i++) {
            $averageSolution[] = $alternatives->avg('K' . $i);
        }

        // Hitung NDA dan PDA
        $positiveDistances = [];
        $negativeDistances = [];
        foreach ($alternatives as $alternative) {
            $positiveDistance = [];
            $negativeDistance = [];
            for ($i = 1; $i <= 9; $i++) {
                $kValue = $alternative->{'K' . $i};
                $avg = $averageSolution[$i - 1];
                if ($tipeKriteria[$i - 1] == 'benefit') {
                    $positiveDistance[] = max(0, $kValue - $avg) / $avg;
                    $negativeDistance[] = max(0, $avg - $kValue) / $avg;
                } else if ($tipeKriteria[$i - 1] == 'cost') {
                    $positiveDistance[] = max(0,  $avg - $kValue) / $avg;
                    $negativeDistance[] = max(0, $kValue - $avg) / $avg;
                }
            }
            $positiveDistances[] = $positiveDistance;
            $negativeDistances[] = $negativeDistance;
        }
        // Hitung SP dan SN
        $SP = array_fill(0, count($alternatives), 0);
        $SN =  array_fill(0, count($alternatives), 0);
        for ($i = 0; $i < count($alternatives); $i++) {
            for ($j = 0; $j < count($kriteria) - 1; $j++) {
                $SP[$i] += ($bobotKriteria[$j] * $positiveDistances[$i][$j]);
                $SN[$i] += ($bobotKriteria[$j] * $negativeDistances[$i][$j]);
            }
        }
        //Hitung NSP dan NSN
        $maxSP = max($SP);
        $maxSN = max($SN);
        $NSP = array_fill(0, count($alternatives), 0);
        $NSN =  array_fill(0, count($alternatives), 0);
        for ($i = 0; $i < count($alternatives); $i++) {
            $NSP[$i] = $SP[$i] / $maxSP;
            $NSN[$i] = $SN[$i] / $maxSN;
        }
        // Hitung Appraisal Score(AS)
        $appraisalScores = array_fill(0, count($alternatives), 0);
        for ($i = 0; $i < count($alternatives); $i++) {
            $appraisalScores[$i] = 0.5 * ($NSP[$i] + $NSN[$i]);
        }

        // Display results
        return view('bansos.edas', compact('alternatives', 'appraisalScores'));
    }
}
