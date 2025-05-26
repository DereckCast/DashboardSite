<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Ciudad;
use App\Models\Ciudadano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::withCount('ciudadanos')->orderBy('nombre')->get();
        $totalCiudades = $ciudades->count();
        $totalCiudadanos = $ciudades->sum('ciudadanos_count');

        return view('dashboard', compact('ciudades', 'totalCiudades', 'totalCiudadanos'));
    }

    public function indexCiudades()
    {
        $ciudades = Ciudad::withCount('ciudadanos')->orderBy('nombre')->get();
        return view('ciudades.index', compact('ciudades'));
    }

    public function indexCiudadanos()
    {
        $ciudadanos = Ciudadano::with('ciudad')->orderBy('nombre')->get();
        return view('ciudadanos.index', compact('ciudadanos'));
    }

    public function formCiudad()
    {
        return view('ciudades.crear');
    }

    public function guardarCiudad(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:ciudades,nombre',
        ]);

        Ciudad::create(['nombre' => $request->nombre]);

        return redirect()->route('ciudades.index')->with('status', 'Ciudad creada con éxito.');
    }

    public function formCiudadano()
    {
        $ciudades = Ciudad::orderBy('nombre')->get();
        return view('ciudadanos.crear', compact('ciudades'));
    }

    public function guardarCiudadano(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);

        Ciudadano::create($request->only('nombre', 'email', 'ciudad_id'));

        return redirect()->route('ciudadanos.index')->with('status', 'Ciudadano registrado correctamente.');
    }

    public function eliminarCiudad($id)
    {
        $ciudad = Ciudad::withCount('ciudadanos')->findOrFail($id);

        if ($ciudad->ciudadanos_count > 0) {
            return back()->with('error', 'No se puede eliminar la ciudad porque tiene ciudadanos registrados.');
        }

        $ciudad->delete();
        return back()->with('status', 'Ciudad eliminada exitosamente.');
    }

    public function eliminarCiudadano($id)
    {
        $ciudadano = Ciudadano::findOrFail($id);
        $ciudadano->delete();

        return back()->with('status', 'Ciudadano eliminado exitosamente.');
    }

    public function ciudadanosPorCiudad(Request $request)
    {
        $search = $request->input('search');

        $ciudades = Ciudad::with(['ciudadanos' => function ($q) use ($search) {
            if ($search) {
                $q->where('nombre', 'like', "%$search%");
            }
        }])
        ->orderBy('nombre')
        ->get()
        ->filter(function ($ciudad) use ($search) {
            return $ciudad->ciudadanos->isNotEmpty();
        });

        return view('ciudadanos.por_ciudad', compact('ciudades', 'search'));
    }
    public function enviarReporte(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $ciudades = Ciudad::with('ciudadanos')->orderBy('nombre')->get();
        Mail::to($request->email)->send(new ReportMail($ciudades));

        return redirect()->back()->with('status', 'Reporte enviado con éxito.');
    }
}
