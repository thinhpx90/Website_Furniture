<?php

namespace App\Services;

use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    protected $product;

    /**
     * Undocumented function
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Undocumented function
     *
     * @param [type] $params
     * @return void
     */
    public function GetListProduct($params)
    {
        $query = $this->product->orderBy('id');
        if (isset($params['search']) && $params['search'] != null) {
            $query->where('name', 'like', '%'. $params['search'] .'%');
        }
        if (isset($params['category']) && $params['category'] != null) {
            $query->where('category_id', $params['category']);
        }
        if (isset($params['type']) && $params['type'] != null) {
            $query->where('type_product_id', $params['type']);
        }
        if (isset($params['supplier']) && $params['supplier'] != null) {
            $query->where('supplier_id', $params['supplier']);
        }
        if (isset($params['min']) && $params['min'] != null) {
            $query->where('unit_price', '>=', $params['min']);
        }
        if (isset($params['max']) && $params['max'] != null) {
            $query->where('unit_price', '<=', $params['max']);
        }
        return $query->with(['category', 'typeProduct', 'images', 'supplier'])->paginate();
    }

    /**
     * Undocumented function
     *
     * @param [type] $params
     * @return void
     */
    public function CreateProduct($params)
    {
        return $this->product->create($params)->id;
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function GetDetail($id)
    {
        return $this->product->with(['category', 'typeProduct', 'images', 'supplier'])->findOrFail($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param array $params
     * @return void
     */
    public function UpdateProduct($id, $params)
    {
        $this->product->findOrFail($id)->update($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function DeleteProduct($id)
    {
        $this->product->findOrFail($id)->delete();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetListHighLightProduct()
    {
        return $this->product->with(['category', 'typeProduct', 'images', 'supplier'])->limit(6)->get();
    }

    /**
     * Undocumented function
     *
     * @param string $slug
     * @return void
     */
    public function GetBySlug($slug)
    {
        return $this->product->with(['category', 'typeProduct', 'images', 'supplier'])->where('slug', $slug)->first();
    }
}
