<?php

namespace App\Services;

use App\Models\BillDetail;

class BillDetailService implements BillDetailServiceInterface
{
    protected $billDetail;

    public function __construct(BillDetail $billDetail)
    {
        $this->billDetail = $billDetail;
    }

    public function create($params)
    {
        $this->billDetail->create($params);
    }
}
