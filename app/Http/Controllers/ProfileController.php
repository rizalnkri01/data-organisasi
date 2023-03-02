<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateDuaRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\InformasiOrganisasi;
use App\Models\MediaSocial;
use App\Models\PimpinanKedua;
use App\Models\PimpinanUtama;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            $user = Auth::user()->id,
            'user' => $request->user(),
            'title' => 'Profile',
            'pimpinan_utama' => PimpinanUtama::all(),
            'pimpinan_kedua' => PimpinanKedua::where('user_id', $user)->get(),
            'media_social' => MediaSocial::where('user_id', $user)->get(),
            'informasi_organisasi' => InformasiOrganisasi::where('user_id', $user)->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Hapus avatar lama jika ada
        if ($request->hasFile('image') && $request->oldImage) {
            Storage::delete('public/profile/' . $request->oldImage);
        }

        // Simpan avatar baru
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $avatarName = time() . '_' . $image->getClientOriginalName();
            $avatarPath = $image->storeAs('public/profile', $avatarName);
            $request->user()->image = $avatarName;
        }

        $request->user()->save();

        // Update Pimpinan Kedua
        $pimpinan_kedua = PimpinanKedua::where('user_id', $request->user()->id)->first();
        $pimpinan_kedua->fill($request->only('name_pimpinan_kedua'));
        $pimpinan_kedua->save();

        // Update informasi organisasi
        $informasi_organisasi = InformasiOrganisasi::where('user_id', $request->user()->id)->first();
        $informasi_organisasi->pimpinan_kedua_id = $pimpinan_kedua->id;
        $informasi_organisasi->save();

        return Redirect::route('profile.edit')->with('success', 'Data Berhasil Diubah');
    }

    public function update_2(Request $request)
    {
        $validated = $request->validate([
            'kondisi_organisasi' => ['nullable', 'string', 'max:255'],
            'no_sp' => ['nullable', 'string', 'max:255'],
            'sekretariatan' => ['nullable', 'string', 'max:255'],
            'periode' => ['nullable', 'string', 'max:255'],
            'ketua_pembina' => ['nullable', 'string', 'max:255'],
            'contact_pembina' => ['nullable', 'string', 'max:255'],
            'ketua' => ['nullable', 'string', 'max:255'],
            'contact_ketua' => ['nullable', 'string', 'max:255'],
            'komandan' => ['nullable', 'string', 'max:255'],
            'contact_komandan' => ['nullable', 'string', 'max:255'],
            'jumlah_pengurus' => ['nullable', 'string', 'max:255'],
            'total_alumni' => ['nullable', 'string', 'max:255'],
            'total_anggota' => ['nullable', 'string', 'max:255'],
            'total_anggota_lembaga' => ['nullable', 'string', 'max:255'],
            'link_sp' => ['nullable', 'string', 'max:255'],
            
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'youtube' => ['nullable', 'string', 'max:255'],
            'tiktok' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ]);
    
        // Update Pimpinan Kedua
        $media_social = MediaSocial::where('user_id', $request->user()->id)->first();
        $media_social->fill($validated);
        $media_social->save();

        // Update Informasi Organisasi
        $informasi_organisasi = InformasiOrganisasi::where('user_id', $request->user()->id)->first();
        $informasi_organisasi->fill($validated);
        $informasi_organisasi->save();

        return back()->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        
        // Hapus informasi organisasi
        InformasiOrganisasi::where('user_id', $user->id)->delete();

        // Hapus media sosial
        MediaSocial::where('user_id', $user->id)->delete();

        // Hapus pimpinan kedua
        PimpinanKedua::where('user_id', $user->id)->delete();

        // hapus gambar dari profil
        if($user->image) {
            Storage::delete($user->image);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
