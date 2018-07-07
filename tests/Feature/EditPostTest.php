<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditPostTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function usuario_puede_ver_formulario_para_editar_noticias()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $noticia = factory(Post::class)->create([
            'title' => 'Noticia Uno',
            'body' => 'Cuerpot noticia',
            'publish_at' => '2018-06-31',
        ]);

        $response = $this->actingAs($user)->get(route('posts.edit', $noticia));

        $response->assertSuccessful();
        $this->assertTrue($response->data('noticia')->is($noticia));
        $response->assertViewIs('posts.edit');
    }

   /** @test */
   function editar_noticia()
   {
       $this->withoutExceptionHandling();

       //Arrange
       $user = factory(User::class)->create();
       $noticia = factory(Post::class)->create([
           'title' => 'Noticia Uno',
           'body' => 'Descripción de la noticia',
       ]);

       //Act
       //enviar nuevos datos editar noticias
       $response = $this->actingAs($user)->patch( route('posts.update', $noticia), [
           'title' => 'Título actualizado',
           'body' => 'Descripción actualizada',
       ]);

       //Assertions
       //verificar que la noticia se actualizó correntamente
       $post = Post::first();
       $response->assertRedirect(route('home'));
       $this->assertEquals('Título actualizado', $post->title);
       $this->assertEquals('Descripción actualizada', $post->body);
       $response->assertSessionHas('success');
   }
}
