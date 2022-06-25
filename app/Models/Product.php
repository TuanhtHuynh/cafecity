<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function getAll( $sort, $sort_direction, $perpage = 5 )
    {
        return $this->query()->orderBy( $sort, $sort_direction )->paginate( $perpage );
    }

    public function store( $request )
    {
        return $this->query()->create( $request );
    }

    public function findById( $id )
    {
        return $this->query()->findOrFail( $id );
    }
}
