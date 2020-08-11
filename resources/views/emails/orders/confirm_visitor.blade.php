@component('mail::message')

# Here is your order details:

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->products as $product)
            <tr>
                <td><img src="{{$product->image_url}}" height="50" width="50"></td>
                <td style="padding: 5px 20px;">{{$product->name}}</td>
                <td style="text-align: center">{{$product->pivot->quantity}}</td>
            <tr>
        @endforeach
    </tbody>
</table>

<br><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
