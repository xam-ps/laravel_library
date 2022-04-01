<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_book() {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
        ->post(route('books.store'), ['name' => 'Name1', 'author' => 'Author1']);

        $response->assertRedirect(route('books.index'));

        $response = $this->get(route('books.index'));
        $response->assertSee('Name1');
        $response->assertSee('Author1');
    }

}
