<?php

use Illuminate\Database\Seeder;
use SPORTS\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 50)->create();

    }
}
