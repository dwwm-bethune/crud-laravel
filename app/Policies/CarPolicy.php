<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;

class CarPolicy
{
    public function view(User $user, Car $car)
    {
        return $user->roles->contains('name', 'Utilisateur');
    }

    public function update(User $user, Car $car)
    {
        return $user->id === $car->user_id
            || $user->roles->contains('name', 'Administrateur');
    }

    public function delete(User $user, Car $car)
    {
        return $user->id === $car->user_id
            || $user->roles->contains('name', 'Administrateur');
    }
}
