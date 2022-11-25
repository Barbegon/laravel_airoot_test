<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('1234')
            ]

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
