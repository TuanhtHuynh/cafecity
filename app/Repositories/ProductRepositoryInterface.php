<?php
namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAll( $sort, $order, $size );
    public function store( $product );
    public function findById( $id );
    public function findByName( $name );
    public function update( $request, $id );
    public function delete( $id );
}
