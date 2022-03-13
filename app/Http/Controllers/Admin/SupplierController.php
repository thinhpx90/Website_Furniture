<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Services\SupplierServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Session;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierServiceInterface $supplierService)
    {
        $this->supplierService = $supplierService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->supplierService->GetListSupplier();
        return view('admin.supplier.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        try {
            $this->supplierService->CreateSupplier($request->all());
            Session::flash('success', 'Thêm mới thành công!');
            return redirect()->route('supplier.index');
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
        $supplier = $this->supplierService->GetDetailSupplier($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        try {
            $this->supplierService->UpdateSupplier([
                'id' => $id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
            Session::flash('success', 'Sửa thành công!');
            return redirect()->route('supplier.index');
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
            $this->supplierService->DeleteSupplier($id);
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
