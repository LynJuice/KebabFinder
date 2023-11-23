<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // check if the user has admin role if so delete the user   

        $actingUser = Auth::user();
        if ($actingUser->hasRole('svetaines administratorius')) {
            $user = User::find($request->user);

            DB::delete('DELETE FROM diner_reviews WHERE user_id = ?', [$user->id]);

            DB::delete('DELETE FROM reviews WHERE user_id = ?', [$user->id]);

            
            foreach ($user->diners as $diner) {
                
                DB::delete('DELETE FROM diner_reviews WHERE diner_id = ?', [$diner->id]);
                
                DB::delete('DELETE FROM kebab_products WHERE diner_id = ?', [$diner->id]);
            }
            
            foreach ($user->products as $product) {
                DB::delete('DELETE FROM reviews WHERE product_id = ?', [$product->id]);

                $product->delete();
            }

            foreach ($user->diners as $diner) {
                $diner->delete();
            }
            // delete user
            $user->delete();
            return Redirect::to('/users');
        }

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

    public function index()
    {
        $users = User::all();
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
}
