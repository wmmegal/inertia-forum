<?php

namespace App\Policies;

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
{
    use HandlesAuthorization;

    public function reply(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Discussion $discussion): bool
    {
        return $user->id === $discussion->user_id;
    }

    public function solve(User $user, Discussion $discussion): bool
    {
        return $user->id === $discussion->user_id;
    }
}
