<?php

namespace App\Policies;

use App\Models\computer;
use App\Models\User;

class ComputerPolicy
{

    public function edit(User $user, computer $computer)
    {
        return $user->id === $computer->user_id;
    }

    public function delete(User $user, computer $computer)
    {
        return $user->id === $computer->user_id || $user->admin;
    }

}
