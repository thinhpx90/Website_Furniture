<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Services\BillDetailServiceInterface;
use App\Services\BillServiceInterface;
use App\Services\TypeProductServiceInterface;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $typeProductService;
    protected $billService;
    protected $billDetailService;

    public function __construct(TypeProductServiceInterface $typeProductService, BillServiceInterface $billService, BillDetailServiceInterface $billDetailService)
    {
        $this->typeProductService = $typeProductService;
        $this->billService = $billService;
        $this->billDetailService = $billDetailService;
    }

    public function get()
    {
        return response()->json([Cart::content(), Cart::tax(), Cart::total()]);
    }

    public function add(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => 1,
            'price' => isset($request->promotion_price) && $request->promotion_price != 0 ? $request->unit_price - $request->unit_price*$request->promotion_price/100 : $request->unit_price,
            'weight' => 550,
            'options' => [
                'old_price' => isset($request->promotion_price) && $request->promotion_price != 0 ? $request->unit_price : null,
                'image' => $request->images[0]['image'],
                'category' => $request->category['name'],
            ],
        ]);

        // Carbon::setTestNow('2020-1-1');
        // $a = now();
        // dump($a);

        // // Carbon::setTestNow();
        // // dump(now());
        return response()->json([
            'mess' => 'Add success!'
        ]);
    }

    public function remove($id)
    {
        Cart::remove($id);
        return response()->json([
            'mess' => 'Add success!'
        ]);
    }

    public function checkout()
    {
        $data = [
            'cart' => Cart::content(),
            'tax' => Cart::tax(),
            'total' => Cart::total()
        ];
        $menu = $this->typeProductService->GetTypeProduct();
        return view('page.checkout', compact(['data', 'menu']));
    }

    public function delivery()
    {
        $data = [
            'cart' => Cart::content(),
            'tax' => Cart::tax(),
            'total' => Cart::total()
        ];
        $order_no = \rand(1000000000000, 9999999999999);
        $menu = $this->typeProductService->GetTypeProduct();
        return view('page.delivery', compact(['data', 'menu', 'order_no']));
    }

    public function payment(Request $request)
    {
        DB::beginTransaction();
        try {
            $bill = $this->billService->create([
                'order_no' => $request->order_no,
                'customer_id' => Auth::user()->id,
                'payment' => $request->payment,
                'status' => 0,
            ]);
            foreach (Cart::content() as $key => $value) {
                $this->billDetailService->create([
                    'bill_id' => $bill->id,
                    'product_id' => $value->id,
                    'quantity' => $value->qty,
                    'unit_price' => $value->price,
                ]);
            }
            DB::commit();
            Cart::destroy();
            return redirect()->route('page.receipt', $bill->id);
        } catch (Exception $ex) {
            DB::rollback();
            dd($ex);
            return redirect()->back()->withInput();
        }
    }

    public function receipt($id)
    {
        $bill_detail = $this->billService->getBillDetail($id);
        $menu = $this->typeProductService->GetTypeProduct();
        return view('page.receipt', compact(['bill_detail', 'menu']));
    }
}
