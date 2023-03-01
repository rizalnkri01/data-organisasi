<?php

namespace App\Http\Controllers;

use App\Models\PimpinanKedua;
use Illuminate\Http\Request;

class PimpinanUtamaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Kecamatan';
        $query = $request->query('name');

        if ($query) {
            $pagination = PimpinanKedua::with('user')
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->whereNull('name_pimpinan_kedua')
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        } else {
            $pagination = PimpinanKedua::with('user')
                ->whereNull('name_pimpinan_kedua')
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        }


        return view('kecamatan.index', [
            'title' => $title,
            'kecamatan' => $pagination,
            'query' => $query,
        ]);
    }
}