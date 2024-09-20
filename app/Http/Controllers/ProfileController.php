<?php

namespace App\Http\Controllers;

use App\Helpers\MediaLibrary;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Menampilkan form edit profile
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $profileImage = $user->getMedia('profile-images')->first();

        return view('admin.profile.index', [
            'user' => $user,
            'profileImage' => $profileImage,
        ]);
    }

    // Menghandle file upload menggunakan Dropzone
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048', // Validasi ukuran file maksimal
        ]);

        // Rename file dengan UUID untuk menghindari konflik nama file
        $name = Str::orderedUuid() . '_' . $request->file('file')->getClientOriginalName();

        // Simpan file langsung ke disk `profile-images`
        $path = $request->file('file')->storeAs('', $name, 'profile-images');

        // Kembalikan path file dan URL-nya ke Dropzone
        return response()->json([
            'path' => $path, // Path yang akan disimpan di hidden input
            'url' => Storage::disk('profile-images')->url($path), // URL untuk menampilkan gambar
        ]);
    }

    // Update profile user
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'images' => 'array|max:3', // Validasi input images array
        ]);

        // Ambil user yang sedang login
        $user = $request->user();

        // Update informasi user dari request
        $user->fill($request->validated());

        // Gunakan MediaLibrary untuk mengaitkan gambar yang di-upload ke media collection user
        foreach ($request->input('images') as $filePath) {
            // Menambahkan gambar dari disk `profile-images` ke media collection `profile-images`
            $user->addMediaFromDisk($filePath, 'profile-images')->toMediaCollection('profile-images');
        }

        // Jika email berubah, reset email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Simpan perubahan pada user
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // Menghandle penghapusan user (optional method)
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
