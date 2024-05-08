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

        

        $preguntas = Question::whereIn('id', array_keys($request->except('_token')))
            ->get(['id', 'correctAnswer', 'weightQuestions', 'statement_id'])
            ->keyBy('id')
            ->toArray();

        // Extraer las respuestas enviadas en el formulario
        $respuestasEnviadas = $request->except('_token');

        // Filtrar las preguntas donde la respuesta es correcta
        $preguntasResultado = collect($preguntas)->map(function ($pregunta) use ($respuestasEnviadas) {
            $preguntaId = $pregunta['id'];

            if (isset($respuestasEnviadas[$preguntaId])) {
                return [
                    'statement_id' => $pregunta['statement_id'],
                    'peso' => $pregunta['correctAnswer'] === $respuestasEnviadas[$preguntaId] ? $pregunta['weightQuestions'] : 0
                ];
            }

            return [
                
                'resultado' => 0
            ];
        })->toArray();

       
        
        // $sumaPorStatement = collect($preguntasResultado)->groupBy('statement_id')
        //     ->map(function ($group) {
        //         return $group->sum('peso');
        //     })
        //     ->toArray();

        // $statementIds = array_keys($sumaPorStatement);

        // $statements = Statement::whereIn('id', $statementIds)
        //     ->get(['id', 'subcategory_id'])
        //     ->keyBy('id')
        //     ->toArray();

        // $subcategories = Subcategory::whereIn('id', array_unique(array_column($statements, 'subcategory_id')))
        //     ->get()
        //     ->keyBy('id');

    //     $result = [];

    //     foreach ($statements as $statementId => $statement) {
    //         $subcategoryId = $statement['subcategory_id'];

    //         $sub = $subcategories->get($subcategoryId);

    //         if ($sub) {
    //             $totalWeight = isset($sumaPorStatement[$statementId]) ? $sumaPorStatement[$statementId] * (0.01) * $sub->weight_subcategory : 0;

    //             $result[$subcategoryId] = [
    //                 'id' => $statement['id'],
    //                 'subcategory_id' => $subcategoryId,
    //                 'SumPreguntas' => isset($sumaPorStatement[$statementId]) ? $sumaPorStatement[$statementId] : 0,
    //                 'TotalWeight' => $totalWeight,
    //                 'categoryLevel_id' => $sub->category_level_id
    //             ];
    //         }
    //     }

  

    //     $statementsAEstudiar = '';

    //     foreach ($result as $item) {
    //         if ($item['SumPreguntas'] != 100) {
    //             $statementsAEstudiar .= $item['subcategory_id'] . ',';
    //         }
    //     }
    //     $statementsAEstudiar = rtrim($statementsAEstudiar, ',');
     
    //     $sumByCategoryLevel = [];

    //     foreach ($result as $statement) {
    //         $categoryLevelId = $statement['categoryLevel_id'];

    //         if (isset($sumByCategoryLevel[$categoryLevelId])) {
    //             $sumByCategoryLevel[$categoryLevelId] += $statement['TotalWeight'];
    //         } else {
    //             $sumByCategoryLevel[$categoryLevelId] = $statement['TotalWeight'];
    //         }
    //     }

    // //   return $sumByCategoryLevel;
    //     $writting = 0;
    //     $listening = 0;
    //     $reading = 0;
    //     foreach ($sumByCategoryLevel as $id => $value) {
    //         $catLevel = CategoryLevel::where('id', $id )->get('category_id');
        
    //         $data = json_decode($catLevel, true);
    //         $levelId = $data[0]['category_id'];
    //         if ($levelId == 3) {
    //             $writting = $value;
                
    //         }
    //          if ($levelId == 2) {
    //             $listening = $value;
    //         }
    //         if ($levelId == 1) {
    //             $reading = $value;
    //         }
            
            
    //     }

    //         $uniqueCatLevelIds = array_unique(array_keys($sumByCategoryLevel));
    //         // return $uniqueCatLevelIds;

    //         $categoryLevel = categoryLevel::whereIn('id', $uniqueCatLevelIds)
    //             ->get()
    //             ->keyBy('id')
    //             ->toArray();

    //         // Suponiendo que $categorLevel y $sumByCategoryLevel son los arrays que proporcionaste
    //         $level = 0;
    //         foreach ($categoryLevel as $categoryId => &$category) {
    //             $categoriesIds = $category['id'];

    //             if (isset($sumByCategoryLevel[$categoriesIds])) {
    //                 $category['weight_category'] *= (0.01) * $sumByCategoryLevel[$categoriesIds];
    //             } else {
    //                 $category['weight_category'] = 0;
    //             }
    //             $level = $category['level_id'];
    //         }
    //         // return $categoryLevel;
          
    //         $sumafinal =0;
    //         foreach ($categoryLevel as $categoryId => &$category) {
    //             $sumafinal += $category['weight_category'];
    //         }
        
    //         // return $categoryLevel;
    //         $user = auth()->id();
           
    //         $report = new Report;
    //         $report->total = $sumafinal;
    //         $report->level = $level;
    //         $report->user = $user;
    //         $report->writting = $writting;
    //         $report->listening = $listening;
    //         $report->reading = $reading;
    //         $report->subcategorias = $statementsAEstudiar;
    //         $report->save();

                $report = new Report;
                $report->total = 2;
                $report->level = 1;
                $report->user = auth()->id();
                $report->writting = 50;
                $report->listening = 50;
                $report->reading = 50;
                $report->subcategorias = "1 , 2 , 3";
                $report->save();
            
            return redirect()->route('examen.confirmation')->with('success', 'Examen guardado correctamente');
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
