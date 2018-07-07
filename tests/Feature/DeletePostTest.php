<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function eliminar_noticia()
    {
       $this->withoutExceptionHandling();

       //Arrange
        //Crear noticia
        $noticia = factory(Post::class)->create();

        //Act
        //Borrar noticia
        $response = $this->delete('/noticias/'.$noticia->id);

        //Assertions
        //Verificar que la noticia fue borrrada
        $response->assertRedirect(route('home'));
        $this->assertEquals(0, Post::count());
        $response->assertSessionHas('success');
    }
}
