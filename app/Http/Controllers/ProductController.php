<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    public function __construct( ProductRepositoryInterface $productRepository )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $sort = $request->input( 'sort', 'id' );
        $sort_direction = $request->input( 'order', 'desc' );
        $size = $request->input( 'size', 5 );

        $products = $this->productRepository->getAll( $sort, $sort_direction, $size );

        return response()->json( [
            'sort'      => $sort,
            'direction' => $sort_direction,
            $products,
        ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductRequest $productRequest )
    {
        try {
            $this->productRepository->store( $productRequest->validated() );
            return response()->json( [
                'message' => 'đã thêm sản phẩm',
            ], 201 );
        } catch ( \Exception$error ) {
            return response()->json( [
                'message' => 'lỗi thêm sản phẩm' . $error->getMessage(),
            ], 500 );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        try {
            $product = $this->productRepository->findById( $id );

            return response()->json( ['prouct' => $product], 200 );
        } catch ( \Exception$error ) {
            return response()->json( ['message' => 'lỗi thông tin sản phẩm ' . $id], 404 );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ProductRequest $request, $id )
    {
        try {
            $this->productRepository->update( $request->all(), $id );

            return response()->json( ['message' => 'đã cập nhật sản phẩm'], 200 );
        } catch ( \Exception$error ) {
            return response()->json( ['message' => 'lỗi cập nhật sản phẩm', $id], 500 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        try {
            $this->productRepository->delete( $id );
            return response()->noContent();
        } catch ( \Exception$error ) {
            return response()->json( ['message' => 'lỗi xoá ' . $id], 404 );
        }
    }
}
