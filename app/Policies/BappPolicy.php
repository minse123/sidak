<?php

namespace App\Policies;

use App\Models\Bapp;
use App\Models\User;

class BappPolicy
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
    public function view(User $user, Bapp $bapp): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bapp $bapp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $bapp->status === 'Pending';
    }

    public function verify(User $user, Bapp $bapp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $bapp->status === 'Pending';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bapp $bapp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $bapp->status === 'Pending';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bapp $bapp): bool
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bapp $bapp): bool
    {
        return $user->isSuperAdmin();
    }
}
