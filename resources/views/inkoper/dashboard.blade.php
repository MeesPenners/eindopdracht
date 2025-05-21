<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">









                    <!-- Chassis Table -->
                    <table id="chassis-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Chassis</h3>
                            </th>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Name</th>
                                <th class="border border-gray-600 px-1 py-2">Wheel Amount</th>
                                <th class="border border-gray-600 px-1 py-2">Vehicle Type</th>
                                <th class="border border-gray-600 px-1 py-2">Length</th>
                                <th class="border border-gray-600 px-1 py-2">Width</th>
                                <th class="border border-gray-600 px-1 py-2">Height</th>
                                <th class="border border-gray-600 px-1 py-2">Time</th>
                                <th class="border border-gray-600 px-1 py-2">Costs</th>
                                <th class="border border-gray-600 px-1 py-2">Image Path</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chassis as $chassisItem)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('chassis.deleteorrestore', $chassisItem->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $chassisItem->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('chassis.update', $chassisItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" value="{{ $chassisItem->name }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_amount_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($wheelAmounts as $wheelAmount)
                                            <option value="{{ $wheelAmount->id }}" {{ $chassisItem->wheel_amount_id == $wheelAmount->id ? 'selected' : '' }}>
                                                {{ $wheelAmount->amount }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="vehicle_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType->id }}" {{ $chassisItem->vehicle_type_id == $vehicleType->id ? 'selected' : '' }}>
                                                {{ $vehicleType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="length" value="{{ $chassisItem->length }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="width" value="{{ $chassisItem->width }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="height" value="{{ $chassisItem->height }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" value="{{ $chassisItem->time }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" value="{{ $chassisItem->costs }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image" value="{{ $chassisItem->image }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('chassis.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" id="name" value="" placeholder="e.g., Nikinella" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_amount_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($wheelAmounts as $wheelAmount)
                                            <option value="{{ $wheelAmount->id }}">
                                                {{ $wheelAmount->amount }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="vehicle_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType->id }}">
                                                {{ $vehicleType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="length" id="length" value="" placeholder="e.g., 500" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="width" id="width" value="" placeholder="e.g., 200" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="height" id="height" value="" placeholder="e.g., 200" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" id="time" value="" placeholder="e.g., 2" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" id="costs" value="" placeholder="e.g., 65000" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" id="image_path" value="" placeholder="image_not_set.png" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>











                    <!-- Drives Table -->
                    <table id="drives-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Drives</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Name</th>
                                <th class="border border-gray-600 px-1 py-2">Drive type</th>
                                <th class="border border-gray-600 px-1 py-2">Power</th>
                                <th class="border border-gray-600 px-1 py-2">Time</th>
                                <th class="border border-gray-600 px-1 py-2">Costs</th>
                                <th class="border border-gray-600 px-1 py-2">Image path</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drives as $drive)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('drives.deleteorrestore', $drive->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $drive->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('drives.update', $drive->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" value="{{ $drive->name }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="drive_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($driveTypes as $driveType)
                                            <option value="{{ $driveType->id }}" {{ $drive->drive_type_id == $driveType->id ? 'selected' : '' }}>
                                                {{ $driveType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="power" value="{{ $drive->power }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" value="{{ $drive->time }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" value="{{ $drive->costs }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" value="{{ $drive->image }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('drives.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" id="name" value="" placeholder="e.g., Elektrisch500" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="drive_type_id" id="drive_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Drive Type</option>
                                            @foreach ($driveTypes as $driveType)
                                            <option value="{{ $driveType->id }}">
                                                {{ $driveType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="power" id="power" value="" placeholder="e.g., 500" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" id="time" value="" placeholder="e.g., 4" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" id="costs" value="" placeholder="e.g., 65000" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" id="image_path" value="" placeholder="image_not_set.png" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>








                    <!-- Seats Table -->
                    <table id="seats-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Seats</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Name</th>
                                <th class="border border-gray-600 px-1 py-2">Material type</th>
                                <th class="border border-gray-600 px-1 py-2">Time</th>
                                <th class="border border-gray-600 px-1 py-2">Costs</th>
                                <th class="border border-gray-600 px-1 py-2">Image path</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seats as $seat)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('seats.deleteorrestore', $seat->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $seat->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('seats.update', $seat->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" value="{{ $seat->name }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="seat_material_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($materialTypes as $materialType)
                                            <option value="{{ $materialType->id }}" {{ $seat->seat_material_id == $materialType->id ? 'selected' : '' }}>
                                                {{ $materialType->material }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" value="{{ $seat->time }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" value="{{ $seat->costs }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" value="{{ $seat->image }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('seats.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" id="name" value="" placeholder="e.g., ComfortSeat" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="seat_material_id" id="material_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Material Type</option>
                                            @foreach ($materialTypes as $materialType)
                                            <option value="{{ $materialType->id }}">
                                                {{ $materialType->material }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" id="time" value="" placeholder="e.g., 4" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" id="costs" value="" placeholder="e.g., 3500" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" id="image_path" value="" placeholder="image_not_set.png" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>








                    <!-- Steering wheel Table -->
                    <table id="steering-wheel-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Seats</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Name</th>
                                <th class="border border-gray-600 px-1 py-2">Specialization</th>
                                <th class="border border-gray-600 px-1 py-2">Steering Type</th>
                                <th class="border border-gray-600 px-1 py-2">Time</th>
                                <th class="border border-gray-600 px-1 py-2">Costs</th>
                                <th class="border border-gray-600 px-1 py-2">Image path</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($steeringWheels as $steeringWheel)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('steeringWheels.deleteorrestore', $steeringWheel->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $steeringWheel->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('steeringWheels.update', $steeringWheel->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" value="{{ $steeringWheel->name }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="specialization" value="{{ $steeringWheel->specialization }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="steering_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($steeringTypes as $steeringType)
                                            <option value="{{ $steeringType->id }}" {{ $steeringWheel->steering_type_id == $steeringType->id ? 'selected' : '' }}>
                                                {{ $steeringType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" value="{{ $steeringWheel->time }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" value="{{ $steeringWheel->costs }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" value="{{ $steeringWheel->image }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('steeringWheels.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" id="name" value="" placeholder="e.g., SchapenStadium" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="specialization" id="specialization" value="" placeholder="e.g., Schapenvacht" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="steering_type_id" id="steering_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Steeringwheel Type</option>
                                            @foreach ($steeringTypes as $steeringType)
                                            <option value="{{ $steeringType->id }}">
                                                {{ $steeringType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" id="time" value="" placeholder="e.g., 4" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" id="costs" value="" placeholder="e.g., 3500" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" id="image_path" value="" placeholder="image_not_set.png" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>








                    <!-- Wheels Table -->
                    <table id="wheels-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Wheels</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Name</th>
                                <th class="border border-gray-600 px-1 py-2">Wheel type</th>
                                <th class="border border-gray-600 px-1 py-2">Power</th>
                                <th class="border border-gray-600 px-1 py-2">Time</th>
                                <th class="border border-gray-600 px-1 py-2">Costs</th>
                                <th class="border border-gray-600 px-1 py-2">Image path</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wheels as $wheel)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('wheels.deleteorrestore', $wheel->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $wheel->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('wheels.update', $wheel->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" value="{{ $wheel->name }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($wheelTypes as $wheelType)
                                            <option value="{{ $wheelType->id }}" {{ $wheel->wheel_type_id == $wheelType->id ? 'selected' : '' }}>
                                                {{ $wheelType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="diameter" value="{{ $wheel->diameter }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" value="{{ $wheel->time }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" value="{{ $wheel->costs }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" value="{{ $wheel->image }}" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('wheels.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="name" id="name" value="" placeholder="e.g., Z15-4" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_type_id" id="wheel_type_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Wheel Type</option>
                                            @foreach ($wheelTypes as $wheelType)
                                            <option value="{{ $wheelType->id }}">
                                                {{ $wheelType->type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="diameter" id="diameter" value="" placeholder="e.g., 15" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="time" id="time" value="" placeholder="e.g., 4" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="number" name="costs" id="costs" value="" placeholder="e.g., 65000" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="image_path" id="image_path" value="" placeholder="image_not_set.png" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>








                    <!-- Suitable chassis Table -->
                    <table id="wheels-table" class="table-auto w-full border-collapse border border-gray-600 mb-8">
                        <thead>
                            <th colspan="11" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Wheels</h3>
                            </th>
                            <tr>
                                <th class="border border-gray-600 px-2 py-2">Del/Res</th>
                                <th class="border border-gray-600 px-1 py-2">Wheel</th>
                                <th class="border border-gray-600 px-1 py-2">Chassis</th>
                                <th class="border border-gray-600 px-1 py-2">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suitableChassis as $suitableChassisItem)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('suitableChassis.deleteorrestore', $suitableChassisItem->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded">
                                            {{ $suitableChassisItem->trashed() ? 'Restore' : 'Delete' }}
                                        </button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('suitableChassis.update', $suitableChassisItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($wheels as $wheel)
                                            <option value="{{ $wheel->id }}" {{ $suitableChassisItem->wheel_id == $wheel->id ? 'selected' : '' }}>
                                                {{ $wheel->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="chassis_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            @foreach ($chassis as $chassisItem)
                                            <option value="{{ $chassisItem->id }}" {{ $suitableChassisItem->chassis_id == $chassisItem->id ? 'selected' : '' }}>
                                                {{ $chassisItem->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                </td>
                                <form method="POST" action="{{ route('suitableChassis.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="wheel_id" id="wheel_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Wheel</option>
                                            @foreach ($wheels as $wheel)
                                            <option value="{{ $wheel->id }}">
                                                {{ $wheel->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <select name="chassis_id" id="chassis_id" required class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                            <option value="" disabled selected>Select Chassis</option>
                                            @foreach ($chassis as $chassisItem)
                                            <option value="{{ $chassisItem->id }}">
                                                {{ $chassisItem->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded">
                                            Add
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>