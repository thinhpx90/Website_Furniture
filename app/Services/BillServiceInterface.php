<?php

namespace App\Services;

interface BillServiceInterface
{
    public function create($params);

    public function getBillDetail($id);

    public function getBill($params);

    public function update($id, $status);
}
