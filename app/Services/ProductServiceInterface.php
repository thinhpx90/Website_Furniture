<?php

namespace App\Services;

interface ProductServiceInterface
{
    public function GetListProduct($params);

    public function CreateProduct($params);

    public function GetDetail($id);

    public function UpdateProduct($id, $params);

    public function DeleteProduct($id);

    public function GetListHighLightProduct();

    public function GetBySlug($slug);
}