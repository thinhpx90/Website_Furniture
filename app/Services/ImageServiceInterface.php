<?php

namespace App\Services;

interface ImageServiceInterface
{
    public function Create($params);

    public function Delete($id);

    public function DeleteByProductId($productId);
}