<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComentarPropuestaTest extends TestCase
{
    use DatabaseTransactions;

	public function testComentarPropuesta(){

		$user = $this->createUser('general');

		$this->actingAs($user)
			->visit('propuesta/1')
			->see('Puestos saludables en parques')
			->type('Un comentario','comment')
			->press('Publicar comentario');

		$this->seeInDatabase('comments', [
			'comment'		=> 'Un comentario',
			'user_id'		=> $user->id,
			'proposal_id'	=> 1
			]);

		$this->seePageIs('propuesta/1');

	}
}
