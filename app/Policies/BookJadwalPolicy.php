<?php

namespace App\Policies;

use App\Models\BookJadwal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookJadwalPolicy
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
    public function view(User $user, BookJadwal $bookJadwal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can store a newly created model.
     */
    public function store(User $user): Response
    {
        return $user->role === 'user'
            ? Response::allow()
            : Response::deny('You must be a user to book a schedule.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BookJadwal $bookJadwal): bool
    {
        return $user->role === 'user'
            ? Response::allow()
            : Response::deny('You must be a user to book a schedule.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BookJadwal $bookJadwal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BookJadwal $bookJadwal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BookJadwal $bookJadwal): bool
    {
        return false;
    }
}
