<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            EIDTAR PREGUNTAS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-around">
                        <span class="text-2xl font-semibold place-content-center">PREGUNTA ACTUAL : </span>
                             @if ($question->questionImage)
                                 <div class="rounded">
                                     <img class="h-auto w-full place-content-center" src="{{ Storage::disk('s3')->url($question->questionImage) }}">
                                 </div>
                             @else
                                 <p class="font-semibold text-base"> {{ $question->question }} </p>
                             @endif          
                     </div>
                    <form action="{{ route('questions.edit', $question->id) }}" method="POST" enctype="multipart/form-data">
                         
                        @csrf
                        @method('PUT')
                        
                       
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <label>Escriba el enunciado de la pregunta (Opcional).</label>

                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text"name="question" placeholder="{{ $question->question }}" value="{{  $question->question }}">
                        </div>

                        <div class="col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <label>Inserte la imagen de la Pregunta (Opcional).</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="file" name="questionImage" value="{{ $question->questionImage }}">
                        </div>
                        <div class="col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <label>Cantidad de respuestas:</label>
                            <input min="1" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="quantityOptions" value="{{$question->quantityOptions}}" >
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <label>Respuesta Correcta Seleccionada: </label>

                                <select name="correctAnswer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">        
                                    <option value="A" >A</option>
                                    <option value="B" >B</option>
                                    <option value="C" >C</option>
                                    <option value="D" >D</option>
                                    <option value="E" >E</option>
                                    <option value="F" >F</option>
                                    <option value="G" >G</option>
                                    <option value="H" >H</option>
                                    <option value="I" >I</option>
                                </select>    
                        </div>
                        <div class="bg-white dark:bg-gray-800  rounded mt-3">
                            <button class="bg-transparent hover:bg-green-600 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-600 hover:border-transparent rounded" ><input type="submit" value="MODIFICAR PREGUNTA"></button>        
                        </div>
                    </form>
                    <div class="text-base font-bold my-4 text-white">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href=" {{ route('questions.index', $question->statement_id) }}"> VOLVER AL ENUNCIADO</a> 

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
