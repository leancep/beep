<x-app-layout>
@if (session()->has('message'))
    <div class="fixed-top m-5 w-full h-full flex items-center justify-center z-50">
        <div class="btn-green text-white font-bold px-4 py-2 rounded-lg shadow-lg flex items-center justify-between" id="alertBox">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session()->get('message') }}</span>
            </div>
            <button type="button" class="ml-auto" id="closeButton">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif

    <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }} 
        </h2>
        <a href="{{route('products.create')}}" type="button" class="btn btn-red">New Product</a>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('product.table')
            </div>
        </div>
    </div>
</x-app-layout>

<script>
        const alertBox = document.getElementById('alertBox');
        const closeButton = document.getElementById('closeButton');

        closeButton.addEventListener('click', function() {
            alertBox.style.display = 'none';
        });
</script>
