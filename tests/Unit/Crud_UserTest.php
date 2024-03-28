<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class Crud_UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */

     use RefreshDatabase;
    public function test_Adduser(): void
    {
        $user = [
            "name" => "ana",
            "email" => "ana@gmail.com",
            "password" => "123",
        ];


        $response = $this->postJson("/api/adduser", User::factory()->create()->toArray());

        // dd(User::factory()->create()->toArray());

        $response->assertStatus(200);
        $response->assertJson([
            "msg" => "user added successfully !"
        ]);
    }
}
