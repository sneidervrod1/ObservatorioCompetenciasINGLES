<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamenController;
use App\Models\CategoryLevel;
use App\Models\Level;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/modelo', [ModeloController::class, 'mostrarmodelo'])->name('modelo');

Route::middleware('can:validation.crud')->group( function () {
    Route::get('/validation/lista', [ValidationController::class, 'listaCategorias'])->name('validation.lista');
    Route::get('/validation/create', [ValidationController::class, 'createCategorias'])->name('validation.crear');
    Route::post('/validation/create', [ValidationController::class, 'crearCategoriaValidacion'])->name('validation.guardarCrear');
    // actualizar validacion
    Route::get('/validation/actualizarValidacion/{valCate}', [ValidationController::class, 'actualizarValCate'])->name('validation.actualizarValidacionCate'); // FORM ACTUALIZAR SUBCATEGORIAS
    Route::put('/validation/actualizarValidacion/{valCate}', [ValidationController::class, 'guardarActualizarValCate'])->name('validation.guardarValidacionCate'); // ACT SUBCATEGORIAS
    
    Route::get('/validation/pesoValCate', [ValidationController::class, 'mostrarPesoValCate'])->name('validation.mostrarpesoValidacionCat'); // FORM ACTUALIZAR PESO SUBCATEGORIAS
    Route::put('/validation/actualizarPesoValCate', [ValidationController::class, 'actualizarPesoValCate'])->name('validation.guardarpesoValidacionCat'); // ACT PESO SUBCATEGORIAS
    Route::delete('/validation/eliminarCat/{catValidation}', [ValidationController::class,'eliminarCatValidacion'])->name('validation.eliminarCatValidation'); // ACT SUBCATEGORIAS
    
                                                    // CRUD PREGUNTAS VALIDACION
    Route::get('/validation/createQuestion/{validationCategory}', [ValidationController::class, 'createPregunta'])->name('validation.crearQuestion');
    Route::post('/validation/createQuestion/', [ValidationController::class, 'createPreguntasValidacion'])->name('validation.guardarQuestion');
    Route::get('/validation/actualizarPregunta/{quest}', [ValidationController::class, 'actualizarValQuest'])->name('validation.actualizarValidacionQuest');
    Route::put('/validation/actualizarPregunta/{quest}', [ValidationController::class, 'guardarActualizarValQuest'])->name('validation.guardarValidacionQuest'); 
    Route::delete('/validation/eliminarQuest/{quest}', [ValidationController::class,'eliminarQuestValidacion'])->name('validation.eliminarQuestValidation'); 
    Route::get('/validation/mostrarPesos/{catVal}', [ValidationController::class,'mostrarPesoQuestVal'])->name('validation.mostrarPesoQuestVal');
    Route::put('/validation/actualizarPesoQuest', [ValidationController::class, 'actualizarPesoQuestVal'])->name('validation.guardarpesoValidacionQuest'); 
    
});
Route::middleware('can:validation.examen')->group( function () {

    Route::get('/validation', [ValidationController::class, 'mostrar'])->name('validation.mostrar');
    Route::post('/validation', [ValidationController::class, 'recibir'])->name('validation.recibir');
    
});
Route::middleware('can:encuesta')->group( function () {                                                                                /* ROUTE ENCUESTAS */
    /* ROUTE PESO CATEGORIAS */
    Route::get('/encuesta', [EncuestaController::class, 'index'])->name('encuesta.index');
    Route::get('/encuesta/pesoNivel/{nivel}', [EncuestaController::class, 'peso'])->name('encuesta.pesoCategoria');
    Route::put('/encuesta/actualizar/{nivel}', [EncuestaController::class, 'actualizar'])->name('encuesta.actualizar');
    /* ROUTE CRUD SUBCATEGORIAS */
    Route::get('/encuesta/listaSub', [EncuestaController::class, 'indexSubcategoria'])->name('encuesta.listaSub'); //MOSTRAR SUBCATEGORIAS
    Route::get('/encuesta/crearSub/', [EncuestaController::class, 'createSubcategoria'])->name('encuesta.createSub'); // FORM CREAR SUBCATEGORIAS
    Route::post('/encuesta/guardarNewSub/', [EncuestaController::class, 'guardarSubcategoria'])->name('encuesta.guardarNewSub'); // GUARDAR EN BD SUBCATEGORIAS
    Route::get('/encuesta/pesoSub/{cateNivel}', [EncuestaController::class, 'pesoSub'])->name('encuesta.pesoSubcategoria'); // FORM ACTUALIZAR PESO SUBCATEGORIAS
    Route::put('/encuesta/actualizarPesoSub/{cateNivel}', [EncuestaController::class, 'actualizarPesoSub'])->name('encuesta.actualizarPesoSub'); // ACT PESO SUBCATEGORIAS
    Route::get('/encuesta/actualizarSub/{subcategoria}', [EncuestaController::class, 'actualizarSub'])->name('encuesta.actualizarSubcategoria'); // FORM ACTUALIZAR SUBCATEGORIAS
    Route::put('/encuesta/actualizarSub/{subcategoria}', [EncuestaController::class, 'guardarActualizarSub'])->name('encuesta.guardarActualizarSub'); // ACT SUBCATEGORIAS
    Route::delete('/encuesta/eliminarSub/{subcategoria}', [EncuestaController::class,'eliminarSub'])->name('encuesta.eliminarSub'); // ACT SUBCATEGORIAS
    /*ROUTES ENUNCIADOS --------------------------------- */
    Route::get('/statements', [StatementController::class, 'index'])->name('statements.index');//LISTA DE ENUNCIADOS GUARDADOS
    Route::get('/statements/create/{subcategory}',[StatementController::class,'create'])->name('statements.create');//PASA A FORMULARIO CREATE
    Route::post('/statements/save',[StatementController::class, 'save'])->name('statements.save');//GUARDA LO QUE RECIBE EL FORMULARIO
    Route::get('/statements/editar/{statement}',[StatementController::class, 'editar'])->name('statements.editar');//PASA AL FORM PARA EDITAR
    Route::put('/statements/edit/{statement}',[StatementController::class,'edit'])->name('statements.edit');
    Route::delete('/statements/delete/{statement}',[StatementController::class, 'delete'])->name('statements.delete');
    /*ROUTES PREGUNTAS --------------------------------- */ 
    Route::get('/questions/{statement}', [QuestionController::class, 'index'])->name('questions.index');//LISTA DE PREGUNTAS
    Route::get('questions/create/{statement}', [QuestionController::class,'create'])->name('questions.create');//PASA A FORMULARIO CREATE CON EL ID DEL ENUNCIADO
    Route::post('/questions/save', [QuestionController::class,'save'])->name('questions.save');
    Route::get('/questions/editar/{question}',[QuestionController::class, 'editar'])->name('questions.editar');//PASA AL FORM PARA EDITAR
    Route::put('/questions/edit/{question}',[QuestionController::class,'edit'])->name('questions.edit');
    Route::get('/questions/pesoSub/{statement}', [QuestionController::class, 'pesoSub'])->name('questions.peso'); // FORM ACTUALIZAR PESO SUBCATEGORIAS
    Route::put('/questions/actualizarPesoSub/{statement}', [QuestionController::class, 'actualizarPesoSub'])->name('questions.actPeso'); // ACT PESO SUBCATEGORIAS
    Route::delete('/questions/delete/{question}',[QuestionController::class, 'delete'])->name('questions.delete');
}); 
Route::middleware('can:examen')->group(function () {    
    Route::get('/examen', [ExamenController::class, 'ver'])->name('examen.index');
    Route::post('/examen/realizar', [ExamenController::class, 'realizar'])->name('examen.realizar');
    Route::post('/examen/save', [ExamenController::class, 'save'])->name('examen.save');
    Route::get('/examen/confirmation', [ExamenController::class, 'confirmation'])->name('examen.confirmation');    
}); 
Route::middleware('can:reporte')->group(function (){
    Route::get('/report', [ExamenController::class, 'reportList'])->name('report.index');
    Route::get('/report/detalle/{report}', [ExamenController::class, 'detalle'])->name('report.detalle');
    Route::get('/report/{report}', [ExamenController::class, 'reportPDF'])->name('report.pdf');

});

                                                            /* Routes AUTH */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
