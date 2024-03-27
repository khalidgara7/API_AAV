<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_Add_User(): void
    {
        $user = [
            "name" => "ana",
            "email" => "ana@gmail.com",
            "password" => "123",
        ];

        // dd($user);

        $response = $this->postJson("/api/adduser", $user);

        $response->assertStatus(200);
        // $response->assertJson([
        //     "msg" => "user added successfully !"
        // ]);
    }
}
