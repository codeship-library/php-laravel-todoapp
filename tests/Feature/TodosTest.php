<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class TodosTest extends TestCase
{

    private static $currentTodo;

    /** @test */
    public function it_gets_all_todos()
    {
        factory(\App\Todo::class, 5)->create();
        $response = $this->get('/', ['Origin' => "Testing"]);
        $response
          ->assertStatus(200)
          ->assertHeader('access-control-allow-origin', '*');
        $this->assertEquals(count( $response->getOriginalContent() ), 5);
    }

    /** @test */
    public function it_creates_new_todo()
    {
        $response = $this->post('/', ['title' => 'Do something new!']);

        self::$currentTodo = $response->getOriginalContent();

        $response
          ->assertStatus(200)
          ->assertJson(['title' => 'Do something new!', 'completed' => false, 'order' => 0]);
    }

    /** @test */
    public function it_gets_one_todo()
    {

        $response = $this->get('/'.self::$currentTodo['id']);

        $response
          ->assertStatus(200)
          ->assertJson(['title' => 'Do something new!', 'completed' => false, 'order' => 0]);
    }

    /** @test */
    public function it_updates_todos()
    {
        $response = $this->patch('/'.self::$currentTodo['id'], ['title' => 'Do something else!', 'completed' => true, 'order' => 100] );
        $response
          ->assertStatus(200)
          ->assertJson(['title' => 'Do something else!', 'completed' => true, 'order' => 100]);
    }

    /** @test */
    public function it_deletes_one_todo()
    {
        $response = $this->delete('/'.self::$currentTodo['id']);
        $response->assertStatus(204);

        $response = $this->get('/'.self::$currentTodo['id']);
        $response
          ->assertStatus(404);
    }

    /** @test */
    public function it_clears_all_todos()
    {
        $response = $this->delete('/');
        $response->assertStatus(204);

        $response = $this->get('/');
        $response
          ->assertStatus(200);
        $this->assertEquals(count( $response->getOriginalContent() ), 0);
    }
}
