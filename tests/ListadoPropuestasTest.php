<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListadoPropuestasTest extends TestCase
{
    use DatabaseTransactions;

    public function testListadoPropuestas()
    {
        $general = $this->createUser('general');

        $this->actingAs($general)
        	->visit('accion-participativa/1')
        	->see('Propuestas')
        	->see('Puestos saludables en parques')
        	->dontSee('Más luces en las calles');
    }
}
