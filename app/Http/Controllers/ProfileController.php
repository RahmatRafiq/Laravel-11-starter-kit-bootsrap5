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
    public function edit(Request $request): View
    {
        $user = Auth::user();
        $profileImage = $user->getMedia('profile-images')->first();

        return view('admin.profile.index', [
            'user' => $user,
            'profileImage' => $profileImage,
        ]);
    }

    // Menghandle file upload
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $user = Auth::user();

        // Generate path unik untuk setiap user
        $name = Str::orderedUuid() . '_' . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('profile-images/' . $user->id . '/media', $name, 'profile-images');

        return response()->json([
            'path' => $path,
            'url' => Storage::disk('profile-images')->url($path),
        ]);
    }

    // Menghapus media profil
    public function deleteFile(Request $request)
    {
        $request->validate(['filename' => 'required|string']);

        // Hapus file dari disk dan database Spatie Media
        Storage::disk('profile-images')->delete($request->filename);
        \Spatie\MediaLibrary\MediaCollections\Models\Media::where('file_name', $request->filename)->first()->delete();

        return response()->json(['message' => 'File berhasil dihapus'], 200);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate(['images' => 'array|max:3']);
        $user = $request->user();
        $user->fill($request->validated());

        foreach ($request->input('images') as $filePath) {
            $user->addMediaFromDisk($filePath, 'profile-images')->toMediaCollection('profile-images');
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
