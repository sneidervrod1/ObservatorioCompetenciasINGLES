    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
                Formulario de Validación TAM
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                            <form action=" {{ route('validation.recibir') }}" method="POST">
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Completo: </label>
                                    <input type="text" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materia que esta cursando: </label>
                                    <input type="text" name="curso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo estudiantil: </label>
                                    <input type="text" name="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                                </div>
                                {{ csrf_field() }}

                                @foreach ($catVal as $category)
                                    <h3 class="mb-4 text-center font-bold">{{ $category->description }}</h3>
                                    @foreach ($category->validationQuestions as $quest)
                                        <label for="pregunta1" class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $quest->description }}</label>
                                        <select required name="{{ $quest->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            {{-- <option selected value="">Seleccione una opcion</option>  --}}
                                            <option value="100">Totalmente de acuerdo</option>
                                            <option value="75">De acuerdo </option>
                                            <option value="50">Ni de acuerdo ni en desacuerdo </option>
                                            <option value="25">En desacuerdo</option>
                                            <option value="0">Totalmente en desacuerdo</option>
                                            
                                        </select>
                            
                                    @endforeach
                                    

                                @endforeach
                                
                        

                                <input class="mt-5 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="submit" value="Enviar"/>
                            </form>          
                    </div>
                </div>  
            </div>
        </div>
    </x-app-layout>