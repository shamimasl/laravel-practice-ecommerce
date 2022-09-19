<h1>
    Your Orders
</h1>

<table class="table table-bordered">
    <tr>
        <th>Order Id</th>
        <th>Total</th>
        <th>Discount</th>
        <th>SubTotal</th>
        <th>Action</th>
    </tr>
    @foreach ($orders_by_user as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->discount }}</td>
            <td>{{ $order->sub_total }}</td>
            <td>
                <a href="{{ url('download/invoice') }}/{{ $order->id }}" class="btn btn-info" target="_blank">
                    Download Invoice
                </a>
                <a href="{{ url('send/invoice') }}/{{ $order->id }}" class="btn btn-info">
                    Send Invoice Via Email
                </a>
            </td>
        </tr>
    @endforeach


</table>
