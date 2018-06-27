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
   function editar_noticia()
   {
       $this->withoutExceptionHandling();

       //Arrange
       $user = factory(User::class)->create();
       $otherUser = factory(User::class)->create();
       $noticia = factory(Post::class)->create([
          'title' => 'Noticia Uno',
          'body' => 'Descripción de la noticia',
          'user_id' => $user->id,
       ]);


       //Act
       //enviar nuevos datos editar noticias
       $response = $this->patch("/noticias/{$noticia->id}", [
            'title' => 'Título actualizado',
            'body' => 'Descripción actualizada',
            'user_id' => $otherUser->id
       ]);

       //Assertions
       //verificar que la noticia se actualizó correntamente
       $post = Post::first();
       $this->assertEquals('Título actualizado', $post->title);
       $this->assertEquals('Descripción actualizada', $post->body);
       $this->assertEquals($otherUser->id, $post->user_id);

       $this->assertDatabaseHas('posts', [
          'title' => 'Título actualizado',
          'body' => 'Descripción actualizada',
          'user_id' => $otherUser->id,
       ]);

       $this->assertDatabaseMissing('posts', [
           'title' => 'Noticia Uno',
           'body' => 'Descripción de la noticia',
           'user_id' => $user->id,
       ]);

       $response->assertRedirect('/');
   }
}
