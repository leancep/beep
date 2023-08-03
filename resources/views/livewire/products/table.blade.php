<div class="container mx-auto">
    <table class="table-auto w-full text-center">
        <thead>
            <tr>
                <th class="px-2 py-2">#</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Cost</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="border px-2 py-2">{{ $product->id }}</td>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border px-4 py-2">${{ $product->cost }}</td>
                <td class="border px-4 py-2">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-yellow">Edit</a>
                <button wire:click="delete({{$product->id}})" type="button" class="btn btn-red">Delete</button>
                   <!-- <form action="{{ route('products.destroy', $product->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red">Delete</button>
                    </form>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($productToEdit)
        <livewire:product.edit :product="$productToEdit" />
    @endif
</div>