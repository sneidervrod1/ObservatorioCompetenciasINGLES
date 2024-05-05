<?php

namespace Database\Seeders;

use App\Models\ValidationQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
class ValidationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ValidationQuestion::create([
            'description' => '¿Considera usted que el modelo de competencias de inglés sería útil para medir su nivel en las competencias del idioma?',
            'validation_category_id' => '1',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Cree que el modelo de competencias lingüísticas de inglés mejoraría su eficiencia en la tarea de conocer su nivel del idioma?',
            'validation_category_id' => '1',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿En qué grado se considera usted de acuerdo con el uso del examen basado en el modelo de competencias de inglés para reemplazar los exámenes de medición comerciales como Cambridge o IELTS?',
            'validation_category_id' => '1',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿En qué grado estaría usted de acuerdo con realizar exámenes de inglés utilizando el modelo de competencias mostrado en el proyecto?',
            'validation_category_id' => '1',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿En qué grado se considera usted de acuerdo con que la implementación del Modelo de competencias de inglés represente una mejoría en el aprendizaje y dominio del idioma inglés?',
            'validation_category_id' => '1',
            'weight_validation_question' => '20'
        ]);
        //

        ValidationQuestion::create([
            'description' => '¿Considera usted que la aplicación es intuitiva, de fácil uso y comprensión?',
            'validation_category_id' => '2',
            'weight_validation_question' => '17'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Considera usted que para el propósito de la aplicación las instrucciones son claras y concisas?',
            'validation_category_id' => '2',
            'weight_validation_question' => '9'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Considera que la aplicación es fácil de usar, incluso si no tiene experiencia con aplicaciones educativas en línea?',
            'validation_category_id' => '2',
            'weight_validation_question' => '14'
        ]);
        
        ValidationQuestion::create([
            'description' => 'Según la escala determinada, a usted como usuario la aplicación le será de fácil uso. ',
            'validation_category_id' => '2',
            'weight_validation_question' => '4'
        ]);
        
        ValidationQuestion::create([
            'description' => 'Según la escala determinada, usted como usuario necesitará ayuda para utilizarlo.',
            'validation_category_id' => '2',
            'weight_validation_question' => '56'
        ]);
        //

        ValidationQuestion::create([
            'description' => '¿Cree usted que la aplicación es estimulante e interesante de usar?',
            'validation_category_id' => '3',
            'weight_validation_question' => '20'
        ]);
        ValidationQuestion::create([
            'description' => '¿Qué tan motivado se siente para utilizar la aplicación en comparación con otros métodos de evaluación de habilidades en inglés?',
            'validation_category_id' => '3',
            'weight_validation_question' => '20'
        ]);
        ValidationQuestion::create([
            'description' => '¿Después de haber usado la aplicación, ¿cree que la usaría con frecuencia con el fin de evaluar nuevamente las competencias lingüísticas en inglés?',
            'validation_category_id' => '3',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿En general, recomendaría esta aplicación a otros interesados en mejorar sus habilidades en inglés?',
            'validation_category_id' => '3',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Cómo calificaría la experiencia global de uso de la aplicación en términos de satisfacción personal?',
            'validation_category_id' => '3',
            'weight_validation_question' => '20'
        ]);
        //

        ValidationQuestion::create([
            'description' => '¿Considera que la aplicación proporciona una retroalimentación útil para mejorar en las competencias lingüísticas en inglés? ',
            'validation_category_id' => '4',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Estaría dispuesto a utilizar la aplicación en lugar de otros métodos tradicionales para evaluar su nivel de inglés? (IU)',
            'validation_category_id' => '4',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Usaría con frecuencia la aplicación para practicar y evaluar sus habilidades en inglés? (IU)',
            'validation_category_id' => '4',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Qué tan probable es que utilice la aplicación como su principal herramienta para mejorar su nivel de inglés en el futuro? (IU)',
            'validation_category_id' => '4',
            'weight_validation_question' => '20'
        ]);
        
        ValidationQuestion::create([
            'description' => '¿Cómo evaluaría su nivel de confianza en el uso de la aplicación para medir y mejorar sus habilidades en inglés a largo plazo? (IU)',
            'validation_category_id' => '4',
            'weight_validation_question' => '20'
        ]);
        

    }
}
