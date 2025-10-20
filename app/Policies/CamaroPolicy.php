<?php

namespace App\Policies;

use App\Models\Camaros;
use App\Models\User;

class CamaroPolicy
{
    public function update(User $user, Camaros $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    public function toggleStatus(User $user, Camaros $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }

    public function delete(User $user, Camaros $camaro): bool
    {
        return $user->isAdmin() || $camaro->uploader_id === $user->id;
    }
}
