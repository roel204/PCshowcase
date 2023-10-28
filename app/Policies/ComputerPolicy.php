<?php

namespace App\Policies;

use App\Models\Computer;
use App\Models\User;

class ComputerPolicy
{

    public function edit(User $user, Computer $computer): bool
    {
        return $user->id === $computer->user_id;
    }

    public function delete(User $user, Computer $computer): bool
    {
        return $user->id === $computer->user_id || $user->admin;
    }

}
