<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatementRequest;
use App\Models\CategoryLevel;
use App\Models\Statement;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Question;
use App\Controllers\Questions;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
use PhpParser\Node\Stmt\Return_;

class StatementController extends Controller {
    //FUNCIONES DE STATEMENTS
    public function index() { //LISTADO DE STATEMENTS
        $categoryLevel= CategoryLevel::paginate(1);
        return view('statements.index',['categoryLevel'=> $categoryLevel]);
    }
    public function create(Subcategory $subcategory){//CREAR STATEMENT    
        return view('statements.create', compact('subcategory'));//retornamos a la vista de crear, y le pasamos la variable subcategoría
    }
    //HECHO
    public function save(Request $request){//GUARDA LOS DATOS RECIBIDOS PARA EL STATEMENT 
        $validator = Validator::make($request->all(), [
            'statementImage' => 'nullable|image|mimes:jpeg,png,jpg',
            'statement' => [
                'nullable',
                'string',
                'required_without_all:statementImage',
                'regex:/^<iframe\swidth="560"\sheight="315"\ssrc="https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]+\?si=[a-zA-Z0-9_-]+"\stitle="YouTube\svideo\splayer"\sframeborder="0"\sallow="accelerometer;\sautoplay;\sclipboard-write;\sencrypted-media;\sgyroscope;\spicture-in-picture;\sweb-share"\sreferrerpolicy="strict-origin-when-cross-origin"\sallowfullscreen><\/iframe>$/'

            ],
        ], [
            'statement.regex' => 'El campo statement debe ser una URL válida de YouTube.',
            'statement.required_without_all' => 'Debes completar al menos el campo question o statementImage.'
        ]);
    
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

        $newStatement = new Statement;
        $newStatement->statement = $request->statement;
        $newStatement->subcategory_id = $request->sub;
        
        if($request->hasFile('statementImage')){
            $image = $request->file('statementImage');
            $route = Storage::disk('s3')->put('preguntas', $image); // Storage::put('avatars/1', $image);
            
            $newStatement->statementImage = $route;
        }        
        
        $newStatement->save();
         return redirect()->route('statements.index')->with('success','Post registrado correctamente!');      
                    
    }
    
       //HECHO          
    public function editar(Statement $statement){ //PASA
        $subcategory = Subcategory::all();
        return view('statements.edit', compact('statement','subcategory'));
    }

    public function edit(Request $request, $id){ //EDITA
        
        $statement= Statement::find($id);

        if ( $statement->statement) {
            $statement->statement = $request->statement;
        }

        $this->validate($request,[
            'statementImage' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);
        if($request->hasFile('statementImage')){
              
            if($statement->statementImage){
                Storage::disk('s3')->delete($statement->statementImage);
            }

            $image = $request->file('statementImage');
            $route = Storage::disk('s3')->put('preguntas', $image);
            $statement->statementImage = $route;
        }   

        $statement->save();

        return redirect()->route('statements.index')->with('success', 'Enunciado actualizado correctamente');  
    }
    public function delete(Statement $statement)
    {        
    
        $questions = $statement->questions;  // Obtener las preguntas relacionadas con el Statement
    
        foreach ($questions as $question) {
            if ($question->questionImage) {
                Storage::disk('s3')->delete($question->questionImage);
            }
            $question->delete();  // Eliminar la pregunta
        }

        if ($statement->statementImage) {
            Storage::disk('s3')->delete($statement->statementImage);
        }
        $statement->delete();
        return redirect()->route('statements.index')->with('success', 'Enunciado y preguntas eliminadas correctamente');  
    }

}
