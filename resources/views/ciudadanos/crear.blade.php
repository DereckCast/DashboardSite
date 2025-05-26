<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Crear Ciudadano</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('ciudadano.guardar') }}">
            @csrf
            <label class="block mb-2">Nombre</label>
            <input name="nombre" type="text" class="w-full border p-2 rounded mb-4" required>

            <label class="block mb-2">Email</label>
            <input name="email" type="email" class="w-full border p-2 rounded mb-4" required>

            <label class="block mb-2">Ciudad</label>
            <select name="ciudad_id" class="w-full border p-2 rounded mb-4" required>
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
