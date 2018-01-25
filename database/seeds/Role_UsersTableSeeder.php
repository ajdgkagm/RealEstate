<?php

use App\Role_User;
use Illuminate\Database\Seeder;

class Role_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role_User::create([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
