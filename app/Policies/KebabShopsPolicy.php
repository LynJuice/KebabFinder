<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\KebabShops;
use App\Models\User;

class KebabShopsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KebabShops $kebabShops): bool
    {
        return $user->can('manage kebab') && ($user->hasRole('svetaines administratorius') || $user->id == $kebabShops->user_id);
    }
    // $kebadmin->givePermissionTo('manage kebab');
    // $kebadmin->givePermissionTo('add kebab');
    // $kebadmin->givePermissionTo('delete kebab');
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('add kebab');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KebabShops $kebabShops): bool
    {
        return $user->can('manage kebab') && ($user->hasRole('svetaines administratorius') || $user->id == $kebabShops->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KebabShops $kebabShops): bool
    {
        // dd($user->can('delete kebab') && ($user->hasRole('svetaines administratorius') || $user->id == $kebabShops->user_id));
        return $user->can('delete kebab') && ($user->hasRole('svetaines administratorius') || $user->id == $kebabShops->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KebabShops $kebabShops): bool
    {
        return $this->delete($user, $kebabShops);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KebabShops $kebabShops): bool
    {
        return $this->delete($user, $kebabShops);
    }
}
