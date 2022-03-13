<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeProductRequest;
use Illuminate\Http\Request;
use App\Services\TypeProductServiceInterface;
use Exception;
use Session;

class TypeProductController extends Controller
{
    protected $typeProductService;

    public function __construct(TypeProductServiceInterface $typeProductService)
    {
        $this->typeProductService = $typeProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->typeProductService->GetListTypeProduct();
        return view('admin.type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeProductRequest $request)
    {
        try {
            $fileNameWithExtention = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('public/uploads', $filenametostore);
            $this->typeProductService->CreateTypeProduct([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $filenametostore,
            ]);
            Session::flash('success', 'Thêm mới thành công!');
            return redirect()->route('type_product.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Thêm mới không thành công!');
            return back();
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
        $typeProduct = $this->typeProductService->GetDetailTypeProduct($id);
        return view('admin.type.edit', compact('typeProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeProductRequest $request, $id)
    {
        try {
            if (isset($request->image)) {
                $fileNameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenametostore = $fileName.'_'.time().'.'.$extension;
                $request->file('image')->storeAs('public/uploads', $filenametostore);
                $this->typeProductService->UpdateTypeProduct($id, [
                    'name' => $request->name,
                    'description' => $request->description,
                    'image' => $filenametostore,
                ]);
            } else {
                $this->typeProductService->UpdateTypeProduct($id, $request->all());
            }
            Session::flash('success', 'Sửa thành công!');
            return redirect()->route('type_product.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Sửa không thành công!');
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
            $this->typeProductService->DeleteTypeProduct($id);
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
