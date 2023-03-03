<?php

namespace App\Http\Controllers;

use App\Models\InformasiOrganisasi;
use Illuminate\Http\Request;

class KetuaDanKomandanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Ketua dan Komandan';
        $query = $request->query('name');

        if (auth()->user()->is_admin == 2) {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
            ->whereNotNull('ketua')
            ->where(function ($q) use ($query) {
                $q->where('ketua', 'like', '%' . $query . '%')
                ->orWhere('komandan', 'like', '%' . $query . '%')
                ->orWhereHas('pimpinan_utama', function($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('pimpinan_kedua', function($q) use ($query) {
                    $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                });
            })
            ->orderBy('ketua', 'desc')
            ->paginate(10);
        } elseif (auth()->user()->is_admin == 1) {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
            ->where(function ($q) use ($query) {
                $q->where('ketua', 'like', '%' . $query . '%')
                ->orWhereHas('pimpinan_utama', function($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('pimpinan_kedua', function($q) use ($query) {
                    $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                });
            })
            ->where(function ($q) {
                $q->whereHas('pimpinan_kedua', function ($q) {
                    $q->where('pimpinan_utama_id', auth()->user()->role_pimpinan_utama);
                })
                ->orWhere(function ($q) {
                    $q->whereNull('pimpinan_kedua_id')->whereHas('pimpinan_utama', function ($q) {
                        $q->where('id', auth()->user()->role_pimpinan_utama);
                    });
                });
            })
            ->orderBy('ketua', 'desc')
            ->paginate(10);
        } else {
            abort(403);
        }




        return view('ketua-dan-komandan.index', [
            'title' => $title,
            'ketua_dan_komandan' => $pagination,
            'query' => $query,
        ]);
    }

}
