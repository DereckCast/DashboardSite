<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm font-semibold transition'
]) }}>
    {{ $slot }}
</button>
