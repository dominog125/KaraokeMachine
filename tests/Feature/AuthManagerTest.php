<?php


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\UsersLibrary\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

    /** @test */
    public function it_displays_the_registration_page()
    {
        $response = $this->get('/registration');

        $response->assertStatus(200);
        $response->assertViewIs('registration');
    }

    /** @test */
    public function it_registers_a_new_user()
    {
        $response = $this->post('/registration', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'Password@123',
            'password_confirmation' => 'Password@123',
        ]);

        $response->assertRedirect(route('home', ['name' => 'Test User']));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    /** @test */
    public function it_prevents_registration_with_invalid_data()
    {
        $response = $this->post('/registration', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
        ]);

        $response->assertSessionHas('error', 'Failed to register the user.');
    }

    /** @test */
    public function it_allows_valid_login()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Password@123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'Password@123',
        ]);

        $response->assertRedirect(route('home', ['name' => 'Test User']));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_rejects_login_for_banned_users()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('Password@123'),
            'is_banned' => true,
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'Password@123',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Your account is banned.');
    }



    /** @test */
    public function it_logs_out_the_user()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Zostałeś wylogowany.');
        $this->assertGuest();
    }
}
