<?php

namespace App\Http\Controllers;

use App\Models\InformasiOrganisasi;
use Illuminate\Http\Request;

class KondisiOrganisasiController extends Controller
{
    public function baik(Request $request)
    {
        $title = 'Kondisi Organisasi Baik';
        $query = $request->query('name');

        if ($query) {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) use ($query) {
                    $q->where('kondisi_organisasi', 'Baik')
                        ->whereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_kedua', function ($q) use ($query) {
                            $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                        });
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        } else {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) {
                    $q->where('kondisi_organisasi', 'Baik');
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        }

        return view('kondisi-organisasi.baik', [
            'title' => $title,
            'kondisi_organisasi' => $pagination,
            'query' => $query,
        ]);
    }

    public function kurang_baik(Request $request)
    {
        $title = 'Kondisi Organisasi Kurang Baik';
        $query = $request->query('name');

        if ($query) {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) use ($query) {
                    $q->where('kondisi_organisasi', 'Kurang Baik')
                        ->whereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_kedua', function ($q) use ($query) {
                            $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                        });
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        } else {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) {
                    $q->where('kondisi_organisasi', 'Kurang Baik');
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        }

        return view('kondisi-organisasi.kurang-baik', [
            'title' => $title,
            'kondisi_organisasi' => $pagination,
            'query' => $query,
        ]);
    }

    public function tidak_baik(Request $request)
    {
        $title = 'Kondisi Organisasi Tidak Baik';
        $query = $request->query('name');

        if ($query) {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) use ($query) {
                    $q->where('kondisi_organisasi', 'Tidak Baik')
                        ->whereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_kedua', function ($q) use ($query) {
                            $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                        });
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        } else {
            $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) {
                    $q->where('kondisi_organisasi', 'Tidak Baik');
                })
                ->orderBy('kondisi_organisasi', 'desc')
                ->paginate(10);
        }

        return view('kondisi-organisasi.baik', [
            'title' => $title,
            'kondisi_organisasi' => $pagination,
            'query' => $query,
        ]);
    }
}
