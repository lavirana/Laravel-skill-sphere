<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_user()
    {
        $payload = [
            'name' => 'Lavi',
            'email' => 'lavi@example.com',
            'password' => 'password',
        ];

        $response = $this->postJson('/api/users', $payload);

        $response->assertStatus(201); // or 200
        $response->assertJsonFragment([
            'email' => 'lavi@example.com',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'lavi@example.com']);
    }
}

