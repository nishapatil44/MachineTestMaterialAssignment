<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material;

class InwardOutwardMaster extends Model
{
    use HasFactory;
    public $fillable = ['category_id','material_id','quantity','entry_date'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
