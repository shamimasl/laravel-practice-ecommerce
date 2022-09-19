<h1 class="text-center">
    Invoice
</h1>

<h4>Invoice Id: {{ $data->id }}</h4>
<h4>Total: {{ $data->total }}</h4>
<h4>Discount: {{ $data->discount }}</h4>
<h4>Sub Total: {{ $data->sub_total }}</h4>
<h1>Product Details</h1>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Date</th>

    </tr>
    @foreach ($order_details as $order)
        <tr>
            <td>{{ $order->product_name }}</td>
            <td>{{ $order->product_price }}</td>
            <td>{{ $order->product_quantity }}</td>
            <td>{{ $order->sub_total }}</td>
            <td>{{ $order->created_at->diffForHumans() }}</td>

        </tr>
    @endforeach


</table>
