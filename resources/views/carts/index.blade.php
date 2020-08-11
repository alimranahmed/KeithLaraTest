<x-app>
    <div class="mb-3">
        <strong class="mx-3">Total {{$products->count()}} item(s)</strong>
        <a href="{{route('cart.clear')}}" class="btn btn-sm btn-outline-danger">&times; Clear Cart</a>
    </div>
    <div class="row">
        <div class="col-6">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <img src="{{$product->image_url}}" class="" alt="{{$product->name}}"
                                 style="height: 50px; width: 50px">
                        </td>
                        <td>{{$product->name}}</td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <form action="{{route('order.store')}}" method="post">
                @csrf
                <input type="email" class="form-control my-3" name="email" value="{{old('email')}}"
                       placeholder="Email*">
                <div class="text-sm italic text-danger">{{$errors->first('email')}}</div>

                <h3 class="mt-3">Shipping Address</h3>

                <input type="text" class="form-control mt-3" name="shipping_address_1"
                       value="{{old('shipping_address_1')}}" placeholder="Address Line 1">
                <div class="text-sm italic text-danger">{{$errors->first('shipping_address_1')}}</div>

                <input type="text" class="form-control mt-3" name="shipping_address_2"
                       value="{{old('shipping_address_2')}}" placeholder="AddressLine 2">
                <div class="text-sm italic text-danger">{{$errors->first('shipping_address_2')}}</div>

                <input type="text" class="form-control my-3" name="shipping_address_3"
                       value="{{old('shipping_address_3')}}" placeholder="Address Line 3">
                <div class="text-sm italic text-danger">{{$errors->first('shipping_address_3')}}</div>

                <button class="btn btn-success">Place Order</button>
            </form>
        </div>
    </div>
</x-app>
