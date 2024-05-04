<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statement extends Model
{
    use HasFactory;

    protected $fillable = [
        'statement',
        'statementImage',
        'subcategories_id'
    ];

    protected $guarded =[];
    protected $cascadeDeletes = ['questions'];


    public function questions():HasMany{
        
        return $this->hasMany(Question::class);
    }
    public function Subcategory():BelongsTo {
    
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    
    }
}
