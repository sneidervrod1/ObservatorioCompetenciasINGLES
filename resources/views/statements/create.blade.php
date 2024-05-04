<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            CREAR ENUNCIADOS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('statements.save', ['sub' => $subcategory->id]) }}" >
                        @csrf
                        
                        
                        <p class="font-bold text-xl text-center"> {{ $subcategory->description }}  </p> 
                        
                        
                        <div class="text-base font-semibold mb-1 text-white mt-5">
                                @if ($errors->any())
                                <div class="bg-transparent text-left py-4 lg:px-4">
                                    <div class="p-2 bg-red-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                        role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <span class="font-semibold mr-2 text-left flex-auto"> {{ $error}} </span>
                                        @endforeach
                                    </ul>
                                </div>
                                </div>
                                <meta http-equiv="refresh" content="5">

                            @endif

                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <label>Escriba el enunciado (opcional) </label>
                                <input class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="textarea" name="statement">
                            </div>

                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <label>Imagen Enunciado (opcional) </label>
                                <input class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="statementImage">                        
                            </div>

                            <div class="invalid-feedback d-block">
                                @foreach ($errors->get('image') as $error)
                                     {{ $error }}
                                 @endforeach
                             </div>
                        </div>
                
                        <div class="mb-4">
                            <input type="submit" value="GUARDAR" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded"></input>
                        </div>
                    </form>
                    <div class=" mb-4">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href=" {{ route('statements.index') }}"> VOLVER </a>
                        </button>
                    </div>
                
                </div>
            </div>
        </div>
</x-app-layout>
