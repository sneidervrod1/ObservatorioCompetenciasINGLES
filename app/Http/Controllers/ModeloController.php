<?php

namespace App\Http\Controllers;

use App\Models\CategoryLevel;
use App\ModelS\Level;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function mostrarmodelo(){
        $catLevel = CategoryLevel::all();
        return view('modelo.modelo', compact('catLevel'));
      
    }
}
