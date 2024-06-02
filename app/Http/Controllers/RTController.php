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
        return $dataTable->render('rt.index');
    }

    public function edit($id)
    {
        $rt = Rt::findOrFail($id);
        $users = User::all();
        return view('rt.edit', ['rt' => $rt, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ketua_id' => 'required',
            'sekretaris_id' => 'required',
            'bendahara_id' => 'required',
            'saldo' => 'required|integer',
        ]);

        $rt = Rt::findOrFail($id);
        $rt->update($request->all());

        Alert::success('Success', 'Data RT berhasil diperbarui');
        return redirect()->route('rt.index');
    }
}
