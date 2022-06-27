<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $fillable = ['name', 'price', 'quantily', 'category_id'];

    public function category()
    {
        return $this->belongsTo( Category::class );
    }
}
