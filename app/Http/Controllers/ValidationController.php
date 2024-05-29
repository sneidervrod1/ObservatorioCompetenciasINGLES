<?php

namespace App\Http\Controllers;

use App\Models\ValidationQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Validation;
use App\Models\User;
use App\Models\ValidationCategory;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;

class ValidationController extends Controller{
    //ANTERIOR
   

    public function mostrar(){
        DB::table('validation_categories')->truncate();

        return redirect()->back()->with('success', 'Todos los datos han sido borrados.');
        // $existeValidacion = Validation::where('user', Auth::id())->exists();

        // if ($existeValidacion) {
        //     $Lista = Validation::join('users','users.id', '=', 'validations.user' )
        //     ->select("users.name", "users.email", "validations.*")
        //     ->get();

        //     $personasencuesta = $Lista->count(); // Count validations from $Lista

        //     return view('validations.validationRealized', [
        //         'validations' => $Lista,
        //         'personasencuesta' => $personasencuesta
        //     ]);
        // } else {
        //     $catVal = ValidationCategory::all();

        //     return view('validations.validationForm', compact('catVal'));
        // }
    }
    public function mostrarSinRegistro(){
    
            $Lista = Validation::join('users','users.id', '=', 'validations.user' )
            ->select("users.name", "users.email", "validations.*")
            ->get();

            $personasencuesta = $Lista->count(); // Count validations from $Lista

            return view('modelo.validation', [
                'validations' => $Lista,
                'personasencuesta' => $personasencuesta
            ]);
      
    }
    public function recibir(Request $request){
        $respuestasEnviadas = $request->except('_token', 'nombre', 'codigo', 'curso');
        // return $respuestasEnviadas;
        $resultados = [];
        foreach ($respuestasEnviadas as $key => $value) {
                $idPregunta = (int)$key;
                $valor = (int)$value;
                $peso = ValidationQuestion::where('id', $idPregunta)->value('weight_validation_question'); 
                $X = ValidationQuestion::where('id', $idPregunta)->value('validation_category_id'); 
                $resultadoMultiplicacion = $valor * (0.01) * $peso;
              
                $resultados[$idPregunta] = [
                    'id' => $idPregunta,
                   
                    'valorPorcentual' => $resultadoMultiplicacion,
                    'validation_category_id' => $X,             
                ];
        }
        // return $resultados;
        $sumasPorCategoria = collect($resultados)->groupBy('validation_category_id')
        ->map(function ($group) {
            return $group->sum('valorPorcentual');
        })->toArray();
        
      
        // return $sumaPorSubcategoria;
        $pu = 0;
        $peou = 0;
        $au = 0;
        $iu = 0;
        $sum =0;
        foreach ($sumasPorCategoria as $key => $value) {
            if ($key == "1") {
                $pu = $value;
            }
            if ($key == "2") {
                $peou = $value;
            }
            if ($key == "3") {
                $au = $value;
            }
            if ($key == "4") {
                $iu = $value;
            }

            $idCategory= (int)$key;
            $valor = (int)$value;
            $peso = ValidationCategory::where('id', $idCategory)->value('weight_validation_category'); 
        
            $resultadoMultiplicacion = $valor * (0.01) * $peso;
            $sum += $resultadoMultiplicacion;
        }
       

    
      

        $validacion = new Validation;
        $validacion->user = auth()->id();

        $validacion->nombre = $request->nombre;
        $validacion->curso = $request->curso;
        $validacion->codigo  = $request->codigo;

        $validacion->UtilidadPercibida = $pu;
        $validacion->modeloCFacilidadDeUsoPercibida = $peou;
        $validacion->ActitudPorElUso = $au;
        $validacion->IntencionDeUso = $iu;
        $validacion->totalAceptacion = $sum;
        $validacion->save();
     
        return redirect()->route('validation.mostrar');
    }

    // NUEVO 
    public function listaCategorias(){
        $catValidation = ValidationCategory::all();
        return view('validations.validationList', compact('catValidation'));
    }
    public function createCategorias(){
        return view('validations.validationFormCrear');
    }
    public function crearCategoriaValidacion(Request $request){
        $catVali = new ValidationCategory;
        $catVali->description = $request->description;
        $catVali->save();

        $x = ValidationCategory::all();//OBTENEMOS LOS IDS DE LAS validaciones
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $validacion) {
            
            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $validacion->weight_validation_category = $x;
                $validacion->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $validacion->weight_validation_category = $numero;
                $validacion->save();
                $suma += $numero;
            }
            $cantidad--;
        }
        return redirect()->route('validation.lista')->withInput()->with('success', 'Subcategoria creada con exito.');;

    }
    public function actualizarValCate(ValidationCategory $valCate){

        return view('validations.validationFormActualizar', compact('valCate'));

    }
    
    public function guardarActualizarValCate(Request $request, ValidationCategory $valCate){
        $sub = ValidationCategory::find($valCate->id);

        $sub->description = $request->description;
        $sub->save();
        return redirect()->route('validation.lista')->with('success', 'Subcategoria actualizada correctamente');        
  
    }
    public function mostrarPesoValCate(){
        $valiCats = ValidationCategory::all();
        return view('validations.validationFormPesos', compact('valiCats'));
    }

    public function actualizarPesoValCate(Request $request){
        $datosFormulario = $request->except('_token', '_method');   
        $suma = array_sum($datosFormulario);
        if ($suma == 100) {
            foreach ($datosFormulario as $llave => $valor) {
                $sub = ValidationCategory::find($llave);
                $sub->weight_validation_category = $valor;
                $sub->save();
            }
            return redirect()->route('validation.lista')->with('success', 'Pesos actualizados correctamente');            
        } else {
            return redirect()->back()->withInput()->with('error', 'La suma de los valores debe ser 100. Por favor, ingrese datos correctos.');
        }
    }

    public function eliminarCatValidacion(ValidationCategory $catValidation){
    
        $questValidation = $catValidation->validationQuestions;  // Obtener las preguntas relacionadas con el Statement
    
        foreach ($questValidation as $question) {
            
            $question->delete();  // Eliminar la pregunta
        }

        $catValidation->delete();

        $x = ValidationCategory::all();//OBTENEMOS LOS IDS DE LAS validaciones
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $validacion) {
            
            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $validacion->weight_validation_category = $x;
                $validacion->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $validacion->weight_validation_category = $numero;
                $validacion->save();
                $suma += $numero;
            }
            $cantidad--;
        }

        return redirect()->route('validation.lista')->with('success', 'Categoria de validacion eliminada correctamente con sus preguntas');        

    }
    public function createPregunta( ValidationCategory $validationCategory ){
        return view('validations.validationFormCrearPreguntas', compact('validationCategory'));
    }

    public function createPreguntasValidacion(Request $request){
      
        $questValidation = new ValidationQuestion;
        
        $questValidation->description = $request->description;
        $questValidation->validation_category_id = $request->catID;

        $questValidation->save();
        
        $x = ValidationQuestion::where('validation_category_id', $request->catID)->get('id');
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $index => $question) {
            $valquestion = ValidationQuestion::find($question['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $valquestion->weight_validation_question = $x;
                $valquestion->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $valquestion->weight_validation_question = $numero;
                $valquestion->save();
                $suma += $numero;
            }
            $cantidad--;
        }

        return redirect()->route('validation.lista')->withInput()->with('success', 'Pregunta de validacion creada con exito.');;

    }
    public function actualizarValQuest(ValidationQuestion $quest){

         return view('validations.validationFormActualizarPreguntas', compact('quest'));

    }
    
    public function guardarActualizarValQuest(Request $request, ValidationQuestion $quest){
        $sub = ValidationQuestion::find($quest->id);

        $sub->description = $request->description;
        $sub->save();

        return redirect()->route('validation.lista')->with('success', 'Pregunta de validacion actualizada correctamente');        
  
    }
    public function eliminarQuestValidacion(ValidationQuestion $quest){
        $sub = ValidationQuestion::find($quest->id);
        $sub->delete();

        $x = ValidationQuestion::where('validation_category_id', $quest->validation_category_id)->get('id');
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $index => $question) {
            $valquestion = ValidationQuestion::find($question['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $valquestion->weight_validation_question = $x;
                $valquestion->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $valquestion->weight_validation_question = $numero;
                $valquestion->save();
                $suma += $numero;
            }
            $cantidad--;
        }

        return redirect()->route('validation.lista')->with('success', 'Pregunta de validacion eliminada correctamente ');        

    }
    public function mostrarPesoQuestVal(ValidationCategory $catVal){

        $quests = ValidationQuestion::where('validation_category_id', $catVal->id)->get();

        return view('validations.validationFormPesosPreguntas', compact('quests'));
    }
    public function actualizarPesoQuestVal(Request $request){
        $datosFormulario = $request->except('_token', '_method');   
        $suma = array_sum($datosFormulario);
        if ($suma == 100) {
            foreach ($datosFormulario as $llave => $valor) {
                $sub = ValidationQuestion::find($llave);
                $sub->weight_validation_question = $valor;
                $sub->save();
            }
            return redirect()->route('validation.lista')->with('success', 'Pesos actualizados correctamente');            
        } else {
            return redirect()->back()->withInput()->with('error', 'La suma de los valores debe ser 100. Por favor, ingrese datos correctos.');
        }
    }

}
