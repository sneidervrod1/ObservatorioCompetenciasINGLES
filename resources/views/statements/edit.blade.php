<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            EDITAR ENUNCIADO 
        </h2>
    </x-slot>
    </br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-around">
                    <span class="text-2xl font-semibold text-center place-content-center">ENUNCUADO ACTUAL : </span>
                    @if ($statement->statementImage)
                        <div class="rounded">
                            <img class="h-56 place-content-center" src="{{ Storage::disk('s3')->url($statement->statementImage) }}">
                        </div>
                    @endif
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-around">
                    <span class="text-2xl font-semibold text-center place-content-center">ENUNCUADO ACTUAL : </span>
                    @if ($statement->statement)  
                        <div> {!! $statement->statement !!} </div>
                    @endif   
                </div>
                                
                 
                <form method="POST" action="{{ route('statements.edit', $statement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <label>Escriba el enunciado (opcional) </label>
                        <input class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="textarea" name="statement">
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <label>Imagen Enunciado (opcional) </label>
                        <input class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="statementImage">                        
                    </div>

                    <div class="mx-6 mb-4">
                        <input type="submit" value="GUARDAR"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"></input>
                    </div>
                </form>
            </div>
            <div class="mx-6 mb-4">
                <button
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    <a href=" {{ route('statements.index') }}"> VOLVER </a>
                </button>
            </div>
        </div>
    </div>
    
</x-app-layout>
