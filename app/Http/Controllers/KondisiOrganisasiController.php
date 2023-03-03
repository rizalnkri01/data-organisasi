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

        if (auth()->user()->is_admin == 2) {
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
        } elseif (auth()->user()->is_admin == 1) {
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            } else {
                $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                    ->where(function ($q) {
                        $q->where('kondisi_organisasi', 'Baik');
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            }
        } else {
            abort(403);
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

        if (auth()->user()->is_admin == 2) {
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
        } elseif (auth()->user()->is_admin == 1) {
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            } else {
                $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                    ->where(function ($q) {
                        $q->where('kondisi_organisasi', 'Kurang Baik');
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            }
        } else {
            abort(403);
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

        if (auth()->user()->is_admin == 2) {
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
        } elseif (auth()->user()->is_admin == 1) {
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            } else {
                $pagination = InformasiOrganisasi::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                    ->where(function ($q) {
                        $q->where('kondisi_organisasi', 'Tidak Baik');
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
                    ->orderBy('kondisi_organisasi', 'desc')
                    ->paginate(10);
            }
        } else {
            abort(403);
        }

        return view('kondisi-organisasi.baik', [
            'title' => $title,
            'kondisi_organisasi' => $pagination,
            'query' => $query,
        ]);
    }
}
