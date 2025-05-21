<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 space-y-6">

                <!-- Vehicle Name & Info -->
                <div class="text-center">
                    <h3 class="text-7xl font-extrabold text-gray-800 dark:text-gray-100 mb-4">{{ $vehicle->name }}</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-2">Customer: <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $vehicle->customer->name }}</span></p>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Total Cost: <span class="font-semibold text-green-500">€{{ number_format($vehicle->total_cost, 2) }}</span></p>
                </div>

                <!-- Vehicle Modules -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Chassis Module -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3 text-center">Chassis</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">{{ $vehicle->chassis->name }}</p>
                        <img src="{{ asset('images/' . $vehicle->chassis->image) }}" alt="Chassis Image" class="mt-2 w-40 h-32 object-contain rounded-md shadow-lg">
                    </div>

                    <!-- Drive Module -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3 text-center">Drive</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">{{ $vehicle->drive->name }}</p>
                        <img src="{{ asset('images/' . $vehicle->drive->image) }}" alt="Drive Image" class="mt-2 w-40 h-32 object-contain rounded-md shadow-lg">
                    </div>

                    <!-- Wheel Module -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3 text-center">Wheel</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">{{ $vehicle->wheel->name }}</p>
                        <img src="{{ asset('images/' . $vehicle->wheel->image) }}" alt="Wheel Image" class="mt-2 w-40 h-32 object-contain rounded-md shadow-lg">
                    </div>

                    <!-- Steering Wheel Module -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3 text-center">Steering Wheel</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">{{ $vehicle->steering_wheel->name }}</p>
                        <img src="{{ asset('images/' . $vehicle->steering_wheel->image) }}" alt="Steering Wheel Image" class="mt-2 w-40 h-32 object-contain rounded-md shadow-lg">
                    </div>

                    <!-- Seat Module -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-3 text-center">Seat</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">{{ $vehicle->seat->name }} (x{{ $vehicle->seat_amount }})</p>
                        <img src="{{ asset('images/' . $vehicle->seat->image) }}" alt="Seat Image" class="mt-2 w-40 h-32 object-contain rounded-md shadow-lg">
                    </div>

                </div>

            </div>
        </div>
    </div>



</x-app-layout>