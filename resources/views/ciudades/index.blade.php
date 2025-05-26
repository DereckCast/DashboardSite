<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Ciudades</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        @if (session('status'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('status') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('ciudad.crear') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                Crear Ciudad
            </a>
        </div>

        <table class="w-full table-auto border-collapse shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Ciudadanos</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ciudades as $ciudad)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $ciudad->nombre }}</td>
                        <td class="px-4 py-2">{{ $ciudad->ciudadanos_count }}</td>
                        <td class="px-4 py-2 text-center">
                            <form method="POST" action="{{ route('ciudad.eliminar', $ciudad->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar esta ciudad?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
