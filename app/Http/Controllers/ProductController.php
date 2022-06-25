<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function __construct( Product $product )
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->product->getAll( 'id', 'DESC' );
    }

    public function paginated( Request $request )
    {
        $sort = $request->input( 'sort', 'id' );
        $sort_direction = $request->input( 'order', 'desc' );
        $size = $request->input( 'size', 5 );

        $products = $this->product->getAll( $sort, $sort_direction, $size );

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
    public function store( ProductRequest $request )
    {
        $request->validated();
        $result = $this->product->store( $request );
        return $this->ResponseStore( $result );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
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
        $request->validated();
        $result = $this->product->findById( $id )->update( $request->all() );
        return $this->ResponseUpdate( $result );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $result = $this->product->findById( $id )->delete();

        return $this->ResponseDelete( $result, $id );
    }

    private function ResponseStore( $result )
    {
        return $result ? response()->json( ['message' => 'lỗi thêm sản phẩm'], 400 ) : response()->json( ['message' => 'đã thêm sản phẩm'], 201 );
    }

    private function ResponseUpdate( $result )
    {
        return $result ? response()->json( ['message' => 'lỗi cập nhật sản phẩm'], 400 ) : response()->json( ['message' => 'đã cập nhật thông tin sản phẩm'], 200 );
    }

    private function ResponseDelete( $result, $id )
    {
        return $result ? response()->json( ['message' => 'lỗi xoá sản phẩm ' . $id], 400 ) : response()->json( ['message' => 'đã xoá sản phẩm'], 200 );
    }
}
