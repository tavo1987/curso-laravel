<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePostTest extends TestCase
{

    /** @test */
    function eliminarNoticia()
    {
        $this->withoutExceptionHandling();

        $noticia = Post::find(2);
        $noticia->delete();


    }
}
