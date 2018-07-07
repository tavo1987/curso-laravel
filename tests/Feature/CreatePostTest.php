<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function usuario_pueder_ver_el_formulario_crear_noticias()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('posts.create'));

        $response->assertSuccessful();
        $response->assertViewIs('posts.create');
    }

    /** @test */
    function usuario_puede_crear_noticias()
    {
        $this->withoutExceptionHandling();

        //Arrange - When1
        $user = factory(User::class)->create();

        //Act - Have
        $date = now()->toDateString();
        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => 'Noticia Nueva',
            'body' => 'Description Noticia',
            'publish_at' =>$date,
        ]);

        //assertions Then
        $noticia = Post::first();
        $response->assertRedirect(route('home'));
        $this->assertEquals(1, Post::count());
        $this->assertEquals('Noticia Nueva', $noticia->title);
        $this->assertEquals('Description Noticia', $noticia->body);
        $this->assertEquals($date, $noticia->publish_at->toDateString());
        $this->assertEquals($user->id, $noticia->user->id);
        $response->assertSessionHas('success');
    }

    /** @test */
    function un_usuario_invitado_no_puede_crear_una_noticia()
    {
        //Act - Have
        $date = now()->toDateString();
        $response = $this->post(route('posts.store'), [
            'title' => ' Noticia Nueva',
            'body' => 'Description Noticia',
            'publish_at' =>$date,
        ]);

        //assertions Then
        $response->assertRedirect('login');
        $this->assertEquals(0, Post::count());
    }

    /** @test */
    function el_titulo_es_requerido_para_crear_una_noticia()
    {
        //Arrange
        $user = factory(User::class)->create();

        //Act
        $date = now()->toDateString();
        $response = $this->from(route('posts.create'))->actingAs($user)->post(route('posts.store'), [
            'title' => '',
            'body' => 'Description Noticia',
            'publish_at' =>$date,
        ]);

        //assertions
        $response->assertRedirect(route('posts.create'));
        $response->assertSessionHasErrors('title');
        $this->assertEquals(0, Post::count());
    }

    /** @test */
    function el_cuerpo_de_la_notcia_es_requerido_para_crear_una_noticia()
    {
        //Arrange
        $user = factory(User::class)->create();

        //Act
        $date = now()->toDateString();
        $response = $this->from(route('posts.create'))->actingAs($user)->post(route('posts.store'), [
            'title' => 'Nueva Noticias',
            'body' => '',
            'publish_at' =>$date,
        ]);

        //assertions
        $response->assertRedirect(route('posts.create'));
        $response->assertSessionHasErrors('body');
        $this->assertEquals(0, Post::count());
    }

    /** @test */
    function fecha_publicacion_es_requerida_para_crear_una_noticia()
    {
        //Arrange
        $user = factory(User::class)->create();

        //Act
        $response = $this->from(route('posts.create'))->actingAs($user)->post(route('posts.store'), [
            'title' => 'Nueva Noticias',
            'body' => 'Cuerpo Notica',
            'publish_at' => '',
        ]);

        //assertions
        $response->assertRedirect(route('posts.create'));
        $response->assertSessionHasErrors('publish_at');
        $this->assertEquals(0, Post::count());
    }

    /** @test */
    function fecha_publicacion_debe_ser_una_fecha_valida_para_crear_una_noticia()
    {
        //Arrange
        $user = factory(User::class)->create();

        //Act
        $response = $this->from(route('posts.create'))->actingAs($user)->post(route('posts.store'), [
            'title' => 'Nueva Noticias',
            'body' => 'Cuerpo noticia',
            'publish_at' => 'invalid-date',
        ]);

        //assertions
        $response->assertRedirect(route('posts.create'));
        $response->assertSessionHasErrors('publish_at');
        $this->assertEquals(0, Post::count());
    }
}
