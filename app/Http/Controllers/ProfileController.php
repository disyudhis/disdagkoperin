<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::find(Auth::id());
        $request->validate([
            'fullname' => 'sometimes',
            'address' => 'sometimes|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'photo' => 'sometimes|image|max:2048',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $image = substr($user->photo, 8);
            if ($user->photo) {
                Storage::delete($image);
                $path = $file->store('images');
            } else {
                $path = $file->store('images');
            }
        }
        try {
            $user->update([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'email' => $request->email,
                'photo' => $path ? '/storage/' . $path : null,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('profile.edit')->with('error', 'Maaf, profile gagal di update');
        }

        return Redirect::route('profile.edit')->with('success', 'Proflile berhasil di update');
    }

    /**
     * Delete the user's account.
     */
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
