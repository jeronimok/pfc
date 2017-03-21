<?php

use Illuminate\Database\Seeder;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposals')->delete();

        factory(App\Proposal::class)->create([
        	'title' => 'Puestos saludables en parques',
        	'content' => 'Propongo construir puestos saludables en los parques de la ciudad. Donde se pueda hacer ejercicios y tomar agua.',
        	'action_id' => 1,
        	'creator_id' => 1
        ]);

        factory(App\Proposal::class)->create([
        	'title' => 'Más luces en las calles',
        	'content' => 'Propongo poner más luces en las calles de la ciudad. Esto puede traer más seguridad y evitar accidentes.',
        	'action_id' => 2,
        	'creator_id' => 2
        ]);

        factory(App\Proposal::class, 8)->create();
    }
}
