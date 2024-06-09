<?php

namespace App\Http\Controllers;

use App\DataTables\KegiatanDataTable;
use App\Models\Kegiatan;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use stdClass;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KegiatanDataTable $dataTable)
    {
        $pageTitle =  'Agenda Kegiatan';
        $subPageTitle = 'Kegiatan SmartRW';
        $activePosition = "home";
        return $dataTable->render('kegiatan.index', ['pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle =  'Agenda Kegiatan';
        $subPageTitle = 'Agenda Kegiatan SmartRW';
        $activePosition = "create";
        $rt = Rt::all();
        $rw = Rw::all();
        return view('kegiatan.create', compact('rt', 'rw', 'pageTitle', 'subPageTitle', 'activePosition'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|min:5',
            'tanggal_kegiatan' => 'required|date|after:now',
            'deskripsi' => 'required|string|min:5',
            'rt_id' => 'required|integer',
            'rw_id' => 'required|integer',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $hashedName = $lampiran->hashName();
            $lampiran->storeAs('public/kegiatan', $hashedName);
        } else {
            $hashedName = null;
        }
        if ($validated) {
            Kegiatan::create([
                'id_kegiatan' => $request->id_kegiatan,
                'nama' => $request->nama,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'deskripsi' => $request->deskripsi,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
                'lampiran' => $hashedName,
            ]);
            Alert::success('Success', 'Success Insert Data ');
            return redirect('/kegiatan');
        } else {
            Alert::error('Error', 'Success Insert Data ');
            return redirect('/kegiatan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kegiatan = Kegiatan::findOrFail($id);
        return response()->json($kegiatan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pageTitle =  'Edit Agenda Kegiatan';
        $subPageTitle = 'Agenda Kegiatan SmartRW';
        $activePosition = "edit";
        $rt = Rt::all();
        $rw = Rw::all();
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan', 'rt', 'rw', 'pageTitle', 'subPageTitle', 'activePosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|min:3',
            'tanggal_kegiatan' => 'required|date|after:now',
            'deskripsi' => 'required|string|min:5',
            'rt_id' => 'required|integer',
            'rw_id' => 'required|integer',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);
        $kegiatan = Kegiatan::findOrFail($id);
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $hashedName = $lampiran->hashName();
            $lampiran->storeAs('public/kegiatan', $hashedName);
        } else {
            $kegiatan->update([
                'nama' => $request->nama,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'deskripsi' => $request->deskripsi,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
            ]);
            Alert::success('Success', 'Success Update Data ');
            return redirect('/kegiatan');
        }
        if ($validated) {
            $kegiatan->update([
                'nama' => $request->nama,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'deskripsi' => $request->deskripsi,
                'rt_id' => $request->rt_id,
                'rw_id' => $request->rw_id,
                'lampiran' => $hashedName,
            ]);
            Alert::success('Success', 'Success Update Data ');
            return redirect('/kegiatan');
        } else {
            Alert::error('Error', 'Error Update Data');
            return redirect('/kegiatan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan) {
            $kegiatan->delete();
            Alert::success('Success', 'Success Delete Data ');
            return redirect('/kegiatan');
        } else {
            Alert::error('Error', 'Error Delete Data');
            return redirect('/kegiatan');
        }
    }
}
