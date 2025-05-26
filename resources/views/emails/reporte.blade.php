<h1>Reporte de Ciudadanos por Ciudad</h1>

@foreach ($ciudades as $ciudad)
    <h3>{{ $ciudad->nombre }}</h3>
    <ul>
        @foreach ($ciudad->ciudadanos as $ciudadano)
            <li>{{ $ciudadano->nombre }}</li>
        @endforeach
    </ul>
@endforeach
