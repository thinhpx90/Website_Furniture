<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\CategoryServiceInterface;
use App\Services\ImageServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\SupplierServiceInterface;
use App\Services\TypeProductServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $typePruductService;
    protected $supplierService;
    protected $imageService;

    public function __construct(
        ProductServiceInterface $productService,
        CategoryServiceInterface $categoryService,
        TypeProductServiceInterface $typePruductService,
        SupplierServiceInterface $supplierService,
        ImageServiceInterface $imageService
    )
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->typePruductService = $typePruductService;
        $this->supplierService = $supplierService;
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        $categorys = $this->categoryService->GetAllCategory();
        $types = $this->typePruductService->GetListTypeProduct();
        $suppliers = $this->supplierService->GetListSupplier();
        $products = $this->productService->GetListProduct($request->all());
        $products->appends($request->all());
        // dd($products);
        return view('admin.product.index', compact(['products', 'categorys', 'types', 'suppliers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = $this->categoryService->GetAllCategory();
        $types = $this->typePruductService->GetListTypeProduct();
        $suppliers = $this->supplierService->GetListSupplier();
        return view('admin.product.create', compact(['categorys', 'types', 'suppliers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $slug = str_slug($request->name);
            $params = $request->all();
            $params['slug'] = $slug;
            $id = $this->productService->CreateProduct($params);

            if (count($request->images) > 0) {
                foreach ($request->images as $key=>$value) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $value)) {
                        $data = substr($value, strpos($value, ',') + 1);
                        $data = base64_decode($data);
                        $nameFile = sprintf('%s_%s.png', time(), $key);
                        Storage::disk('local')->put('public/uploads/' . $nameFile, $data);
                        $this->imageService->Create([
                            'product_id' => $id,
                            'image' => $nameFile,
                        ]);
                    }
                }
            }

            Session::flash('success', 'Thêm mới thành công!');
            DB::commit();
            return redirect()->route('product.index');
        } catch (Exception $ex) {
            dd($ex);
            DB::rollBack();
            Session::flash('error', 'Thêm mới không thành công!');
            return redirect()->route('product.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->productService->GetDetail($id);
        $categorys = $this->categoryService->GetAllCategory();
        $types = $this->typePruductService->GetListTypeProduct();
        $suppliers = $this->supplierService->GetListSupplier();
        //dd(Storage::url('uploads/' . $data->images[0]->image));
        return view('admin.product.edit', compact(['data', 'categorys', 'types', 'suppliers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $slug = str_slug($request->name);
            $params = $request->all();
            $params['slug'] = $slug;
            $this->productService->UpdateProduct($id, $params);

            if (isset($request->images)) {
                foreach ($request->images as $key=>$value) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $value)) {
                        $data = substr($value, strpos($value, ',') + 1);
                        $data = base64_decode($data);
                        $nameFile = sprintf('%s_%s.png', time(), $key);
                        Storage::disk('local')->put('public/uploads/' . $nameFile, $data);
                        $this->imageService->Create([
                            'product_id' => $id,
                            'image' => $nameFile,
                        ]);
                    }
                }
            }
            
            if (isset($request->delete_images)) {
                foreach ($request->delete_images as $value) {
                    $this->imageService->Delete($value);
                }
            }

            Session::flash('success', 'Cập nhật thành công!');
            DB::commit();
            return redirect()->route('product.index');
        } catch (Exception $ex) {
            DB::rollback();
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route('product.edit', $id);
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
            $this->productService->DeleteProduct($id);
            return response()->json([
                'message' => 'Xóa thành công'
            ]);
        } catch(Exception $ex) {
            return response()->json([
                'message' => 'Xóa không thành công'
            ]);
        }
    }
}
