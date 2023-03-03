<?php

namespace App\Http\Controllers;

use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaSocialController extends Controller
{
    public function index(Request $request)
    {   
        $title = 'Media Social';
        $query = $request->query('name');

        if (auth()->user()->is_admin == 2) {
            if ($query) {
                $pagination = MediaSocial::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                    ->whereHas('pimpinan_utama', function ($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('pimpinan_kedua', function ($q) use ($query) {
                        $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                    })
                    ->where(function ($q) {
                        $q->orWhereNotNull('facebook')
                        ->orWhereNotNull('instagram')
                        ->orWhereNotNull('youtube')
                        ->orWhereNotNull('tiktok')
                        ->orWhereNotNull('website');
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            } else {
                $pagination = MediaSocial::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                    ->where(function ($q) {
                        $q->orWhereNotNull('facebook')
                        ->orWhereNotNull('instagram')
                        ->orWhereNotNull('youtube')
                        ->orWhereNotNull('tiktok')
                        ->orWhereNotNull('website');
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }
        } elseif (auth()->user()->is_admin == 1) {
            $pagination = MediaSocial::with('user', 'pimpinan_utama', 'pimpinan_kedua')
                ->where(function ($q) {
                    $q->where(function ($q) {
                        $q->whereHas('pimpinan_utama', function ($q) {
                            $q->where('id', auth()->user()->role_pimpinan_utama);
                        });
                    })->orWhere(function ($q) {
                        $q->whereNull('pimpinan_utama_id')->whereHas('pimpinan_kedua', function ($q) {
                            $q->where('pimpinan_kedua_id', auth()->user()->role_pimpinan_kedua);
                        });
                    });
                })
                ->where(function ($q) use ($query) {
                    if ($query) {
                        $q->whereHas('pimpinan_utama', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('pimpinan_kedua', function ($q) use ($query) {
                            $q->where('name_pimpinan_kedua', 'like', '%' . $query . '%');
                        });
                    }
                    $q->where(function ($q) {
                        $q->orWhereNotNull('facebook')
                            ->orWhereNotNull('instagram')
                            ->orWhereNotNull('youtube')
                            ->orWhereNotNull('tiktok')
                            ->orWhereNotNull('website');
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            abort(403);
        }

        return view('media_social.index', [
            'title' => $title,
            'media_social' => $pagination,
            'query' => $query,
        ]);
    }

}
