<?php

namespace App\Policies;

use App\Board;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }

    public function destroy(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }
}
