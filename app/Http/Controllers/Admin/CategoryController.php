<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Services\CategoryServiceInterface;
use App\Services\TypeProductServiceInterface;
use Exception;
use Session;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $typeProductService;

    public function __construct(CategoryServiceInterface $categoryService, TypeProductServiceInterface $typeProductService)
    {
        $this->categoryService = $categoryService;
        $this->typeProductService = $typeProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->categoryService->GetListCategory($request->all());
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProduct = $this->typeProductService->GetListTypeProduct();
        return view('admin.category.create', compact('typeProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->categoryService->CreateCategory($request->all());
            Session::flash('success', 'Thêm mới thành công!');
            return redirect()->route('category.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Thêm mới không thành công!');
            return back()->flash('error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->GetDetailCategory($id);
        $typeProduct = $this->typeProductService->GetListTypeProduct();
        return view('admin.category.edit', compact('category', 'typeProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryService->UpdateCategory($id, $request->all());
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('category.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Cập nhật không thành công!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryService->DeleteCategory($id);
            //Session::flash('success', 'Xóa thành công!');
            return response()->json([
                'message' => 'Xóa thành công'
            ]);
        } catch (Exception $ex) {
            //Session::flash('error', 'Xóa không thành công!');
            return response()->json([
                'message' => 'Xóa không thành công'
            ]);
        }
    }
}
