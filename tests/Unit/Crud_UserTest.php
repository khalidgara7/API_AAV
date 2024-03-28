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
        // $user = [
        //     "name" => "ana",
        //     "email" => "ana@gmail.com",
        //     "password" => "123",
        // ];

        $user = User::factory()->make()->toArray();

        $response = $this->postJson("/api/adduser", $user);



        $response->assertStatus(200);
        // $response->assertJson([
        //     "msg" => "user added successfully !"
        // ]);
    }


    public function test_delete_user(): void
    {
        $user = User::create([
            'name' => 'ana',
            'email' => 'ana@gmail.com',
            'password' => '123',
        ]);

        $response = $this->deleteJson('/api/deleteuser/' . $user->id);

        $response->assertStatus(200);
        $this->assertEmpty(User::find($user->id));
    }

    public function test_update_user()
    {
        $user = User::create([
            'name' => 'gara',
            'email' => 'gara@gmail.com',
            'password' => 'password',
        ]);
        $response = $this->putJson('/api/updateuser/' . $user->id, [
            "name" => "gara",
            'email' => 'updated' . $user->id . '@gmail.com',
            'password' => '123',
        ]);
        $response->assertStatus(200);
        $user->refresh();
        $this->assertEquals("gara", $user->name);
    }
}
