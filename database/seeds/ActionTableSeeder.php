<?php

use Illuminate\Database\Seeder;

class ActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->truncate();

        factory(App\Action::class)->create([
        	'title' => 'Consejo de niños y niñas',
        	'description' => 'El consejo de niños y nilas es...',
        	'admin_email' => 'jeronimo.calace@gmail.com',
        	'admin_id'		=> 1,
        	'create_p'		=> 1,
        	'debate_p'		=> 1,
        	'support_p'		=> 1,
        	'opt_p'		=> 1,
        	'audit'		=> 1
        ]);
    }
}
