<div class="flex items-center justify-center h-screen">
    <div class="w-1/3">
        <form wire:submit.prevent="updateProduct" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
           
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input wire:model="name" type="text" id="name" placeholder="Name of product" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="cost" class="block text-gray-700 text-sm font-bold mb-2">Cost $: </label>
                <input wire:model="cost" type="number" id="cost" placeholder="Cost of product" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('cost') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button wire:click="clearInputs" type="button" class="btn btn-red">Reset</button>
                <button type="submit" class="btn btn-green">Save</button>
            </div>
        </form>
    </div>
</div>
