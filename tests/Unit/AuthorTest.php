<?php

namespace Tests\Unit;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_author()
    {
        // Create an author using the factory
        $author = Author::factory()->create([
            'Author' => 'Test Author',
        ]);

        // Assert the author exists in the database
        $this->assertDatabaseHas('t_author', [
            'Author' => 'Test Author',
        ]);

        // Assert the attribute is correctly set
        $this->assertEquals('Test Author', $author->Author);
    }

    /** @test */
    public function it_allows_mass_assignment_of_fillable_attributes()
    {
        $data = [
            'Author' => 'Mass Assignment Author',
        ];

        // Create the author using mass assignment
        $author = Author::create($data);

        // Assert the attributes are set correctly
        $this->assertEquals('Mass Assignment Author', $author->Author);

        // Assert the author exists in the database
        $this->assertDatabaseHas('t_author', [
            'Author' => 'Mass Assignment Author',
        ]);
    }
}
