<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        // Create a category using the factory
        $category = Category::factory()->create([
            'Category' => 'Test Category',
        ]);

        // Assert the category exists in the database
        $this->assertDatabaseHas('t_category', [
            'Category' => 'Test Category',
        ]);

        // Assert the attribute is correctly set
        $this->assertEquals('Test Category', $category->Category);
    }

    /** @test */
    public function it_allows_mass_assignment_of_fillable_attributes()
    {
        $data = [
            'Category' => 'Mass Assignment Category',
        ];

        // Create the category using mass assignment
        $category = Category::create($data);

        // Assert the attributes are set correctly
        $this->assertEquals('Mass Assignment Category', $category->Category);

        // Assert the category exists in the database
        $this->assertDatabaseHas('t_category', [
            'Category' => 'Mass Assignment Category',
        ]);
    }
}
