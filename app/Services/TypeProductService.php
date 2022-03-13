<?php

namespace App\Services;

use App\Models\TypeProduct;

class TypeProductService implements TypeProductServiceInterface
{
    protected $typeProduct;

    /**
     * Undocumented function
     *
     * @param TypeProduct $typeProduct
     */
    public function __construct(TypeProduct $typeProduct)
    {
        $this->typeProduct = $typeProduct;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetListTypeProduct()
    {
        return $this->typeProduct->get();
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function CreateTypeProduct($params)
    {
        $this->typeProduct->create($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function GetDetailTypeProduct($id)
    {
        return $this->typeProduct->findOrFail($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param array $params
     * @return void
     */
    public function UpdateTypeProduct($id, $params)
    {
        $this->typeProduct->findOrFail($id)->update($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function DeleteTypeProduct($id)
    {
        $this->typeProduct->findOrFail($id)->delete();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetTypeProduct()
    {
        return $this->typeProduct->with('category')->get();
    }
}