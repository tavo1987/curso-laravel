<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewPostListsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   function ver_listado_de_noticias()
   {
       $this->withoutExceptionHandling();

       $noticias = factory(Post::class)->times(10)->create();

       $response = $this->get('/');

       $response->assertSuccessful();
       $noticias->assertEquals($response->data('noticias'));
   }
}
