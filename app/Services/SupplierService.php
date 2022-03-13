<?php

namespace App\Services;

use App\Models\Supplier;

class SupplierService implements SupplierServiceInterface
{
    protected $supplier;

    /**
     * Undocumented function
     *
     * @param Supplier $supplier
     */
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetListSupplier()
    {
        return $this->supplier->get();
    }

    public function CreateSupplier($params)
    {
        $this->supplier->create($params);
    }

    public function GetDetailSupplier($id)
    {
        return $this->supplier->findOrFail($id);
    }

    public function UpdateSupplier($params)
    {
        $this->supplier->findOrFail($params['id'])->update($params);
    }

    public function DeleteSupplier($id)
    {
        $this->supplier->findOrFail($id)->delete();
    }
}