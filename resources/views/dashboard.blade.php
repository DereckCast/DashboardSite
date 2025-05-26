<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">Total Ciudades: {{ $totalCiudades }}</div>
            <div class="bg-white p-4 rounded shadow">Total Ciudadanos: {{ $totalCiudadanos }}</div>
            <div class="bg-white p-4 rounded shadow">
                <h3>Ciudadanos por Ciudad</h3>
                <ul>
                    @foreach ($ciudades as $ciudad)
                        <li>{{ $ciudad->nombre }}: {{ $ciudad->ciudadanos_count }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <div class="mt-6 max-w-md mx-auto">
                <form method="POST" action="{{ route('reporte.enviar') }}" class="bg-white p-4 rounded shadow space-y-4">
                    @csrf
                    <label class="block text-sm font-medium text-gray-700">Correo destinatario</label>
                    <input type="email" name="email" required placeholder="ejemplo@correo.com"
                        class="w-full border border-gray-300 p-2 rounded">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow w-full">
                        Enviar Reporte por Correo
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
