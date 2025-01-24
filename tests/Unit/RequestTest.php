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
        $requestData = [
            'IDSong' => 1,
            'RowPr' => 5,
            'TimePr' => '2025-01-23 14:00:00',
            'ChangeType' => 'change_text',
            'UserID' => 1,
            'RowPrOld' => 3,
            'TimePrOld' => '2025-01-22 12:00:00',
            'status' => 'pending',
        ];

        $request = Request::create($requestData);

        $this->assertDatabaseHas('t_request', [
            'IDSong' => 1,
            'RowPr' => 5,
            'ChangeType' => 'change_text',
            'status' => 'pending',
        ]);

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
        $user = User::factory()->create();
        $request = Request::factory()->create(['UserID' => $user->id]);

        $this->assertInstanceOf(User::class, $request->user);
        $this->assertEquals($user->id, $request->user->id);
    }


    /** @test
     * ['pending', 'accepted', 'declined']
     *['change_text', 'new_text']
     * */
    public function it_allows_mass_assignment_for_fillable_attributes()
    {
        $data = [
            'IDSong' => 2,
            'RowPr' => 8,
            'TimePr' => '2025-01-23 15:00:00',
            'ChangeType' => 'change_text',
            'UserID' => 3,
            'RowPrOld' => 7,
            'TimePrOld' => '2025-01-22 13:00:00',
            'status' => 'accepted',
        ];

        $request = Request::create($data);

        $this->assertEquals(2, $request->IDSong);
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
