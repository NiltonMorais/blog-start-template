<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 1)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('secret')
        ]);

    }
}
