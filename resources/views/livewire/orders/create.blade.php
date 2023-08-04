<div class="flex items-center justify-center h-screen">
    <div class="w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form wire:submit.prevent="submitOrder">
            <div class="mb-4">

                <label for="order_ref" class="block text-gray-700 text-sm font-bold mb-2">Order Ref:</label>
                <input wire:model="order_ref" type="text" id="order_ref" placeholder="Order Ref:" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="customer_name" class="block text-gray-700 text-sm font-bold mb-2">Customer Name: </label>
                <input wire:model="customer_name" type="text" id="customer_name" placeholder="Name of customer:" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('cost') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div>
                <select wire:model="product_id" class="form-select mt-1 block w-full">
                    <option value="">Select a product</option>
                    @foreach ($productOptions as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>



                <input wire:model="quantity" type="number" class="form-input mt-1 block w-full" placeholder="Enter quantity">
            </div>


            <button wire:click="addProduct" type="button" class="mt-4 btn btn-yellow">Add Product</button>


            <button type="submit" class="mt-4 btn btn-green">Submit Order</button>
        </form>


        <br>
        @if($products)
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 border">ID</th>
                    <th class="py-2 px-4 bg-gray-200 border">Product Name</th>
                    <th class="py-2 px-4 bg-gray-200 border">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="py-2 px-4 border">{{ $product['id'] }}</td>
                    <td class="py-2 px-4 border">{{ $product['product_name'] }}</td>
                    <td class="py-2 px-4 border">{{ $product['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

</div>