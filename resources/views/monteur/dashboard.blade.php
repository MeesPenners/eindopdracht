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
                    <h3 class="text-lg font-semibold mb-4">{{ __("Voertuig assemblage") }}</h3>
                    @if (empty($selectedChassisId))
                    <!-- Form -->
                    <form method="POST" action="{{ route('monteur.chassis') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="carname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Car name</label>
                            <input type="text" id="carname" name="car_name" value="" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                        </div>

                        <!-- Customer Selection -->
                        <div class="mb-6">
                            <label for="customer" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Customer</label>
                            <select id="customer" name="customer_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                                <option value="" disabled selected>Select a customer</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Chassis Selection -->
                        <div class="mb-6">
                            <label for="chassis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Chassis</label>
                            <select id="chassis" name="chassis_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                                <option value="" disabled selected>Select a chassis</option>
                                @foreach ($chassis as $chassisItem)
                                <option value="{{ $chassisItem->id }}">{{ $chassisItem->name }} &#8594;&#8364;{{ $chassisItem->costs }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                                Submit
                            </button>
                        </div>
                        @endif
                    </form>

                    @if (!empty($selectedChassisId))
                    <form method="POST" action="{{ route('monteur.store') }}">
                        @csrf

                        <!-- Pre-filled and Uneditable car name Field -->
                        <div class="mb-6">
                            <label for="carname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Car name</label>
                            <input type="text" id="carname" name="car_name" value="{{ $carName ?? 'Default car Name' }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" readonly>
                        </div>

                        <!-- Pre-filled and Uneditable Customer Field -->
                        <div class="mb-6">
                            <label for="customer" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Customer</label>
                            <input type="text" value="{{ $selectedCustomerId->name ?? 'Default Customer Name' }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" readonly></input>
                            <input type="hidden" id="customer" name="customer_id" value="{{ $selectedCustomerId->id }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" readonly></input>
                        </div>

                        <!-- Pre-filled and Uneditable Chassis Field -->
                        <div class="mb-6">
                            <label for="chassis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Chassis</label>
                            <input type="text" value="{{ $selectedChassisId->name ?? 'Default Chassis Name' }} &#8594;&#8364;{{ $selectedChassisId->costs }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" readonly></input>
                            <input type="hidden" id="chassis" name="chassis_id" value="{{ $selectedChassisId->id }} " class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" readonly></input>
                        </div>
                        <!-- Wheels Selection -->
                        <div class="mb-6">
                            <label for="wheel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Wheels</label>
                            <select id="wheel" name="wheel_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                                <option value="" disabled selected>Select a wheel</option>
                                @foreach ($wheels as $wheel)
                                <option value="{{ $wheel->id }}">{{ $wheel->name }} &#8594;&#8364;{{ $wheel->costs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- drives Selection -->
                        <div class="mb-6">
                            <label for="drive" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Drive</label>
                            <select id="drive" name="drive_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                                <option value="" disabled selected>Select a drive</option>
                                @foreach ($drives as $drive)
                                <option value="{{ $drive->id }}">{{ $drive->name }} &#8594;&#8364;{{ $drive->costs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- seats Selection -->
                        <div class="mb-6">
                            <label for="seat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Seat type</label>
                            <select id="seat" name="seat_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Select a seat</option>
                                @foreach ($seats as $seat)
                                <option value="{{ $seat->id }}">{{ $seat->name }} &#8594;&#8364;{{ $seat->costs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Seats Amount Selection -->
                        <div class="mb-6">
                            <label for="seat_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Number of Seats</label>
                            <select id="seat_amount" name="seat_amount" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="" disabled selected>Select the number of seats</option>
                                @for ($i = 1; $i <= 10; $i++) <!-- Allow selection of 1 to 10 seats -->
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <!-- steeringWheel Selection -->
                        <div class="mb-6">
                            <label for="steeringWheel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">steering wheel</label>
                            <select id="steeringWheel" name="steering_wheel_id" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" required>
                                <option value="" disabled selected>Select a steering wheel</option>
                                @foreach ($steeringWheels as $steeringWheel)
                                <option value="{{ $steeringWheel->id }}">{{ $steeringWheel->name }} &#8594;&#8364;{{ $steeringWheel->costs }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                                Submit
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>