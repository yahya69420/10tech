<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class GetAllProductListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetAllProductsList(): void
    {
        $products = Product::where('available', 1)->select('id', 'name', 'price', 'image')->get();
        $response = $this->get('/getAllProductsList');
        $response->assertStatus(200);
        // Assert that the response contains the expected structure
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'price',
                'image'
            ]
        ]);
        $responseData = $response->json();
        // Assert that the response contains the expected data
        $this->assertEquals($products->toArray(), $responseData);

        // Assert that each product in the response matches the products in the database
        foreach ($responseData as $key => $product) {
            $this->assertEquals($products[$key]->id, $product['id']);
            $this->assertEquals($products[$key]->name, $product['name']);
            $this->assertEquals($products[$key]->price, $product['price']);
            $this->assertEquals($products[$key]->image, $product['image']);
        }
    }

    public function testGetAllProductsListReturnsEmptyArrayWhenNoProductsAvailable(): void
    {
        // fetch all of the products with available set to 0
        $products = Product::all();
        foreach($products as $product){
            $product->available = 0;
            $product->save();
        }
        $products = Product::where('available', 1)->get();
        // dd(count($products));
        // lets go to the endpoint to HTTP GET all of the data to this endpoint 
        $response = $this->get('/getAllProductsList');
        // did we indeed load the endpoint??????
        $response->assertStatus(200);
        // should be a json
        $response->assertJson([]);
        // dd($response->json());
        // the array should indeed be empty
        $this->assertEquals(0, count(($products)));

        $products = Product::all();
        foreach($products as $product){
            $product->available = 1;
            $product->save();
        }

    }
}
