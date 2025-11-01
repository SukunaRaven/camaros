<?php

namespace App\Policies;

use App\Models\Camaro;
use App\Models\User;

class CamaroPolicy
{
    //Controls if user can edit Camaro
    public function update(User $user, Camaro $camaro): bool
    {
        //only uploader or admin can
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    //Controls if user can public or private a Camaro
    public function toggleStatus(User $user, Camaro $camaro): bool
    {
        //Only uploader or admin can
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    //Controls if user can delete Camaro
    public function delete(User $user, Camaro $camaro): bool
    {
        //Only uploader or admin can
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }
}
