<?php

namespace App\Policies;

use App\Models\Pnbp;
use App\Models\User;

class PnbpPolicy
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
    public function view(User $user, Pnbp $pnbp): bool
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
    public function update(User $user, Pnbp $pnbp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $pnbp->status === 'Pending';
    }

    /**
     * Determine whether the user can verify the model.
     */
    public function verify(User $user, Pnbp $pnbp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $pnbp->status === 'Pending';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pnbp $pnbp): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $pnbp->status === 'Pending';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pnbp $pnbp): bool
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pnbp $pnbp): bool
    {
        return $user->isSuperAdmin();
    }
}
