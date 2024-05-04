<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ValidationCategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    protected $cascadeDeletes = ['validationQuestions'];

    public function validationQuestions(): HasMany{
        return $this->hasMany(ValidationQuestion::class);   
    }

}
