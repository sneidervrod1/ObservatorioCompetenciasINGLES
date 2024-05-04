<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Subcategory::create([
            'category_level_id' => '1',
            'description' => 'PUEDE comprender avisos, instrucciones o información básica.',
	        'weight_subcategory' => '30'
        ]);
        Subcategory::create([
            'category_level_id' => '1',
            'description' => 'PUEDE reconocer palabras, frases cortas, libros, objetos, juguetes, propagandas y lugares conocidos.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '1',
            'description' => 'PUEDE relacionar ilustraciones con oraciones simples.',
	        'weight_subcategory' => '35'
        ]);




        Subcategory::create([
            'category_level_id' => '2',
            'description' => 'PUEDE comprender instrucciones básicas o participar en una conversación objetiva básica sobre un tema predecible.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '2',
            'description' => 'PUEDE comprender preguntas sobre sí, su familia y entorno.',
	        'weight_subcategory' => '25'
        ]);
        Subcategory::create([
            'category_level_id' => '2',
            'description' => 'PUEDE identificar a las personas que participan en una conversación.',
	        'weight_subcategory' => '40'
        ]);




        Subcategory::create([
            'category_level_id' => '3',
            'description' => 'PUEDE completar formularios básicos con información personal.',
	        'weight_subcategory' => '25'
        ]);
        Subcategory::create([
            'category_level_id' => '3',
            'description' => 'PUEDE responder brevemente preguntas con "qué, quién, cuándo y dónde" si se refieren a su entorno más próximo.',
	        'weight_subcategory' => '25'
        ]);
        Subcategory::create([
            'category_level_id' => '3',
            'description' => 'PUEDE escribir notas que incluyan horas, fechas y lugares.',
	        'weight_subcategory' => '50'
        ]);




        Subcategory::create([
            'category_level_id' => '4',
            'description' => 'PUEDE comprender información sencilla dentro de un área conocida, como productos, carteles y libros de texto sencillos o informes sobre asuntos familiares.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '4',
            'description' => 'PUEDE ubicar en un texto lugares y momentos en donde suceden determinadas acciones.',
	        'weight_subcategory' => '15'
        ]);
        Subcategory::create([
            'category_level_id' => '4',
            'description' => 'PUEDE leer y comprender textos auténticos y sencillos sobre acontecimientos concretos asociados a tradiciones culturales que conoce.',
	        'weight_subcategory' => '50'
        ]);




        Subcategory::create([
            'category_level_id' => '5',
            'description' => 'PUEDE entender / expresar opiniones o requisitos simples en un contexto familiar.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '5',
            'description' => 'PUEDE identificar los nombres de los personajes y los eventos principales de un cuento leído apoyado en imágenes, videos o cualquier tipo de material visual.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '5',
            'description' => 'PUEDE identificar objetos, personas y acciones que me son conocidas en un texto descriptivo corto.',
	        'weight_subcategory' => '30'
        ]);




        Subcategory::create([
            'category_level_id' => '6',
            'description' => 'PUEDE completar formularios y escribir cartas o postales breves y sencillas relacionadas con información personal.',
	        'weight_subcategory' => '30'
        ]);
        Subcategory::create([
            'category_level_id' => '6',
            'description' => 'PUEDE enlazar frases y oraciones usando conectores que expresan secuencia y adición.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '6',
            'description' => 'PUEDE usar adecuadamente estructuras y patrones gramaticales de uso frecuente.',
	        'weight_subcategory' => '35'
        ]);




        Subcategory::create([
            'category_level_id' => '7',
            'description' => 'PUEDE comprender información y artículos de rutina, y el significado general de información no rutinaria dentro de un área familiar.',
	        'weight_subcategory' => '45'
        ]);
        Subcategory::create([
            'category_level_id' => '7',
            'description' => 'PUEDE identificar la recurrencia de ideas en un mismo texto.',
	        'weight_subcategory' => '45'
        ]);
        Subcategory::create([
            'category_level_id' => '7',
            'description' => 'PUEDE diferenciar la estructura organizativa de textos descriptivos, narrativos y argumentativos.',
	        'weight_subcategory' => '10'
        ]);




        Subcategory::create([
            'category_level_id' => '8',
            'description' => 'PUEDE expresar opiniones o requisitos simples en un contexto familiar.',
	        'weight_subcategory' => '55'
        ]);
        Subcategory::create([
            'category_level_id' => '8',
            'description' => 'PUEDE identificar ideas geneales específicas en textos orales, si se tiene conocimiento del tema y del vocabulario utilizado.',
	        'weight_subcategory' => '35'
        ]);
        Subcategory::create([
            'category_level_id' => '8',
            'description' => 'PUEDE reconocer los elementos del enlace de un texto oral para identificar su secuencia.',
	        'weight_subcategory' => '10'
        ]);




        Subcategory::create([
            'category_level_id' => '9',
            'description' => 'PUEDE escribir cartas o tomar notas sobre asuntos familiares o predecibles.',
	        'weight_subcategory' => '20'
        ]);
        Subcategory::create([
            'category_level_id' => '9',
            'description' => 'PUEDE organizar párrafos coherentes cortos, teniendo en cuenta elementos formales del lenguaje como ortografía y puntuación.',
	        'weight_subcategory' => '20'
        ]);
        Subcategory::create([
            'category_level_id' => '9',
            'description' => 'PUEDE describir experiencias y acontecimientos , sueños, esperanzas y ambiciones además de dar brevemente razones y explicaciones de opiniones y planes.',
	        'weight_subcategory' => '60'
        ]);




        Subcategory::create([
            'category_level_id' => '10',
            'description' => 'PUEDE analizar textos para extraer información relevante.',
	        'weight_subcategory' => '25'
        ]);
        Subcategory::create([
            'category_level_id' => '10',
            'description' => 'PUEDE comprender ideas principales de textos complejos sobre temas concretos y abstractos, incluídas discusiones técnicas en su campo de especialización.',
	        'weight_subcategory' => '20'
        ]);
        Subcategory::create([
            'category_level_id' => '10',
            'description' => 'PUEDE comprender instrucciones o consejos detallados.',
	        'weight_subcategory' => '55'
        ]);




        Subcategory::create([
            'category_level_id' => '11',
            'description' => 'PUEDE seguir charlas sobre temas familiares y  mantener una conversación sobre una gama bastante amplia gama de temas.',
	        'weight_subcategory' => '30'
        ]);
        Subcategory::create([
            'category_level_id' => '11',
            'description' => 'PUEDE interactuar con cierto grado de fluidez y espontaneidad haciendo posible la interacción con hablantes nativos sin tensión por ninguna de las dos partes.',
	        'weight_subcategory' => '15'
        ]);
        Subcategory::create([
            'category_level_id' => '11',
            'description' => 'PUEDE dar charlas sobre temas conocidos haciéndose entender y comprendiendo las respuestas de la otra parte en la conversación.',
	        'weight_subcategory' => '55'
        ]);



        Subcategory::create([
            'category_level_id' => '12',
            'description' => 'PUEDE tomar notas mientras alguien habla o escribir una carta que incluya solicitudes no estándar.',
	        'weight_subcategory' => '40'
        ]);
        Subcategory::create([
            'category_level_id' => '12',
            'description' => 'PUEDE producir textos claros y detallados sobre una amplia gama de temas y explicar un punto de vista sobre un tema de actualidad.',
	        'weight_subcategory' => '20'
        ]);
        Subcategory::create([
            'category_level_id' => '12',
            'description' => 'PUEDE redactar textos que expresen opiniones sobre una amplia gama de temas presentando sus ventajas y desventajas.',
	        'weight_subcategory' => '40'
        ]);




        Subcategory::create([
            'category_level_id' => '13',
            'description' => 'PUEDE leer lo suficientemente rápido como para hacer frente a una curso académico, y para leer los medios de comunicación.',
	        'weight_subcategory' => '50'
        ]);
        Subcategory::create([
            'category_level_id' => '13',
            'description' => 'PUEDE realizar lecturas en busca de información o comprender correspondencia no estándar.',
	        'weight_subcategory' => '40'
        ]);
        Subcategory::create([
            'category_level_id' => '13',
            'description' => 'PUEDE comprender una amplia gama de textos extensos y exigentes, y reconocer sus significados implícitos.',
	        'weight_subcategory' => '10'
        ]);




        Subcategory::create([
            'category_level_id' => '14',
            'description' => 'PUEDE contribuir eficazmente a las reuniones y seminarios dentro de su propia área de trabajo.',
	        'weight_subcategory' => '80'
        ]);
        Subcategory::create([
            'category_level_id' => '14',
            'description' => 'PUEDE mantener una conversación informal con un buen grado de fluidez, manejando de expresiones abstractas.',
	        'weight_subcategory' => '10'
        ]);
        Subcategory::create([
            'category_level_id' => '14',
            'description' => 'PUEDE utilizar el lenguaje de forma flexible y eficaz con fines sociales, académicos y profesionales.',
	        'weight_subcategory' => '10'
        ]);




        Subcategory::create([
            'category_level_id' => '15',
            'description' => 'PUEDE preparar/redactar correspondencia profesional y tomar notas razonablemente precisas en reuniones.',
	        'weight_subcategory' => '15'
        ]);
        Subcategory::create([
            'category_level_id' => '15',
            'description' => 'PUEDE producir textos claros, bien estructurados y detallados sobre temas complejos, mostrando el uso controlado de patrones organizaivos, conectores y dispositivos de cohesión.',
	        'weight_subcategory' => '15'
        ]);
        Subcategory::create([
            'category_level_id' => '15',
            'description' => 'PUEDE escribir un ensayo que demuestre su capacidad para comunicar.',
	        'weight_subcategory' => '70'
        ]);




        Subcategory::create([
            'category_level_id' => '16',
            'description' => 'PUEDE entender documentos, correspondencia e informes, incluídos los detalles más finos de textos complejos.',
	        'weight_subcategory' => '40'
        ]);
        Subcategory::create([
            'category_level_id' => '16',
            'description' => 'PUEDE comprender prácticamente todo lo que lee.',
	        'weight_subcategory' => '30'
        ]);
        Subcategory::create([
            'category_level_id' => '16',
            'description' => 'PUEDE resumir información de fuentes escritas, reconstruyento argumentos y relatos en una presentación coherente.',
	        'weight_subcategory' => '30'
        ]);



        Subcategory::create([
            'category_level_id' => '17',
            'description' => 'PUEDE asesorar o hablar sobre temas complejos o temas delicados, comprender referencias coloquiales y abordar con confianza preguntas hostiles.',
	        'weight_subcategory' => '10'
        ]);
        Subcategory::create([
            'category_level_id' => '17',
            'description' => 'PUEDE expresarse de maneraa espontánea, muy fluída y precisa, diferenciando matices más finos de significado, inclusoen las situaciones más complejas.',
	        'weight_subcategory' => '70'
        ]);
        Subcategory::create([
            'category_level_id' => '17',
            'description' => 'PUEDE comprender prácticamente todo lo que oye.',
	        'weight_subcategory' => '20'
        ]);




        Subcategory::create([
            'category_level_id' => '18',
            'description' => 'PUEDE escribir cartas sobre cualquier tema y notas completas de reuniones o seminarios con buena expresión y precisión.',
	        'weight_subcategory' => '25'
        ]);
        Subcategory::create([
            'category_level_id' => '18',
            'description' => 'PUEDE resumir información de fuentes escritas, reconstruyento argumentos y relatos en una presentación coherente.',
	        'weight_subcategory' => '10'
        ]);
        Subcategory::create([
            'category_level_id' => '18',
            'description' => 'PUEDE redactar informes con coherencia usando elementos literarios complejos.',
	        'weight_subcategory' => '65'
        ]);
    }
}
