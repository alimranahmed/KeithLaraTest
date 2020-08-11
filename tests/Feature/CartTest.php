<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function testAddToCart()
    {
        $product = factory(Product::class)->create();
        $this->assertFalse(session()->has('cart'));
        $response = $this->post("/cart/product/{$product->id}");

        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertTrue(session()->has('cart'));
    }

    public function testGetCart()
    {
        $product = factory(Product::class)->create();
        session(['cart' => collect([$product])]);

        $response = $this->get('/cart');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($product->name);
        $response->assertSee($product->image_url);
    }

    public function testClearCart()
    {
        $product = factory(Product::class)->create();
        session(['cart' => collect([$product])]);
        $response = $this->get('/cart/clear');
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertFalse(session()->has('cart'));
    }
}
