<?php

namespace App\Services;

interface SupplierServiceInterface
{
    public function GetListSupplier();

    public function CreateSupplier($params);

    public function GetDetailSupplier($id);

    public function UpdateSupplier($params);

    public function DeleteSupplier($id);
}