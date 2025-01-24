<?php

namespace Tests\Unit;

use App\Models\Request;
use App\Models\Song;
use App\Models\UsersLibrary\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test
     *
     *
     * ['pending', 'accepted', 'declined']
     * ['change_text', 'new_text']
     */
    public function it_can_create_a_request()
    {
        // Create a user and song to satisfy foreign key constraints
        $user = User::factory()->create(); // Create a User
        $song = Song::factory()->create(); // Create a Song

        // Request data with valid UserID and IDSong
        $requestData = [
            'IDSong' => $song->ID, // Use the ID from the created song
            'RowPr' => 5,
            'TimePr' => '2025-01-23 14:00:00',
            'ChangeType' => 'change_text',
            'UserID' => $user->id, // Use the ID from the created user
            'RowPrOld' => 3,
            'TimePrOld' => '2025-01-22 12:00:00',
            'status' => 'pending',
        ];

        // Create the Request
        $request = Request::create($requestData);

        // Assert that the Request exists in the database
        $this->assertDatabaseHas('t_request', [
            'IDSong' => $song->ID,
            'RowPr' => 5,
            'ChangeType' => 'change_text',
            'status' => 'pending',
        ]);

        // Additional assertion to verify the object property
        $this->assertEquals(5, $request->RowPr);
    }

    /** @test */
    public function it_belongs_to_a_song()
    {
        $song = Song::factory()->create();
        $request = Request::factory()->create(['IDSong' => $song->ID]);

        $this->assertInstanceOf(Song::class, $request->song);
        $this->assertEquals($song->ID, $request->song->ID);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        // Create a user using the correct User model
        $user = \App\Models\UsersLibrary\User::factory()->create();

        // Create a request associated with the user
        $request = \App\Models\Request::factory()->create(['UserID' => $user->id]);

        // Assert the relationship
        $this->assertInstanceOf(\App\Models\UsersLibrary\User::class, $request->user);
        $this->assertEquals($user->id, $request->user->id);
    }



    /** @test
     * ['pending', 'accepted', 'declined']
     *['change_text', 'new_text']
     * */
    public function it_allows_mass_assignment_for_fillable_attributes()
    {
        // Create valid User and Song to satisfy foreign key constraints
        $user = \App\Models\UsersLibrary\User::factory()->create();
        $song = \App\Models\Song::factory()->create();

        // Data with valid foreign key references
        $data = [
            'IDSong' => $song->ID, // Use the ID of the created Song
            'RowPr' => 8,
            'TimePr' => '2025-01-23 15:00:00',
            'ChangeType' => 'change_text',
            'UserID' => $user->id, // Use the ID of the created User
            'RowPrOld' => 7,
            'TimePrOld' => '2025-01-22 13:00:00',
            'status' => 'accepted',
        ];

        // Create the Request using mass assignment
        $request = \App\Models\Request::create($data);

        // Assert that the fields were correctly assigned
        $this->assertEquals($song->ID, $request->IDSong);
        $this->assertEquals(8, $request->RowPr);
        $this->assertEquals('change_text', $request->ChangeType);
        $this->assertEquals('accepted', $request->status);
    }


    /** @test */
    public function it_does_not_include_timestamps()
    {
        $request = Request::factory()->create();

        $this->assertFalse($request->timestamps);
    }
}
