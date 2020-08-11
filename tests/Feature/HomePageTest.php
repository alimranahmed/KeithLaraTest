<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Http\Response;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function testSuccessfulLoad()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testHaveAllProduct()
    {
        $product = factory(Product::class)->create();
        $response = $this->get('/');
        $response->assertSee($product->name);
        $response->assertSee($product->image_url);
    }
}
