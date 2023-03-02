<?php

namespace App\Http\Controllers;

use App\Models\InformasiOrganisasi;
use Illuminate\Http\Request;

class MasaKhidmatController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Masa Khidmat';
        $query = $request->query('name');

        $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
            ->where(function ($q) use ($query) {
                $q->where('periode', 'like', '%' . $query . '%')
                ->orWhereHas('pimpinan_utama', function($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('pimpinan_kedua', function($q) use ($query) {
                    $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                });
            })
            ->orderBy('periode', 'desc')
            ->paginate(10);



        return view('masa-khidmat.index', [
            'title' => $title,
            'masa_khidmat' => $pagination,
            'query' => $query,
        ]);
    }
}
