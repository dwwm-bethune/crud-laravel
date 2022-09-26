<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;

class CarPolicy
{
    public function update(User $user, Car $car)
    {
        return $user->id === $car->user_id || $user->is_admin;
    }

    public function delete(User $user, Car $car)
    {
        return $user->id === $car->user_id || $user->is_admin;
    }
}
