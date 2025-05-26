<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Crear Ciudad</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('ciudad.guardar') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Ciudad</label>
                <input name="nombre" type="text" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="button"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>
