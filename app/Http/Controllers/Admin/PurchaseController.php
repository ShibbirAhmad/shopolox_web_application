<?php

namespace App\Http\Controllers\Admin;

use App\Models\Debit;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use App\Models\SupplierPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase= Purchase::get();
        return view('admin.purchase.index',compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::get();
        $html = view('admin.purchase.create',compact('suppliers'))->render();
        return response()->json([
            'html' => $html ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'invoice_no' => 'required',
            'total' => 'required',
        ]);

        if (!$validator->fails()) {
        $product= Product::where('code',$request->product_code)->first();
        if (!empty($product)) {
            DB::transaction(function() use($request,$product){
                //first save the purchase information
                $purchase = new Purchase();
                $purchase->supplier_id = $request->supplier_id;
                $purchase->invoice_no = $request->invoice_no;
                $purchase->total = $request->total;
                $purchase->paid = $request->paid ?? 0;
                if($request->hasFile('memo')){
                    $path=$request->file('memo')->store('file/purchase_memo', 'public');
                    $purchase->file=$path;
                }
                $purchase->save();
                //save the purchase item
                $product->stock = $product->stock + $request->quantity;
                $product->save();
                //save purchase item
                $p_item = new PurchaseItem();
                $p_item->purchase_id = $purchase->id;
                $p_item->product_id = $product->id;
                $p_item->price = $request->price;
                $p_item->quantity = $request->quantity;
                $p_item->save();
                   //save a supplier paid amount 
                if($purchase->paid>0){
                    $supplier_payment=new SupplierPayment();
                    $supplier_payment->supplier_id=$request->supplier_id;
                    $supplier_payment->amount=$request->paid;
                    $supplier_payment->balance_id=$request->balance_id;
                    $supplier_payment->save();

                    //create a debit  
                    $debit = new Debit();
                    $debit->purpose = "Product Purchase ";
                    $debit->balance_id=$request->balance_id;
                    $debit->amount = $request->paid;
                    $debit->comment = "product purchase paid '$request->paid'";
                    $debit->insert_admin_id=session()->get('admin')['id'];
                    $debit->save();
            
                }

            });

            return response()->json([
                'status' => "OK",
                'message' => 'purchased successfully',
            ]);

        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' =>  " this product doesn't exist " ,
            ]); 
        }
            
        }else{

            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
