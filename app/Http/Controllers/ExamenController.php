<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;


use App\Models\CategoryLevel;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Question;
use App\Models\Statement;
use App\Models\Category;
use App\Models\Subcategory;
use Barryvdh\DomPDF\Facade\Pdf;
class ExamenController extends Controller
{
    public function ver(){
        $nivel = Level::all();
        return view('examen.examen', compact('nivel'));
    }
    public function realizar(Request $request){

        $level = Level::where('name', $request->nivel)->first();
        $levelId = $level->id;

        $cat = CategoryLevel::where('level_id', $levelId)->get();
        $letras = [
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
            9 => 'I'
        ];
        return view('examen.formExamen', compact('cat','letras','level'));
    }
   
    public function save(Request $request, Level $level){

        $count = count( $request->except('_token'));
   

        $preguntas = Question::whereIn('id', array_keys($request->except(['_token', 'level'])))
        ->get(['id', 'correctAnswer', 'weightQuestions', 'statement_id'])->keyBy('id')->toArray();

        foreach ($preguntas as $key => &$pregunta) {
            if($pregunta['correctAnswer'] !== $request->input($key)){
                $pregunta['weightQuestions'] = 0;
            }
            $pregunta['valorPregunta'] = $request->input($key);

        }
        // return $preguntas;

        $sumaPorStatement = collect($preguntas)->groupBy('statement_id')
        ->map(function ($group) {
            return $group->sum('weightQuestions');
        })->toArray();

        //  return $sumaPorStatement;
        $totalWithSubcategories = [];
        foreach ($sumaPorStatement as $statement_id => $sumWeight) {
            $subcategory_id = Statement::where('id', $statement_id)->value('subcategory_id');
            $subcategory =   Subcategory::where('id', $subcategory_id)->first();
            if ($subcategory) {
                $totalWithSubcategories[] = [
                    'subcategory_id' => $subcategory_id,
                    'category_level_id' => $subcategory->category_level_id,
                    'weighted_sum' => $subcategory->weight_subcategory * 0.01 * $sumWeight
                ];
            }
               
        }        
        return $totalWithSubcategories;

    }
        
  


    public function confirmation(){
    return view('examen.confirmacion'); // Asume que tienes una vista llamada "examen/confirmation.blade.php"
    }

    public function reportList(){
        $user = auth()->id();
        $reports = Report::where('user', $user )->get();
        return view('examen.reporteLista', compact('reports'));
    }

    public function detalle(Report $report){
        $subs = $report->subcategorias;
        $sub_array = explode(",", $subs);

        $subcategorias = Subcategory::whereIn('id', $sub_array)->get();
        
        return view('examen.report', compact('report', 'subcategorias'));
    }
    public function reportPDF(Report $report){
        $subs = $report->subcategorias;
        $sub_array = explode(",", $subs);
        $subcategorias = Subcategory::whereIn('id', $sub_array)->get();

        $pdf = PDF::loadView('examen.pdf', compact('report', 'subcategorias'));
        return $pdf->stream();
        
    }
}
