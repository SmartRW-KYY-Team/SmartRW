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

        $pageTitle =  'Bantuan Sosial';
        $subPageTitle = '';
        $activePosition = "home";
        $keluarga = Keluarga::all();
        return $dataTable->render('bansos.index', ['keluarga' => $keluarga, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function create()
    {

        $pageTitle =  'Tambah Bantuan Sosial';
        $subPageTitle = '';
        $activePosition = "create";
        $users = User::whereIn('id_user', Keluarga::pluck('kepala_keluarga_id'))->get();

        $users->each(function ($user) {
            $keluarga = Keluarga::where('kepala_keluarga_id', $user->id_user)->first();
            $user->keluarga_id = $keluarga->id_keluarga;
        });
        return view('bansos.create', ['users' => $users, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keluarga_id' => 'required|numeric|unique:bansos,keluarga_id',
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
        $pageTitle =  'Bantuan Sosial';
        $subPageTitle = '';
        $activePosition = "edas";
        app(KriteriaBansosController::class)->calculateAHP();
        $kriteria =  DB::table('kriteria_bansos')->get();
        $bobotKriteria = $kriteria->pluck('bobot')->toArray();
        $tipeKriteria = $kriteria->pluck('tipe')->toArray();

        if (session('role') == 'rw') {
            $alternatives = DB::table('bansos')->get();
        } else if (session('role') == 'rt') {
            $rtId = session('no_role');
            $alternatives = DB::table('bansos')
                ->join('keluarga', 'bansos.keluarga_id', '=', 'keluarga.id_keluarga')
                ->where('keluarga.rt_id', $rtId)
                ->select('bansos.*')
                ->get();
        }

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
            for ($j = 0; $j < count($kriteria); $j++) {
                $SP[$i] += ($positiveDistances[$i][$j] * $bobotKriteria[$j]);
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
            $NSN[$i] = 1 - ($SN[$i] / $maxSN);
        }
        // Hitung Appraisal Score(AS)
        $appraisalScores = array_fill(0, count($alternatives), 0);
        for ($i = 0; $i < count($alternatives); $i++) {
            $appraisalScores[$i] = 0.5 * ($NSP[$i] + $NSN[$i]);
        }
        // Simpan AS ke DB
        foreach ($alternatives as $index => $alternative) {
            DB::table('bansos')->where('id_bansos', $alternative->id_bansos)->update([
                'AS' => $appraisalScores[$index]
            ]);
        }
        if (session('role') == 'rw') {
            $data = Bansos::with('keluarga')->orderByDesc('AS')
                ->get();
        } else if (session('role') == 'rt') {
            $data = Bansos::with('keluarga')->whereHas('keluarga', function ($query) use ($rtId) {
                $query->where('rt_id', $rtId);
            })->orderByDesc('AS')
                ->get();
        }

        // Display results
        return view('bansos.edas', compact('data', 'pageTitle', 'subPageTitle', 'activePosition'));
    }
    public function edit($id)
    {
        $pageTitle =  'Edit Bantuan Sosial';
        $subPageTitle = '';
        $activePosition = "edit";
        $users = User::whereIn('id_user', Keluarga::pluck('kepala_keluarga_id'))->get();

        $users->each(function ($user) {
            $keluarga = Keluarga::where('kepala_keluarga_id', $user->id_user)->first();
            $user->keluarga_id = $keluarga->id_keluarga;
        });
        $bansos = Bansos::findOrFail($id);
        return view('bansos.edit', ['users' => $users, 'bansos' => $bansos, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }
    public function update(Request $request, $id)
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
        $bansos = Bansos::findOrFail($id);
        if ($bansos && $validatedData) {
            $bansos->update($request->all());
            Alert::success('Success', 'Data Keluarga Berhasil Diupdate');
            return redirect()->route('bansos.index');
        } else {
            Alert::success('Error', 'Data Keluarga Gagal Diupdate');
            return redirect()->route('bansos.index');
        }
    }
}
