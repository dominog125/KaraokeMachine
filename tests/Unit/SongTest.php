<?php

namespace Tests\Unit;

use App\Models\Song;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SongTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_song()
    {
        // Create a song using the factory
        $song = Song::factory()->create([
            'Title' => 'Test Song',
            'Likes' => 100,
            'Ytlink' => 'https://youtube.com/watch?v=test',
        ]);

        // Assert the song exists in the database
        $this->assertDatabaseHas('t_song', [
            'Title' => 'Test Song',
            'Likes' => 100,
            'Ytlink' => 'https://youtube.com/watch?v=test',
        ]);

        // Assert the attributes are correctly set
        $this->assertEquals('Test Song', $song->Title);
        $this->assertEquals(100, $song->Likes);
        $this->assertEquals('https://youtube.com/watch?v=test', $song->Ytlink);
    }

    /** @test */
    public function it_belongs_to_an_author()
    {
        // Create an author
        $author = Author::factory()->create();

        // Create a song associated with the author
        $song = Song::factory()->create(['Author' => $author->ID]);

        // Assert the relationship
        $this->assertInstanceOf(Author::class, $song->author);
        $this->assertEquals($author->ID, $song->author->ID);
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        // Create a category
        $category = Category::factory()->create();

        // Create a song associated with the category
        $song = Song::factory()->create(['Category' => $category->ID]);

        // Assert the relationship
        $this->assertInstanceOf(Category::class, $song->category);
        $this->assertEquals($category->ID, $song->category->ID);
    }

    /** @test */
    public function it_allows_mass_assignment_of_fillable_attributes()
    {
        $data = [
            'Title' => 'Mass Assignment Song',
            'Author' => Author::factory()->create()->ID,
            'Likes' => 500,
            'Category' => Category::factory()->create()->ID,
            'Ytlink' => 'https://youtube.com/watch?v=mass-assignment',
        ];

        // Create the song
        $song = Song::create($data);

        // Assert the attributes were mass-assigned correctly
        $this->assertEquals('Mass Assignment Song', $song->Title);
        $this->assertEquals(500, $song->Likes);
        $this->assertEquals('https://youtube.com/watch?v=mass-assignment', $song->Ytlink);
    }
}
