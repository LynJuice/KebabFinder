<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Kebab_Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KebabProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kebab_Product $kebabProduct): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $user = User::with("roles")->find(Auth::user()->id);
        if ($user->hasRole('svetaines administratorius')) {
            return true;
        } else if ($user->hasRole('kebabines administratorius')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kebab_Product $kebabProduct): bool
    {
        $user = User::with("roles")->find(Auth::user()->id);
        if ($user->hasRole('svetaines administratorius')) {
            return true;
        } else if ($user->hasRole('kebabines administratorius') && $kebabProduct->kebabShops->user_id == Auth::user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kebab_Product $kebabProduct): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kebab_Product $kebabProduct): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kebab_Product $kebabProduct): bool
    {
        //
    }
}
