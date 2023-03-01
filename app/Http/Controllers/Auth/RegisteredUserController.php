<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\InformasiOrganisasi;
use App\Models\MediaSocial;
use App\Models\PimpinanKedua;
use App\Models\PimpinanUtama;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'pimpinan_utama' => PimpinanUtama::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'contact' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'pimpinan_utama_id' => ['required', 'integer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        $pimpinan_kedua = PimpinanKedua::create([
            'user_id' => $user->id,
            'pimpinan_utama_id' => $request->pimpinan_utama_id,
        ]);
        $pimpinan_kedua->user()->associate($user);

        $media_social = MediaSocial::create([
            'user_id' => $user->id,
        ]);
        $media_social->user()->associate($user);

        $informasi_organisasi = InformasiOrganisasi::create([
            'user_id' => $user->id,
        ]);
        $informasi_organisasi->user()->associate($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
