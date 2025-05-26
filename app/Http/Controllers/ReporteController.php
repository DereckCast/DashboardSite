<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ReportMail;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Mail;

class ReporteController extends Controller
{
    public function enviarReporte()
    {
        $datos = Ciudad::with('ciudadanos')->get();
        Mail::to('dacastilloc@uamv.edu.ni')->send(new ReportMail($datos));

    return redirect()->back()->with('status', 'Reporte enviado con éxito al correo: ' . $request->email);
    }
}
