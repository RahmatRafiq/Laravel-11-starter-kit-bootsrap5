<?php
namespace App\Http\Controllers;

use App\Helpers\MediaLibrary;
use App\Http\Requests\ProfileUpdateRequest;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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

    public function upload(Request $request)
    {
        $request->validate([
            'profile-images.*' => 'required|file|max:2048|mimes:jpeg,jpg,png',
            'id' => 'required|integer',
        ]);

        $user = $request->user();

        return response()->json(['message' => 'Profile picture uploaded'], 200);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'profile-images' => 'array|max:3',
            ]);

            $user = $request->user();
            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            if ($request->has('profile-images')) {
                MediaLibrary::put(
                    $user,
                    'profile-images',
                    $request,
                    'profile-images'
                );
            }

            $user->save();
            DB::commit();

            return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return Redirect::route('profile.edit')->with('error', 'Failed to update profile.');
        }
    }

    public function deleteFile(Request $request)
    {
        $request->validate(['filename' => 'required|string']);

        Storage::disk('profile-images')->delete($request->filename);
        \Spatie\MediaLibrary\MediaCollections\Models\Media::where('file_name', $request->filename)->first()->delete();

        return response()->json(['message' => 'File berhasil dihapus'], 200);
    }
}
