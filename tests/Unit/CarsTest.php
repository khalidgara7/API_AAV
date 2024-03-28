<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\voiture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
     use RefreshDatabase;
    // testing cars

    public function test_estimate_price()
    {
       

        // Create instances of Voiture and persist them to the database
        voiture::create([
            'marque' => 'Toyota',
            'modele' => 'Corolla',
            'annee' => 2020,
            'prix' => 20000,
        ]);

        Voiture::create([
            'marque' => 'Toyota',
            'modele' => 'Corolla',
            'annee' => 2020,
            'prix' => 22000,
        ]);

        // Make the request with valid data including the "modele" field
        $request = [
            'marque' => 'Toyota',
            'modele' => 'Corolla', // Corrected field name
            'annee' => 2020,
        ];

        $response = $this->postJson('/api/estimationprice', $request);

        // Assert that the response status is 200
        // $response->assertStatus(200);

        // Assert that the estimated price in the response matches the expected value
        $content = $response->json();
        $this->assertArrayHasKey('estimatedPrice', $content);
        $this->assertEquals(21000, $content['estimatedPrice']);
    }

    public function test_show_cars(): void
    {
        $voiture = Voiture::create([
            'marque' => 'marque',
            'modele' => 'modele',
            'annee' => 2023,
            'kilometrage' => 10000,
            'prix' => 20000,
            'puissance' => 150,
            'motorisation' => 'Essence',
            'carburant' => 'Essence',
            'options' => 'options',
        ]);

        $response = $this->getJson('/api/cars');
        $response->assertStatus(200);
        $cars=Voiture::all();
        $this->assertNotEmpty($cars);
    }
}
