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

        if ($query) {
            $pagination = MediaSocial::with('user')
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->where(function ($q) {
                    $q->whereNotNull('facebook')
                    ->orWhereNotNull('instagram')
                    ->orWhereNotNull('youtube')
                    ->orWhereNotNull('tiktok')
                    ->orWhereNotNull('website');
                })
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $pagination = MediaSocial::with('user')
                ->where(function ($q) {
                    $q->whereNotNull('facebook')
                    ->orWhereNotNull('instagram');
                })
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

        return view('media_social.index', [
            'title' => $title,
            'media_social' => $pagination,
            'query' => $query,
        ]);
    }

}
