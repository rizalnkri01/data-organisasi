<?php

namespace App\Http\Controllers;

use App\Models\PimpinanKedua;
use Illuminate\Http\Request;

class PimpinanKeduaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Ranting';
        $query = $request->query('name');

        if ($query) {
            $pagination = PimpinanKedua::with('user', 'pimpinan_utama')
                ->whereHas('pimpinan_utama', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->where(function ($q) {
                    $q->whereNotNull('name_pimpinan_kedua');
                })
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        } else {
            $pagination = PimpinanKedua::with('user', 'pimpinan_utama')
                ->where(function ($q) {
                    $q->whereNotNull('name_pimpinan_kedua');
                })
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        }

        return view('pimpinan_kedua.index', [
            'title' => $title,
            'pimpinan_kedua' => $pagination,
            'query' => $query,
        ]);
    }
}
