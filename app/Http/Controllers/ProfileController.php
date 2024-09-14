<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View|RedirectResponse
    {
        if (auth()->user()->can('admin-profile-edit')) {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit admin profile.');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if (auth()->user()->can('admin-profile-update')) {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            if ($request->hasFile('photo')) {
                if ($request->user()->photo) {
                    Storage::delete($request->user()->photo);
                }

                $photoPath = $request->file('photo')->store('user_photos', 'public');
                $request->user()->photo = $photoPath;

            }

            $request->user()->update();
            return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to update admin profile.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (auth()->user()->can('admin-profile-delete')) {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete admin profile.');
        }
    }
}
