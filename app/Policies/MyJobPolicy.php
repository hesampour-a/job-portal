<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\myJob;
use App\Models\User;

class MyJobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, myJob $myJob): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employers !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, myJob $myJob): bool|Response
    {
        if ($myJob->employer->user_id !== $user->id) {
            return false;
        }
        if ($myJob->JobApplications()->count() > 0) {
            return Response::deny('cant update a job with application');
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, myJob $myJob): bool
    {
        return $myJob->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, myJob $myJob): bool
    {
        return $myJob->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, myJob $myJob): bool
    {
        return $myJob->employer->user_id === $user->id;
    }

    public function apply(User $user, myJob $myJob): bool
    {
        return !$myJob->hasUserApplied($user);
    }
}
