<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BillServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->billService = $billService;
    }

    public function index(Request $request)
    {
        $data = $this->billService->getBill($request->all());
        $data->appends($request->all());
        // dd($data);
        return view('admin.order.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->billService->update($id, $request->all());
    }

    public function detail($id)
    {
        $data = $this->billService->getBillDetail($id);
        return view('admin.order.detail', compact('data'));
    }
}
