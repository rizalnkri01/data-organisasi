<?php

namespace App\Http\Controllers;

use App\Models\PimpinanUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanUtamaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Kecamatan';
        $query = $request->query('name');
        
        if ($query) {
            $pagination = PimpinanUtama::where('name', 'like', '%' . $query . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $pagination = PimpinanUtama::orderBy('id', 'desc')->paginate(10);
        }
        
        return view('kecamatan.index', [
            'title' => $title,
            'kecamatan' => $pagination,
            'query' => $query,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
 
        $request->user()->pimpinan_utama()->create($validated);
 
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pimpinanUtama = PimpinanUtama::findOrFail($id);

        $pimpinanUtama->name = $request->name;

        $pimpinanUtama->save();

        return redirect()->back()->with('update', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pimpinanUtama = PimpinanUtama::findOrFail($id);
        $pimpinanUtama->delete();

        return redirect()->back()->with('delete', 'Data berhasil dihapus.');
    }
}
