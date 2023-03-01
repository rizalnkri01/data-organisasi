<?php

namespace App\Http\Controllers;

use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaSocialController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'facebook' => ['required', 'string', 'max:255'],
            'instagram' => ['required', 'string', 'max:255'],
            'youtube' => ['required', 'string', 'max:255'],
            'tiktok' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        // Mengambil data pimpinan kedua yang terkait dengan user yang sedang login
        $media_social = MediaSocial::where('user_id', $user->id)->first();

        $media_social->fill([
            'facebook' => $validated['facebook'],
            'instagram' => $validated['instagram'],
            'youtube' => $validated['youtube'],
            'tiktok' => $validated['tiktok'],
            'website' => $validated['website'],
        ]);
    
        // Simpan perubahan ke database
        $media_social->save();

        return back()->with('success', 'Data Berhasil Diubah');
    }
}
