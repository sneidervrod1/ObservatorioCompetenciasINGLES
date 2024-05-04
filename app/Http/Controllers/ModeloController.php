<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function mostrarmodelo(){

        return view('modelo.modelo');
    }
}
