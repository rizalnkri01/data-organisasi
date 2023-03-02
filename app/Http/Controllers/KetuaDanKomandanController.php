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

        $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
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



        return view('ketua-dan-komandan.index', [
            'title' => $title,
            'ketua_dan_komandan' => $pagination,
            'query' => $query,
        ]);
    }

}
