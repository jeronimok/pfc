<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();

        factory(App\User::class)->create([
        	'name' => 'Jerónimo',
        	'role' => 'admin',
        	'email' => 'jeronimo.calace@gmail.com',
        	'password' =>  bcrypt('admin')
        ]);

        factory(App\User::class, 49)->create();
    }
}
