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
        $subPageTitle = 'RT SmartRW';
        $activePosition = "home";
        return $dataTable->render('rt.index', ['pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    public function edit($id)
    {
        $pageTitle =  'Edit Data RT';
        $subPageTitle = '';
        $activePosition = "edit";
        $rt = Rt::findOrFail($id);
        $users = User::where('rt_id', $id)->get();
        return view('rt.edit', ['rt' => $rt, 'users' => $users, 'pageTitle' => $pageTitle, 'subPageTitle' => $subPageTitle, 'activePosition' => $activePosition]);
    }

    // public function update(Request $request, $id)
    // {

    //     $request->validate([
    //         'ketua_id' => 'required|unique:rt,ketua_id,' . $id . ',id_rt',
    //         'sekretaris_id' => 'required|unique:rt,sekretaris_id,' . $id . ',id_rt',
    //         'bendahara_id' => 'required|unique:rt,bendahara_id,' . $id . ',id_rt',
    //     ]);

    //     $rt = Rt::findOrFail($id);
    //     $rt->update($request->all());

    //     Alert::success('Berhasil', 'Data RT berhasil diperbarui');
    //     return redirect()->route('rt.index');
    // }
    public function update(Request $request, $id)
    {
        // Validasi standar
        $request->validate([
            'ketua_id' => 'required|unique:rt,ketua_id,' . $id . ',id_rt',
            'sekretaris_id' => 'required|unique:rt,sekretaris_id,' . $id . ',id_rt',
            'bendahara_id' => 'required|unique:rt,bendahara_id,' . $id . ',id_rt',
        ]);

        // Validasi kustom untuk memastikan tidak ada pengguna yang memegang lebih dari satu jabatan di RT manapun
        $existingRtWithKetua = Rt::where('ketua_id', $request->ketua_id)->where('id_rt', '!=', $id)->exists();
        $existingRtWithSekretaris = Rt::where('sekretaris_id', $request->sekretaris_id)->where('id_rt', '!=', $id)->exists();
        $existingRtWithBendahara = Rt::where('bendahara_id', $request->bendahara_id)->where('id_rt', '!=', $id)->exists();

        if ($existingRtWithKetua) {
            return redirect()->back()->withErrors(['ketua_id' => 'Pengguna ini sudah memegang jabatan sebagai Ketua di RT lain.'])->withInput();
        }
        if ($existingRtWithSekretaris) {
            return redirect()->back()->withErrors(['sekretaris_id' => 'Pengguna ini sudah memegang jabatan sebagai Sekretaris di RT lain.'])->withInput();
        }
        if ($existingRtWithBendahara) {
            return redirect()->back()->withErrors(['bendahara_id' => 'Pengguna ini sudah memegang jabatan sebagai Bendahara di RT lain.'])->withInput();
        }

        // Validasi kustom untuk memastikan tidak ada duplikasi jabatan dalam RT yang sama
        if ($request->ketua_id == $request->sekretaris_id) {
            return redirect()->back()->withErrors(['sekretaris_id' => 'Ketua dan Sekretaris tidak boleh sama.'])->withInput();
        }
        if ($request->ketua_id == $request->bendahara_id) {
            return redirect()->back()->withErrors(['bendahara_id' => 'Ketua dan Bendahara tidak boleh sama.'])->withInput();
        }
        if ($request->sekretaris_id == $request->bendahara_id) {
            return redirect()->back()->withErrors(['bendahara_id' => 'Sekretaris dan Bendahara tidak boleh sama.'])->withInput();
        }

        // Mengupdate data RT
        $rt = Rt::findOrFail($id);
        $rt->update($request->all());

        // Menampilkan pesan sukses
        Alert::success('Berhasil', 'Data RT berhasil diperbarui');
        return redirect()->route('rt.index');
    }
}
