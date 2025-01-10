<div>
    <div class="mb-4">
      <label for="{{ $id }}" class="block text-sm font-medium mb-1"
        >{{ $label }}</label
      >
      <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        class="w-full px-4 py-2 border rounded-lg shadow-sm text-gray-800 focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-400 dark:text-gray-100"
        placeholder="{{ $placeholder }}"
        @if ($type !== "password")
            value="{{ old($name) }}"
        @endif
      />
    @error($name)
        <div class="text-red-700 text-xs">{{ $message }}</div>
    @enderror
    </div>
</div>
