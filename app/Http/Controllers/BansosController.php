<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\Keluarga;
use App\Models\User;
use App\DataTables\BansosDataTable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

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

    public function proses(){
        
    }
}
