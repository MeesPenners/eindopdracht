<div class="bg-gray-100 dark:bg-gray-700 p-5 rounded-xl shadow hover:shadow-md transition">
    <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ $title }}</h4>
    <p class="text-sm text-gray-700 dark:text-gray-300">{{ $name }}</p>

    <img
        src="{{ asset('images/' . $image) }}"
        alt="{{ $title }} Image"
        class="mt-3 w-full h-40 object-cover rounded-md">
</div>