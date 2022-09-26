<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::factory()->create(['name' => 'Administrateur']);
        $roleUser = Role::factory()->create(['name' => 'Utilisateur']);

        $user = User::factory()->create([
            'name' => 'Fiorella',
            'email' => 'fiorella@boxydev.com',
            'is_admin' => true,
        ]);
        $user->roles()->attach([$roleAdmin->id, $roleUser->id]);

        $user = User::factory()->create([
            'name' => 'Matthieu',
            'email' => 'matthieu@boxydev.com',
        ]);
        $user->roles()->attach($roleUser);

        Car::factory()->create([
            'brand' => 'BMW', 'model' => 'M4', 'slug' => 'bmw-m4',
            'content' => '# Titre
- Item 1
- Item 2
- Item 3',
            'image' => 'cars/bmw.jpg', 'state' => true,
        ]);

        Car::factory()->create([
            'brand' => 'Porsche', 'model' => '911 Turbo S', 'slug' => 'porsche-911-turbo-s', 'image' => 'cars/porsche.jpg', 'state' => true,
        ]);

        Car::factory()->create([
            'brand' => 'Ferrari', 'model' => 'Modena', 'slug' => 'ferrari-modena', 'image' => 'cars/ferrari.jpg', 'state' => true,
            'user_id' => $user,
        ]);
    }
}
