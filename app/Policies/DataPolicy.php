<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Data;
use App\Models\UserData;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataPolicy
{
    use HandlesAuthorization;

    public function view(User $user, UserData $data)
    {
        return $user->id === $data->user_id;
    }

    public function update(User $user, UserData $data)
    {
        return $user->id === $data->user_id;
    }

    public function delete(User $user, UserData $data)
    {
        return $user->id === $data->user_id;
    }
}


