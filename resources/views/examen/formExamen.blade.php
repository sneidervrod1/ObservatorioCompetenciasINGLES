<x-app-layout>
    <x-slot name="header">
        <h2 class="font-mono font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
            EXAMEN
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100  font-mono">
                    <div class="container mx-auto p-4">
                        <div class="border-2 border-red-500 rounded p-4">
                            <h1 class="text-2xl font-semibold mb-4 ">Contador</h1>
                            <p class="mb-4">El contador se enviará automáticamente al llegar a cero.</p>
                            <p id="timer">El formulario se cerrará en:</p>
                        </div>
                        <div class="flex items-center">
                            <form id="formulario" action="{{ route('examen.save', ['level' => $level] ) }}" method="POST">
                                @csrf
                                @foreach ($cat as $item)
                                    @foreach ($item->subcategories as $sub)
                                        @forelse ($sub->statements as $statement)
                                            {{-- STATEMENT   --}}
                                            <h2 class="text-2xl text-center font-bold my-10"> Answer the questions agree
                                                with the rules </h2>
                                            @if ($statement->statement && $statement->statementImage)
                                                <div class="flex">
                                                    <div class="flex-1 p-2 border rounded place-content-center">
                                                        {!! $statement->statement !!}
                                                    </div>
                                                    <div class="flex-1 p-2 border rounded">
                                                        <img class="place-content-center"
                                                            src="{{ Storage::disk('s3')->url($statement->statementImage) }}">
                                                    </div>
                                                </div>
                                            @else
                                                @if ($statement->statement)
                                                    <div class="w-auto h-full ">
                                                        {!! $statement->statement !!}

                                                    </div>
                                                @endif
                                                @if ($statement->statementImage)
                                                    <div class="flex justify-center mb-3 mx-6 my-2">
                                                        <img class="h-auto w-auto place-content-center rounded"
                                                            src="{{ Storage::disk('s3')->url($statement->statementImage) }}">
                                                    </div>
                                                @endif
                                            @endif
                                            @foreach ($statement->questions as $question)
                                                <div class="flex">
                                                    <div
                                                        class="flex-1 p-2 border rounded min-w-[200px] max-w-[50%] mr-2">
                                                        {{-- Ajustando ancho del contenedor principal --}}
                                                        {{-- QUESTION   --}}
                                                        @if ($question->questionImage)
                                                            <div class="flex justify-center mb-1">
                                                                <img class="w-full h-auto"
                                                                    src="{{ Storage::disk('s3')->url($question->questionImage) }}">
                                                            </div>
                                                        @else
                                                            <p class="text-2xl">{{ $question->question }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="flex-1 p-2 border rounded">
                                                        <div class=""> {{-- Contenedor más pequeño para el select --}}
                                                            <select required name="{{ $question->id }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected value="">Seleccione una opcion</option> 
                                                                @for ($i = 1; $i <= $question->quantityOptions; $i++)
                                                                    <option value="{{ $letras[$i] }}">
                                                                        {{ $letras[$i] }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        @empty
                                            <p>NO HAY STATEMENTS</p>
                                        @endforelse
                                    @endforeach
                                @endforeach
                                <button
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                    <input  type="submit" value="ENVIAR EXAMEN">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
 
</x-app-layout>

<script>
    let tiempoRestante = localStorage.getItem('tiempoRestante') ? parseInt(localStorage.getItem('tiempoRestante')) : 1.5 * 60 * 60; // 1.5 horas en segundos

    let fechaCierre = new Date(new Date().getTime() + (tiempoRestante * 1000)); // Fecha de cierre basada en el tiempo restante

    const timerElemento = document.getElementById('timer');

    const actualizarTimer = () => {
        tiempoRestante = Math.max(0, Math.floor((fechaCierre - new Date()) / 1000)); // Actualizar el tiempo restante

        localStorage.setItem('tiempoRestante', tiempoRestante); // Guardar el tiempo restante en localStorage

        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            document.getElementById('formulario').submit(); // Envía el formulario automáticamente al finalizar el tiempo
            timerElemento.textContent = "El formulario está cerrado";
            document.getElementById('formulario').style.display = 'none'; // Opcional: oculta el formulario
        } else {
            const horas = Math.floor(tiempoRestante / 3600);
            const minutos = Math.floor((tiempoRestante % 3600) / 60);
            const segundos = tiempoRestante % 60;

            timerElemento.textContent = `El formulario se cerrará en: ${horas} horas, ${minutos} minutos y ${segundos} segundos`;
        }
    };

    const intervalo = setInterval(actualizarTimer, 1000); // Actualizar el timer cada segundo

    // Actualizar el timer al cargar la página
    actualizarTimer();

    
    const reiniciarTiempo = () => {
        tiempoRestante = 1.5 * 60 * 60; // Reiniciar el tiempo a 1.5 horas (5400 segundos)
        localStorage.setItem('tiempoRestante', tiempoRestante); // Guardar el nuevo tiempo restante en localStorage
        fechaCierre = new Date(new Date().getTime() + (tiempoRestante * 1000)); // Actualizar la fecha de cierre basada en el nuevo tiempo restante
    };

    document.getElementById('formulario').addEventListener('submit', function(event) {
        reiniciarTiempo(); // Reiniciar el tiempo
    });
</script>