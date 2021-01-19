<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt('123456'), 
        ]);

        $admin->attachRole('super_admin');
    }
}
