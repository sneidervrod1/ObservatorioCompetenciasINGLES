<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Level;
use App\Models\Subcategory;
use App\Models\CategoryLevel;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Promise\Create;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class EncuestaController extends Controller
{
    //                          FUNCIONES PARA PESOS CATEGORIA 
    // MOSTRAR CATEGORIAS
    public function index(): View {
        $niveles = Level::all();
        return view('encuestas.niveles.datos', compact('niveles'));
    }
    // MOSTRAR FORM ACTUALIZAR PESOS CATEGORIAS
    public function peso(Level $nivel) {
        return view('encuestas.niveles.formPesos', compact('nivel'));
    }
    // ACTUALIZAR PESOS CATEGORIAS
    public function actualizar(Request $request, Level $nivel) {
        $datosFormulario = $request->except('_token', '_method');
        $suma = array_sum($datosFormulario);
        if ($suma == 100) {
            foreach ($datosFormulario as $key => $dato) { // TIENE LOS PESOS QUE DEBEN PONERSE EN LOS UPDATE DE CATEGORY_LEVEL 
                $nivel->categories()->updateExistingPivot($key, [
                     'weight_category' => $dato,    
                ]);
            }
            return redirect()->route('encuesta.index')->with('success', 'Los datos fueron actualizados correctamente.');
        } else {
            return redirect()->back()->withInput()->with('error', 'La suma de los valores debe ser 100. Por favor, ingrese datos correctos.');
        }
    }
    //                          FUNCIONES CRUD SUBCATEGORIAS
    //MOSTRAR LISTA SUBCATEGORIAS
    public function indexSubcategoria(): View {
        $catelevel = CategoryLevel::paginate(6);
        return view('encuestas.subcategorias.listaSubcategoria', compact('catelevel'));
    
    }
    //FORM CREAR SUBCATEGORIA
    public function createSubcategoria(): View {
       $categoriaNivel = CategoryLevel::all(); 
    
       return view('encuestas.subcategorias.formCrearSubcategoria', compact('categoriaNivel'));
    
    }
    //CARGAR SUBCATEGORIA CREADA
    public function guardarSubcategoria(Request $request) {
        //CREAMOS EL NUEVO REGISTRO; CON LOS PESOS EN NULL
        $sub = new Subcategory;
        $sub->description = $request->description;
        $sub->category_level_id = $request->category_level_id;
        $sub->save();
        // SE ASIGNAN PESOS AUTOMATICAMENTE SEGUN LA CANTIDAD DE REGISTROS DE TAL MANERA QUE LA SUMA NUNCA SEA != DE 100
        $x = Subcategory::where('category_level_id', $request->category_level_id)->get('id');//OBTENEMOS LOS IDS DE LAS SUBCAT
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $index => $subcategoryData) {
            $subcategory = Subcategory::find($subcategoryData['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $subcategory->weight_subcategory = $x;
                $subcategory->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $subcategory->weight_subcategory = $numero;
                $subcategory->save();
                $suma += $numero;
            }
            $cantidad--;
        }
        return redirect()->route('encuesta.listaSub')->withInput()->with('success', 'Subcategoria creada con exito.');;
    }
    //FORM ACTUALIZAR PESOS SUBCATEGORIAS
    public function pesoSub(CategoryLevel $cateNivel) {
        return view('encuestas.subcategorias.formPesosSubcategoria', compact('cateNivel'));
    }
    // ACTUALIZAR PESOS SUBCATEGORIAS
    public function actualizarPesoSub(Request $request, CategoryLevel $cateNivel) {
        $datosFormulario = $request->except('_token', '_method');   
        $suma = array_sum($datosFormulario);
        if ($suma == 100) {
            foreach ($datosFormulario as $llave => $valor) {
                $sub = Subcategory::find($llave);
                $sub->weight_subcategory = $valor;
                $sub->save();
            }
            return redirect()->route('encuesta.listaSub')->with('success', 'Pesos actualizados correctamente');            
        } else {
            return redirect()->back()->withInput()->with('error', 'La suma de los valores debe ser 100. Por favor, ingrese datos correctos.');
        }
    }
    //FORM ACTUALIZAR SUBCATEGORIA
    public function actualizarSub(Subcategory $subcategoria){
        return view('encuestas.subcategorias.formActSubcategorias', compact('subcategoria'));
        
    }
    //ACTUALIZAR SUBCATEGORIA
    public function guardarActualizarSub(Request $request, Subcategory $subcategoria){
        $sub = Subcategory::find($subcategoria->id);
        $sub->description = $request->description;
        $sub->save();
        return redirect()->route('encuesta.listaSub')->with('success', 'Subcategoria actualizada correctamente');        
    }
    //BORRAR SUBCATEGORIA
    public function eliminarSub(Subcategory $subcategoria){
        
        $statements = $subcategoria->statements;

        foreach ($statements as $statement) {
            // Obtener todas las preguntas relacionadas con el statement
            $questions = $statement->questions;

            // Eliminar todas las preguntas relacionadas
            foreach ($questions as $question) {
                if ($question->questionImage) {
                    Storage::disk('s3')->delete($question->questionImage);
                }
                $question->delete();
            }

            // Eliminar la imagen del statement si existe
            if ($statement->statementImage) {
                Storage::disk('s3')->delete($statement->statementImage);
            }

            // Eliminar el statement
            $statement->delete();
        }

        // Eliminar la subcategoría
        $subcategoria->delete();
        
        $category_level_id = $subcategoria->category_level_id;

        $x = Subcategory::where('category_level_id', $category_level_id)->get('id');//OBTENEMOS LOS IDS DE LAS SUBCAT
        $cantidad = count($x);
        $suma = 0;
            foreach ($x as $index => $subcategoryData) {
                $subcategory = Subcategory::find($subcategoryData['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

                if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                    $x = 100 - $suma;

                    $subcategory->weight_subcategory = $x;
                    $subcategory->save();
                }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                    $numero = rand(1, 100/(count($x)));

                    $subcategory->weight_subcategory = $numero;
                    $subcategory->save();
                    $suma += $numero;
                }
                $cantidad--;
            }
        return redirect()->route('encuesta.listaSub')->with('success', 'Subcategoria eliminada correctamente y pesos actualizados');    
    }
}