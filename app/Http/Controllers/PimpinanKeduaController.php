<?php

namespace App\Http\Controllers;

use App\Models\PimpinanKedua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PimpinanKeduaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Ranting';
        $query = $request->query('name');

        if (auth()->user()->is_admin == 2) {
            // jika is_admin = 2, tampilkan semua data
            $pagination = PimpinanKedua::with('user', 'pimpinan_utama')
                ->where(function ($q) use ($query) {
                    if ($query) {
                        $q->whereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                        $q->orWhere('name_pimpinan_kedua', 'like', '%' . $query . '%');
                    }
                    $q->whereNotNull('name_pimpinan_kedua');
                })
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        } elseif (auth()->user()->is_admin == 1) {
            // jika is_admin != 1, filter berdasarkan role_pimpinan_kedua dan pimpinan_utama_id
            $pagination = PimpinanKedua::with('user', 'pimpinan_utama')
                ->whereHas('user', function ($q) {
                    $q->where('pimpinan_utama_id', auth()->user()->role_pimpinan_utama);  
                })
                ->where(function ($q) use ($query) {
                    if ($query) {
                        $q->whereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                        $q->orWhere('name_pimpinan_kedua', 'like', '%' . $query . '%');
                    }
                    $q->whereNotNull('name_pimpinan_kedua');
                })
                ->orderBy('pimpinan_utama_id', 'asc')
                ->paginate(10);
        } else {
            abort(403);
        }

        return view('pimpinan_kedua.index', [
            'title' => $title,
            'pimpinan_kedua' => $pagination,
            'query' => $query,
        ]);
    }



}
