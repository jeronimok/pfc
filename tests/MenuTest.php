<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
* 
*/
class MenuTest extends TestCase
{

	use DatabaseMigrations;

	public function testLinkAdministracion(){

		// Usuario anonimo
		$this->visit('/')->dontSee('Administrar plataforma');
		$this->visit('administracion')->see('Iniciar sesión');


		// Crear usuario general
		$user = factory(App\User::class)->create([
        	'name' => 'Jerónimo',
        	'role' => 'general',
        	'email' => 'general@gmail.com',
        	'password' =>  bcrypt('admin')
        ]);
        $this->actingAs($user)
        	->visit('/')
        	->dontSee('Administrar plataforma');
        $this->actingAs($user)
        	->get('/administracion')
        	->seeStatusCode('404');

        // Crear usuario action_admin
		$user = factory(App\User::class)->create([
        	'name' => 'Jerónimo',
        	'role' => 'action_admin',
        	'email' => 'actionadmin@gsmail.com',
        	'password' =>  bcrypt('admin')
        ]);
        $this->actingAs($user)
        	->visit('/')
        	->dontSee('Administrar plataforma');
        $this->actingAs($user)
        	->get('/administracion')
        	->seeStatusCode('404');
        	

        // Crear usuario admin
		$user = factory(App\User::class)->create([
        	'name' => 'Jerónimo',
        	'role' => 'admin',
        	'email' => 'jeronimo.calace@gmail.com',
        	'password' =>  bcrypt('admin')
        ]);
        $this->actingAs($user)
        	->visit('/')
        	->see('Administrar plataforma');

        $this->click('Administrar plataforma')
        	->seePageIs('administracion')
        	->see('Administración');
	}
}