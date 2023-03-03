<?php

namespace App\Http\Controllers;

use App\Models\PimpinanUtama;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Management User';
        $query = $request->query('name');
        
        if ($query) {
            $pagination = User::where('name', 'like', '%' . $query . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $pagination = User::orderBy('id', 'desc')->paginate(10);
        }
        
        return view('management-user.index', [
            'title' => $title,
            'management_user' => $pagination,
            'query' => $query,
            'pimpinan_utama' => PimpinanUtama::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_admin' => 'nullable|integer',
            'role_pimpinan_utama' => 'nullable|integer',
        ]);

        $user = User::findOrFail($id);

        $user->is_admin = $request->is_admin;
        $user->role_pimpinan_utama = $request->role_pimpinan_utama;

        $user->save();

        return redirect()->back()->with('update', 'Data berhasil diupdate.');
    }
}
