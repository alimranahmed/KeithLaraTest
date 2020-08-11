<?php

namespace Tests\Unit\Models;

use \App\Models\Order;
use \App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProductsRelation()
    {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();

        $order->products()->attach($product->id, ['quantity' => 5]);

        $this->assertEquals(1, $order->products->count());
        $this->assertEquals($product->name, $order->products->first()->name);
        $this->assertEquals(5, $order->products->first()->pivot->quantity);
    }
}
