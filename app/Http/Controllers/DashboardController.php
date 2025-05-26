<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ciudad;
use App\Models\Ciudadano;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCiudadanos = Ciudadano::count();
        $ciudadanosPorCiudad = Ciudad::withCount('ciudadanos')->get();

        return view('dashboard', compact('totalCiudadanos', 'ciudadanosPorCiudad'));
    }
}
