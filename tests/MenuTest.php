<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
* 
*/
class MenuTest extends TestCase
{

	use DatabaseTransactions;

	public function testLinkAdministracion(){

		// Usuario anonimo
		$this->visit('/')->dontSee('Administrar plataforma');
		$this->visit('administracion')->see('Iniciar sesión');

		// Usuario general
		$user = $this->createUser('general');
                $this->actingAs($user)
                	->visit('/')
                	->dontSee('Administrar plataforma');
                $this->actingAs($user)
                	->get('/administracion')
                	->seeStatusCode('404');

                // Usuario action_admin
        	$user = $this->createUser('action_admin');
                $this->actingAs($user)
                	->visit('/')
                	->dontSee('Administrar plataforma');
                $this->actingAs($user)
                	->get('/administracion')
                	->seeStatusCode('404');
                	
                // Usuario admin
        	$user = $this->createUser('admin');
                $this->actingAs($user)
                	->visit('/')
                	->see('Administrar plataforma');

                $this->actingAs($user)
                        ->click('Administrar plataforma')
                	->seePageIs('administracion')
                	->see('Administración');
        }
}