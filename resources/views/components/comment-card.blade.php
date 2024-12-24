<!-- Comment Card -->
<div class="shadow-lg mb-2 p-2">
    <div class="space-x-4">
        <img
                src="https://via.placeholder.com/50"
                alt="Profile Picture"
                class="w-12 h-12 rounded-full"
                />
        <div>
            <h4 class="text-lg font-semibold">{{ $author }}</h4>
            <span class="text-sm text-gray-500">{{ $createdAt }}</span>
        </div>
    </div>
    <p class="mt-4">
    {{ $message }}
    </p>
</div>
