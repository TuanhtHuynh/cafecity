<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct( CategoryRepositoryInterface $categoryRepository )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $sort = $request->sort;
        $order = $request->order;
        $size = $request->size;

        $categories = $this->categoryRepository->getAll( $sort, $order, $size );

        return response()->json( ['categories' => $categories] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CategoryRequest $request )
    {
        try {
            $this->categoryRepository->store( $request->validated() );

            return response()->json( ['message' => 'đã thêm danh mục'], 201 );
        } catch ( Exception $error ) {
            return response()->json( ['message' => 'lỗi thêm danh mục'], 400 );
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
            $category = $this->categoryRepository->findById( $id );

            return response()->json( ['category' => $category] );
        } catch ( Exception $error ) {
            return response()->json( ['message' => 'khong tìm thấy ' . $id] );
        }
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
        $this->categoryRepository->update( $request->validated(), $id );

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
            $this->categoryRepository->delete( $id );
            return response()->json( ['message' => 'đã xoá'], 200 );
        } catch ( \Exception$error ) {
            return response()->json( ['message' => 'không tìm thấy ' . $id], 404 );
        }
    }
}
