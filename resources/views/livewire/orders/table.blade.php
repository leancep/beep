<div class="container mx-auto">
    <table class="table-auto w-full text-center">
        <thead>
            <tr>
                <th class="px-2 py-2">#</th>
                <th class="px-4 py-2">Ref</th>
                <th class="px-4 py-2">Customer Name</th>
                <th class="px-4 py-2">Total Cost $</th>
                <th class="px-4 py-2">Total Quantity Products </th>
                <th class="px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td class="border px-2 py-2">{{ $order->id }}</td>
                <td class="border px-4 py-2">{{ $order->order_ref }}</td>
                <td class="border px-4 py-2">{{ $order->customer_name }}</td>
                <td class="border px-4 py-2">{{ $order->total() }}</td>
                <td class="border px-4 py-2">{{ $order->totalQty() }}</td>
                <td class="border px-4 py-2">{{ $order->created_at }}</td>
                <td class="border px-4 py-2">
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-blue">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
