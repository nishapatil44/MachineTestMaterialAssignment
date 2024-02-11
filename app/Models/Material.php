<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    public $fillable = ['name','category_id','opening_balance'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function iomaster()
    {
        return $this->hasMany(InwardOutwardMaster::class);
    }
}
