<?php

namespace Tests\Unit;

use App\Models\UsersLibrary\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
            'name' => 'John Doe',
        ]);
    }

    /** @test */
    public function it_has_hidden_attributes()
    {
        $user = User::factory()->create([
            'password' => 'secret',
        ]);

        $this->assertArrayNotHasKey('password', $user->toArray());
        $this->assertArrayNotHasKey('remember_token', $user->toArray());
    }

    /** @test */
    public function it_casts_email_verified_at_to_datetime()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $user->email_verified_at);
    }

    /** @test */
    public function it_allows_mass_assignment_for_fillable_attributes()
    {
        $data = [
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('secret'),
            'facebook_id' => '1234567890',
            'is_banned' => false,
            'is_admin' => true,
        ];

        $user = User::create($data);

        $this->assertEquals('Jane Doe', $user->name);
        $this->assertEquals('janedoe@example.com', $user->email);
        $this->assertEquals('1234567890', $user->facebook_id);
        $this->assertFalse($user->is_banned);
        $this->assertTrue($user->is_admin);
    }
}
