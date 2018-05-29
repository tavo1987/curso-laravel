<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function it_loads_users_list_page()
    {
    	$this->withoutExceptionHandling();

        $response = $this->get('/users');

	    $response->assertStatus(200)
	             ->assertSee('Lista de Usuarios')
		        ->assertSee('John')
		        ->assertSee('Jane');

    }

	/** @test */
	function it_loads_users_details_page()
	{
		$response = $this->get('/users/5');

		$response->assertStatus(200)
		         ->assertSee('Detalle de usuario 5');
	}

	/** @test */
	function it_loads_new_users_page() {
		$response = $this->get( '/users/create' );

		$response->assertStatus( 200 )
		         ->assertSee( 'Crear Usuario' );
	}
}
