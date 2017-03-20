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
        DB::table('actions')->delete();

        factory(App\Action::class)->create([
        	'title'        => 'Consejo de niños y niñas',

        	'description'  => 'Constituye un dispositivo educativo para el ejercicio temprano de la ciudadanía que genera espacios en los cuales, mediante el diálogo, la interacción y el trabajo en equipo se buscan establecer acuerdos, entre los adultos y los niños, que sustenten la idea de ciudad inclusiva, generando propuestas concretas y promoviendo acciones y actitudes en pos de transformar el espacio urbano. La idea del proyecto es hacer efectiva la participación de los niños y niñas en las cuestiones que conciernen a la ciudad, atendiendo a sus necesidades y expectativas. Niños y niñas, entre 8 y 11 años, de los ocho distritos de la ciudad ejercen su derecho a opinar y a ser oídos mediante el trabajo en las escuelas y en la sesión anual en la que se encuentran con el Intendente de la ciudad para presentarle sus proyectos.',

        	'admin_email'  => 'jeronimo.calace@gmail.com',
        	'admin_id'     => 1,
        	'create_p'     => 1,
        	'debate_p'     => 1,
        	'support_p'    => 1,
        	'opt_p'        => 1,
        	'audit'        => 1
        ]);

        factory(App\Action::class, 50)->create();
    }
}
