<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">Total Ciudades: {{ $totalCiudades }}</div>
            <div class="bg-white p-4 rounded shadow">Total Ciudadanos: {{ $totalCiudadanos }}</div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold mb-2">Ciudadanos por Ciudad</h3>
                <ul>
                    @foreach ($ciudades as $ciudad)
                        <li>{{ $ciudad->nombre }}: {{ $ciudad->ciudadanos_count }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <form method="POST" action="{{ route('reporte.enviar') }}" class="mt-6">
            @csrf
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Enviar Reporte por Correo</button>
        </form>
    </div>
</x-app-layout>
