<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Crear Ciudad</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('ciudad.guardar') }}">
            @csrf
            <label>Nombre de la Ciudad</label>
            <input type="text" name="nombre" required class="border p-2 rounded w-full mb-4" />

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>
