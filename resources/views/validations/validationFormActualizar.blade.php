<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            MODIFICAR VALIDACION 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('validation.guardarValidacionCate', ['valCate' => $valCate->id])}}" method="post">       
                        @csrf    
                        @method('PUT')   
                     
                        <div class="mb-4">
                            <label for="first_name"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Modifique la descripcion de la cateogria</label>
                            <input type="text" name="description" required placeholder="{{ $valCate->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>
                                
                       

                        <div class="mb-3">
                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                <input type="submit" value="ENVIAR">
                            </button>
                        </div>
                    </form>
                    <button
                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                    <a href=" {{ route('validation.lista') }}">VOLVER</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
