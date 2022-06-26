<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y,',
    ];

    public function products()
    {
        return $this->hasMany( Product::class );
    }

    public function getAll( $sort, $sort_direction, $perpage = 5 )
    {
        return $this->query()->withCount( 'category' )->orderBy( $sort, $sort_direction )->paginate( $perpage );
    }

    public function store( $request )
    {
        return $this->query()->create( $request );
    }

    public function findById( $id )
    {
        return $this->query()->findOrFail( $id );
    }

    public function findBySlug( $slug )
    {
        return $this->query()->where( 'slug', $slug );
    }
}
