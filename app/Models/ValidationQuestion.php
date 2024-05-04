<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValidationQuestion extends Model
{
    use HasFactory;

    public function ValidationCategory(): BelongsTo {
    
        return $this->belongsTo(ValidationCategory::class, 'validation_categories_id');
    
    }
}
