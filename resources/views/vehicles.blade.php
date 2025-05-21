<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Vehicles Table -->
                    <table id="vehicle-table" class="table-auto w-full border-collapse border border-gray-600 mb-8 text-center">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Vehicles</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-4 py-2">Customer ID</th>
                                <th class="border border-gray-600 px-4 py-2">Customer Name</th>
                                <th class="border border-gray-600 px-4 py-2">Vehicle Name</th>
                                <th class="border border-gray-600 px-4 py-2">Total Cost</th>
                                <th class="border border-gray-600 px-4 py-2">Total Time</th>
                                <th class="border border-gray-600 px-4 py-2">Status</th>
                                <th class="border border-gray-600 px-4 py-2">Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                                <form method="POST" action="{{ route('vehicle.show', $vehicle->id) }}">
                                    @csrf
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->customer_id }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->customer->name}}
                                        </span>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->name }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->total_cost }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->total_time }}
                                        </span>
                                    </td>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            {{ $vehicle->status->status }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-600 px-4 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                            Show
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>