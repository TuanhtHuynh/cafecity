<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll( $sort, $order, $size )
    {
        return Category::query()->orderBy( $sort, $order )->paginate( $size );
    }

    public function store( $category )
    {
        return Category::query()->create( $category );
    }

    public function findById( $id )
    {
        return Category::query()->where( 'id', $id )->firstOrFail();
    }

    public function findByName( $name )
    {
        return Category::query()->where( 'name', $name )->firstOrFail();
    }

    public function update( $request, $id )
    {
        $category = $this->findById( $id );
        return $category->update( $request );
    }

    public function delete( $id )
    {
        $category = $this->findById( $id );
        return $category->delete();
    }
}
