<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    
    
    use HasFactory;
    protected  $guarded = [];

    protected $cascadeDeletes = ['statements'];

    public function categoryLevels(): BelongsTo {
    
        return $this->belongsTo(CategoryLevel::class);
    
    }
    public function statements(): HasMany {
    
        return $this->hasMany(Statement::class);
    
    }
}
