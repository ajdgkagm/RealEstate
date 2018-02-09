<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PropertyTableSeeder::class);
         $this->call(Role_UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
    }
}
