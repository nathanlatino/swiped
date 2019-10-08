<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Swipe;

class SwipeTest extends TestCase
{

    //['user_id', 'distance']
    public function testsSwipeAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'user_id' => 1,
            'distance' => 5,
        ];

        $this->json('POST', '/api/swipe', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'user_id' => 1, 'distance' => 5]);
    }

    public function testsSwipeAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $swipe = factory(Swipe::class)->create([
            'user_id' => 1,
            'distance' => 5,
        ]);

        $payload = [
            'user_id' => 1,
            'distance' => 10,
        ];

        $response = $this->json('PUT', '/api/swipe/' . $swipe->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'user_id' => 1,
                'distance' => 10,
            ]);
    }

    public function testsSwipeAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $swipe = factory(Swipe::class)->create([
            'user_id' => 1,
            'distance' => 5,
        ]);

        $this->json('DELETE', '/api/swipe/' . $swipe->id, [], $headers)
            ->assertStatus(204);
    }

    public function testSwipeAreListedCorrectly()
    {
        factory(Swipe::class)->create([
            'user_id' => 1,
            'distance' => 5,
        ]);

        factory(Swipe::class)->create([
            'user_id' => 1,
            'distance' => 15,
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/swipe', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                ['user_id' => 1, 'distance' => 5],
                ['user_id' => 1, 'distance' => 15]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'body', 'title', 'created_at', 'updated_at'],
            ]);
    }
}
