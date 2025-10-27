<?php

namespace App\Policies;

use App\Models\Camaro;
use App\Models\User;

class CamaroPolicy
{
    public function update(User $user, Camaro $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    public function toggleStatus(User $user, Camaro $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    public function delete(User $user, Camaro $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }
}
