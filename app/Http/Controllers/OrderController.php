<?php

namespace App\Http\Controllers;

use App\Events\OrderSubmitted;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\GeoLocation\GeoLocation;
use App\Services\GeoLocation\Location;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @var GeoLocation
     */
    private $geoLocation;

    public function __construct(GeoLocation $geoLocation)
    {
        $this->geoLocation = $geoLocation;
    }

    public function store(OrderRequest $request)
    {
        $location = $this->geoLocation->getLocation();
        if ($this->isRestrictedCountry($location)) {
            session()->forget('cart');
            return redirect()->route('home')->withError('Sorry, our service is not available in your territory');
        }

        DB::transaction(function () use ($request, $location) {
            $data = $request->all();
            $data['country_code'] = $location->getCountryCode();
            $data['city'] = $location->getCity();
            $data['zip_postal_code'] = $location->getZipCode();

            $order = Order::create($data);
            $products = session('cart');

            foreach ($products->groupBy('id') as $productId => $productGroup) {
                $order->products()->attach($productId, ['quantity' => $productGroup->count()]);
            }

            event(new OrderSubmitted($order));
            session()->forget('cart');
        });

        return redirect()->route('home')->withSuccess('Your order submitted successfully!');
    }

    protected function isRestrictedCountry(Location $location)
    {
        return $location->getCountryName() == 'Somalia';
    }
}
