<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = KriteriaBansos::all();
        return view('kriteria_bansos.index', compact('data'));
    }
    public function calculateAHP()
    {
        $criteria = DB::table('kriteria_bansos')->get();

        $criteriaMatrix = [];
        $criteriaNames = [];
        $criteriaIds = [];

        foreach ($criteria as $criterion) {
            $criteriaIds[] = $criterion->id; // Assume each criterion has an 'id' field
            $criteriaNames[] = $criterion->nama_kriteria;
            $criteriaMatrix[] = [
                $criterion->pendapatan,
                $criterion->kendaraan,
                $criterion->jenis_lantai,
                $criterion->kondisi_dinding,
                $criterion->kondisi_atap,
                $criterion->tanggungan,
                $criterion->listrik,
                $criterion->luas_tanah,
                $criterion->luas_bangunan
            ];
        }

        $eigenVector = $this->calculateEigenVector($criteriaMatrix);
        $consistency = $this->calculateConsistency($criteriaMatrix, $eigenVector);

        if ($consistency['CR'] < 0.1) {
            // Store PW in the database
            foreach ($eigenVector as $index => $value) {
                DB::table('kriteria_bansos')
                    ->where('id', $criteriaIds[$index])
                    ->update(['bobot' => $value]);
            }
        }

        return view('kriteria_bansos.ahp', compact('eigenVector', 'consistency', 'criteriaNames'));
    }

    private function calculateEigenVector($matrix)
    {
        $size = count($matrix);
        $sumColumns = array_fill(0, $size, 0);

        // Sum of columns
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $sumColumns[$j] += $matrix[$i][$j];
            }
        }

        // Normalization
        $normalizedMatrix = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $normalizedMatrix[$i][$j] = $matrix[$i][$j] / $sumColumns[$j];
            }
        }

        // Eigen Vector
        $eigenVector = array_fill(0, $size, 0);
        for ($i = 0; $i < $size; $i++) {
            $sumRow = array_sum($normalizedMatrix[$i]);
            $eigenVector[$i] = $sumRow / $size;
        }

        return $eigenVector;
    }

    private function calculateConsistency($matrix, $eigenVector)
    {
        $size = count($matrix);
        $lambdaMax = 0;

        // Calculate λmax
        for ($i = 0; $i < $size; $i++) {
            $rowSum = 0;
            for ($j = 0; $j < $size; $j++) {
                $rowSum += $matrix[$i][$j] * $eigenVector[$j];
            }
            $lambdaMax += $rowSum / $eigenVector[$i];
        }
        $lambdaMax /= $size;

        // Calculate CI
        $CI = ($lambdaMax - $size) / ($size - 1);

        // RI values for matrices up to size 10
        $RI = [0.00, 0.00, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];

        // Calculate CR
        $CR = $CI / $RI[$size - 1];

        return ['CI' => $CI, 'CR' => $CR];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
