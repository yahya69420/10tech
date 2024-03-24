<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;

class GetShopTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_shop_page_returns_200_and_expected_content(): void
    {
        // Arrange
        $categories = Category::all();
        // dd($product[12]->id);
        // Act
        $response = $this->get('/shop');
        // fetches all of the contents of the response
        $content = $response->content();
        // Assert
        $response->assertStatus(200);
        // test for the header actually existsi
        $this->assertStringContainsString('class="header"', $content);
        // test for the header of hte home page
        $this->assertStringContainsString('TenTech', $content);
        // test for a sample of the text on the home page
        $response->assertSee('Our Products');

        // assert the view has the categories
        $response->assertSee('Laptop');
        $response->assertSee('Tablet');
        $response->assertSee('Console');

        // test for the footer actually exists i
        $this->assertStringContainsString('class="bottom"', $content);

        // test the href links
        // tes the href link for the lapto
        foreach ($categories as $category) {
            $response->assertSee($category->name);
            // dd($category->name);
            // test the image
            // $image = $category->image;
            // dd($image);
            $response->assertSee($category->image);
        }
    }



    // test for the 404 error when the shop url is wrong
    public function test_wrong_shop_url_returns_404(): void
    {
        // Arrange
        $response = $this->get('/shoop');
        // Act

        // Assert
        $response->assertStatus(404);
    }
}
