<?php

namespace App\Http\Controllers;

use App\Helpers\MediaLibrary;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $profileImage = $user->getMedia('profile-images')->first();

        return view('admin.profile.index', [
            'user' => $user,
            'profileImage' => $profileImage,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'images' => 'array|max:3',
        ]);

        // Ambil user yang sedang login
        $user = $request->user();

        // Update informasi user dari request
        $user->fill($request->validated());

        // Gunakan helper untuk memindahkan gambar dari `temp` ke `profile-images`
        $media = MediaLibrary::put(
            $user,
            'profile-images', // Koleksi gambar untuk profile images
            $request,
            'profile-images' // Disk yang digunakan sesuai dengan konfigurasi di filesystems.php
        );

        // Jika email berubah, atur kembali verifikasi email
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Simpan user setelah update
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
