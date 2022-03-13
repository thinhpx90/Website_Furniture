<?php

namespace App\Services;

interface TypeProductServiceInterface
{
    public function GetListTypeProduct();

    public function CreateTypeProduct($params);

    public function GetDetailTypeProduct($id);

    public function UpdateTypeProduct($id, $params);

    public function DeleteTypeProduct($id);

    public function GetTypeProduct();
}
