<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryLevel extends Model{
    use HasFactory;
    protected $table = 'category_level';
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategories(): HasMany {
    
        return $this->hasMany(Subcategory::class);
    }
    

}
