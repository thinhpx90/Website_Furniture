<?php

namespace App\Services;

interface CategoryServiceInterface
{
    public function GetListCategory($params);

    public function CreateCategory($params);

    public function DeleteCategory($id);

    public function GetDetailCategory($id);

    public function UpdateCategory($id, $params);

    public function GetAllCategory();
}
