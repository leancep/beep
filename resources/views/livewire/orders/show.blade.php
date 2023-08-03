<div class="container mx-auto">
    <table class="table-auto w-full text-center">
        <thead>
            <tr>
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Total Cost $</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderLines as $line)
            <tr>
                <td class="border px-4 py-2">{{ $line->product->name }}</td>
                <td class="border px-4 py-2">{{ $line->qty }}</td>
                <td class="border px-4 py-2">${{$line->product->cost * $line->qty}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
