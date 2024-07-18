<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'string',
                'email:rfc',
                Rule::unique('users')->ignore($user->id)
            ],
            'username' => [
                'required',
                'string',
                'alpha_dash',
                'max:100',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);

        if ($user->username != $validated['username']) {
            $old_usernames = json_decode($user->old_usernames ?? []);

            array_push($old_usernames, $user->username);

            $user->old_usernames = json_encode(
                $old_usernames
            );

            $user->save();
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile telah diupdate!');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => bcrypt($request->password)
            ])->save();
            return redirect()
                ->route('profile')
                ->with('success', 'Password changed');
        }

        return redirect()
            ->back()
            ->with('error', 'Password does not match');
    }

    public function updateImage(Request $request)
    {
        if (!$request->hasFile('image'))
            return redirect()->back()->with('error', 'Invalid image');

        $user = auth()->user();

        $user->image = $request->file('image')->store('public/profile');

        $user->save();

        return redirect()->back()->with('success', 'Profile image updated!');
    }
}
