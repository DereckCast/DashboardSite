<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ciudadanos</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333;">
    <div style="max-width: 700px; margin: 0 auto; background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h1 style="color: #2563eb;">📋 Reporte de Ciudadanos por Ciudad</h1>

        @foreach ($datos as $ciudad)
            <h2 style="margin-top: 30px; color: #111;">🏙️ {{ $ciudad->nombre }}</h2>

            @if ($ciudad->ciudadanos->count())
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr style="background-color: #2563eb; color: white;">
                            <th style="padding: 8px; text-align: left;">Nombre</th>
                            <th style="padding: 8px; text-align: left;">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciudad->ciudadanos as $ciudadano)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 8px;">{{ $ciudadano->nombre }}</td>
                                <td style="padding: 8px;">{{ $ciudadano->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="color: gray;">No hay ciudadanos registrados en esta ciudad.</p>
            @endif
        @endforeach
    </div>
</body>
</html>
