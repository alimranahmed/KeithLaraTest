<?php

namespace Tests\Feature;

use App\Mail\Order\ConfirmVisitorEmail;
use App\Mail\Order\NotifyWarehouseEmail;
use App\Models\Order;
use App\Models\Product;
use App\Services\GeoLocation\FakeGeoLocation;
use App\Services\GeoLocation\GeoLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function testPlaceOrder()
    {
        Mail::fake();
        app()->bind(GeoLocation::class, FakeGeoLocation::class);

        $product = factory(Product::class)->create();
        session(['cart' => collect([$product])]);

        $requestData = [
            'email' => 'imran@gmail.com',
            'shipping_address_1' => 'Aliya Madrash Road',
            'shipping_address_2' => 'West Medda',
            'shipping_address_3' => 'Nowapara',
        ];

        $response = $this->post('/order', $requestData);

        $response->assertRedirect('/');

        $this->assertFalse(session()->has('cart'));
        $order = Order::where('email', 'imran@gmail.com')->first();
        $this->assertNotNull($order);
        $this->assertEquals(1, $order->products->first()->pivot->quantity);

        Mail::assertQueued(NotifyWarehouseEmail::class);
        Mail::assertQueued(ConfirmVisitorEmail::class);
    }
}
