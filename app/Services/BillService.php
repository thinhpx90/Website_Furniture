<?php

namespace App\Services;

use App\Models\Bill;

class BillService implements BillServiceInterface
{
    protected $bill;

    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function create($params)
    {
        return $this->bill->create($params);
    }

    public function getBillDetail($id)
    {
        return $this->bill->with(['billDetail', 'billDetail.product', 'billDetail.product.category', 'billDetail.product.images'])->findOrFail($id);
    }

    public function getBill($params)
    {
        $query = $this->bill->with('user');
        if (isset($params['status'])) {
            $query->where('status', $params['status']);
        }
        return $query->paginate();
    }

    public function update($id, $status)
    {
        $this->bill->findOrFail($id)->update($status);
    }
}
