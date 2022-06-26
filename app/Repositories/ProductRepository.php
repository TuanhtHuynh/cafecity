<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll( $sort, $order, $size )
    {
        return Product::query()->orderBy( $sort, $order )->paginate( $size );
    }

    public function store( $product )
    {
        return Product::query()->create( $product );
    }

    public function findById( $id )
    {
        return Product::query()->where( 'id', $id )->firstOrFail();
    }

    public function findByName( $name )
    {
        return Product::query()->where( 'name', $name )->firstOrFail();
    }

    public function update( $request, $id )
    {
        $product = $this->findById( $id );
        return $product->update( $request );
    }

    public function delete( $id )
    {
        $product = $this->findById( $id );
        return $product->delete();
    }
}
