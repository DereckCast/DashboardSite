<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Ciudadanos por Ciudad</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <form method="GET" class="mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Buscar por nombre" class="border p-2 rounded w-1/3">
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Buscar</button>
        </form>

        @foreach ($ciudades as $ciudad)
            <div class="bg-white mb-4 rounded shadow p-4">
                <h3 class="text-lg font-bold">{{ $ciudad->nombre }}</h3>
                @if ($ciudad->ciudadanos->count())
                    <table class="w-full mt-2 table-auto border">
                        <thead><tr><th class="border px-2">Nombre</th></tr></thead>
                        <tbody>
                            @foreach ($ciudad->ciudadanos as $c)
                                <tr><td class="border px-2">{{ $c->nombre }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No hay ciudadanos registrados.</p>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
