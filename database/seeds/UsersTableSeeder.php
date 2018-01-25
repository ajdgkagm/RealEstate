<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user1->roles()->attach(1);

        $user2 = User::create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user2->roles()->attach(2);

    }
}
