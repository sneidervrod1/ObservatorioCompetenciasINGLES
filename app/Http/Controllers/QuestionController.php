<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Statement;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index(Statement $statement){
        return view('questions.index', compact('statement'));
    }
    public function create(Statement $statement){   
        return view('questions.create', compact('statement'));
    }
    public function save(Request $request){ 
    $this->validate($request,[
            'questionImage' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $question = new Question;
        $question->question = $request->question;
        $question->correctAnswer = $request->correctAnswer;
        $question->quantityOptions = $request->quantityOptions;
        $question->statement_id = $request->statement;

        if($request->hasFile('questionImage')){
              
            if($question->questionImage){
                Storage::disk('s3')->delete($question->questionImage);
            }

            $image = $request->file('questionImage');
            $route = Storage::disk('s3')->put('preguntas', $image);
            $question->questionImage = $route;
        }   
        $question->save();
        
        $x =  Question::where('statement_id', $request->statement)->get('id');
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $index => $question) {
            $question = Question::find($question['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $question->weightQuestions = $x;
                $question->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $question->weightQuestions = $numero;
                $question->save();
                $suma += $numero;
            }
            $cantidad--;
        }


        return redirect()->route('questions.index', $request->statement )->with('succes', 'Pregunta creada correctamente');
    }
    public function editar(Question $question){   
        return view('questions.edit', compact('question'));
    }
    public function edit(Request $request, Question $question){   
        $quest = Question::find($question->id);
        
        $quest->question = $request->question;
        $quest->correctAnswer = $request->correctAnswer;
        $quest->quantityOptions = $request->quantityOptions;


        if($request->hasFile('questionImage')){
            if($quest->hasFile('qeustionImage')){
                Storage::disk('s3')->delete($quest->questionImage);

            }
            $image = $request->file('questionImage');
            $route = Storage::disk('s3')->put('preguntas', $image);
            $quest->questionImage = $route;
        }   

        $quest->save();
        return redirect()->route('questions.index', $question->statement_id )->with('succes', 'Pregunta modificada correctamente');

    }
    public function delete(Question $question)
    {
        $statement = $question->statement_id;
        
        if ($question->questionImage) {
            Storage::disk('s3')->delete($question->questionImage);
        }
        $question->delete();

        $x = Question::where('statement_id', $statement)->get('id');//OBTENEMOS LOS IDS DE LAS QUESTIONS
        $cantidad = count($x);
        $suma = 0;

        foreach ($x as $index => $questionData) {
            $question = Question::find($questionData['id']); // HALLAMOS LA SUBCATEOGRIA CON EL ID

            if($cantidad == 1){ // CUANDO SOLO QUEDA 1 REGISTRO POR ASGINAR PESO, SE ITERA ESTE IF
                $x = 100 - $suma;

                $question->weightQuestions = $x;
                $question->save();
            }else{ // EN EL RESTO DE ITERACIONES SE ITERA ESTE IF 
                $numero = rand(1, 100/(count($x)));

                $question->weightQuestions = $numero;
                $question->save();
                $suma += $numero;
            }
            $cantidad--;
        }


        return redirect()->route('questions.index', $statement)->with('success', 'Pregunta eliminada correctamente');  
    }

    public function pesoSub(Statement $statement) {
        return view('questions.pesos', compact('statement'));
    }
    // ACTUALIZAR PESOS SUBCATEGORIAS
    public function actualizarPesoSub(Request $request, Statement $statement) {
       
        $datosFormulario = $request->except('_token', '_method');   
        $suma = array_sum($datosFormulario);
        if ($suma == 100) {
            foreach ($datosFormulario as $llave => $valor) {
                $question = Question::find($llave);
                $question->weightQuestions = $valor;
                $question->save();
            }
            return redirect()->route('questions.index', $statement->id)->with('success', 'Pesos actualizados correctamente');            
        } else {
            return redirect()->back()->withInput()->with('error', 'La suma de los valores debe ser 100. Por favor, ingrese datos correctos.');
        }
    }
}