<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct( Category $category )
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = $this->category->getAll( 'id', 'DESC' );
        return response()->json( $categoryList, 200 );
    }

    public function paginated( Request $request )
    {
        $sort = $request->input( 'sort', 'id' );
        $sort_direction = $request->input( 'order', 'desc' );
        $size = $request->input( 'size', 5 );

        $categories = $this->category->getAll( $sort, $sort_direction, $size );

        return response()->json( [
            'sort'      => $sort,
            'direction' => $sort_direction,
            $categories,
        ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CategoryRequest $request )
    {
        $request->validated();
        $result = $this->category->store( $request->all() );
        return $this->ReponseStore( $result );
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
    public function update( CategoryRequest $request, $id )
    {
        $request->validated();
        $result = $this->category->findById( $id )->update( $request->all() );
        return $this->ReponseUpdate( $result );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $result = $this->category->findById( $id )->delete();
        return $this->ReponseDelete( $result, $id );
    }

    private function ReponseStore( $result )
    {
        return $result ? response()->json( ['message' => 'thêm thành công'], 200 ) : response()->json( ['message' => 'lỗi thêm'], 400 );
    }

    private function ReponseUpdate( $result )
    {
        return $result ? response()->json( ['message' => 'cập nhật thành công'], 200 ) : response()->json( ['message' => 'lỗi cập nhật'], 400 );
    }

    private function ReponseDelete( $result, $id )
    {
        return $result ? response()->json( ['message' => 'xoá thành công'], 200 ) : response()->json( ['message' => 'lỗi xoá ' . $id], 400 );
    }
}
