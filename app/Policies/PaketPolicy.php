<?php
// filepath: /c:/laragon/www/hopesStudio-V1/app/Policies/PaketPolicy.php

namespace App\Policies;

use App\Models\Paket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create a Paket.
     */
    public function create(User $user)
    {
        // Define your authorization logic here
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can store a Paket.
     */
    public function store(User $user)
    {
        // Define your authorization logic here
        return $user->role === 'admin';
    }

    public function delete(User $user, Paket $paket)
{
    // Allow admins or the owner of the package to delete it
    return $user->role === 'admin' || $user->id === $paket->user_id;
}

public function update(User $user, Paket $paket)
{
    return $user->role === 'admin';
}

}
