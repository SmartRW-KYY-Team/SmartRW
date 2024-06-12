<?php

namespace App\Http\Controllers;

use App\DataTables\RTDataTable;
use App\Models\Rt;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RTController extends Controller
{
    public function index(RTDataTable $dataTable)
    {
        $pageTitle =  'Data RT';
        $subPageTitle = 'Kegiatan SmartRW';
        $activePosition = "home";
        return $dataTable->render('rt.index', ['pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function edit($id)
    {
        $pageTitle =  'Edit Data RT';
        $subPageTitle = 'Data RT SmartRW';
        $activePosition = "edit";
        $rt = Rt::findOrFail($id);
        $users = User::where('rt_id', $id)->get();
        return view('rt.edit', ['rt' => $rt, 'users' => $users, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function update(Request $request, $id)
    {
        $rt = Rt::findOrFail($id);
        $id_rt = $rt->id_rt;

        $request->validate([
            'ketua_id' => 'required|unique:rt,ketua_id,' . $id_rt,
            'sekretaris_id' => 'required|unique:rt,sekretaris_id,' . $id_rt,
            'bendahara_id' => 'required|unique:rt,bendahara_id,' . $id_rt,
        ]);

        $rt = Rt::findOrFail($id);
        $rt->update($request->all());

        Alert::success('Berhasil', 'Data RT berhasil diperbarui');
        return redirect()->route('rt.index');
    }
}
