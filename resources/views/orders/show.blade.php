<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order #') }} {{$order->id}}
        </h2>
        <a href="{{route('orders.index')}}" type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
    </div>
    </x-slot>
    @if (session()->has('message'))
    <div class="flex items-center justify-center fixed top-0 left-0 w-full h-full bg-transparent z-50">
        <div class="bg-gray-500 text-white font-bold px-4 py-2 rounded-lg shadow-lg flex justify-between">
            <div class="flex items-center">
                <i class="flaticon-warning mr-2"></i>
                <span>{{ session()->get('message') }}</span>
            </div>
            <button type="button" class="ml-auto" data-dismiss="alert" aria-label="Close">
                <i class="ki ki-close"></i>
            </button>
        </div>
    </div>
@endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 @livewire('orders.show', ['order_id' => $order->id])
            </div>
        </div>
    </div>
</x-app-layout>
