<h1>Reporte de Ciudadanos por Ciudad</h1>

@foreach ($datos as $ciudad)
    <h3>{{ $ciudad->nombre }}</h3>
    <ul>
        @foreach ($ciudad->ciudadanos as $ciudadano)
            <li>{{ $ciudadano->nombre }}</li>
        @endforeach
    </ul>
@endforeach
