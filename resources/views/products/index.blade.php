<x-app>
    @forelse($products->chunk(4) as $chunk)
        <div class="row mb-4">
            @foreach($chunk as $product)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div>
                                <img src="{{$product->image_url}}" alt="{{$product->name}}" class="w-100 h-100">
                            </div>
                            <div class="p-2">{{$product->name}}</div>
                            <div class="px-2 mb-2">
                                <a href="{{route('cart.product.add', $product->id)}}"
                                   onclick="event.preventDefault(); document.getElementById('add-to-cart-{{$product->id}}').submit();"
                                   class="btn btn-sm btn-success">
                                    Add to cart
                                </a>
                                <form id="add-to-cart-{{$product->id}}"
                                      action="{{route('cart.product.add', $product->id)}}"
                                      method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-center">
            <h2 class="text-muted">No product available</h2>
        </div>
    @endforelse
</x-app>

