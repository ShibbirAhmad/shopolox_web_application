<?php

namespace App\Http\Controllers\Admin;

use App\Models\Debit;
use App\Models\Credit;
use App\Models\Balance;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use App\Models\SupplierPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $purchases= Purchase::orderBy('id','desc')->with('supplier')->paginate(20);
        return view('admin.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::where('status',1)->get();
        $balances = Balance::all();
        $html = view('admin.purchase.create',compact('suppliers','balances'))->render();
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
            'balance_id' => 'required',
        ]);

        if (!$validator->fails()) {
        $product= Product::where('code',$request->product_code)->first();
        if (!empty($product)) {
            DB::transaction(function() use($request,$product){
                //first save the purchase information
                $purchase = new Purchase();
                $purchase->supplier_id = $request->supplier_id;
                $purchase->balance_id = $request->balance_id;
                $purchase->invoice_no = $request->invoice_no;
                $purchase->total = $request->total;
                $purchase->paid = $request->paid ?? 0;
                if($request->hasFile('memo')){
                    $path=$request->file('memo')->store('file/purchase_memo', 'public');
                    $purchase->memo=$path;
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
                    $debit->insert_admin_id= Auth::user()->id;
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
        $purchase = Purchase::with('purchase_item.product')->findOrFail($id);
        $suppliers= Supplier::where('status',1)->get();
        $balances = Balance::all();
        $html = view('admin.purchase.edit', compact('purchase','suppliers','balances'))->render();

        return response()->json([
            'html' => $html,
        ]);
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
        
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'invoice_no' => 'required',
            'total' => 'required',
            'balance_id' => 'required',
        ]);

        if (!$validator->fails()) {
        $product= Product::where('code',$request->product_code)->first();
        if (!empty($product)) {
            DB::transaction(function() use($request,$id,$product){
                //first save the purchase information
                $purchase = Purchase::findOrFail($id);
                $purchase->supplier_id = $request->supplier_id;
                $purchase->invoice_no = $request->invoice_no;
                $purchase->total = $request->total;
                $purchase->paid = $request->paid ?? 0;
                if($request->hasFile('memo')){
                    $path=$request->file('memo')->store('file/purchase_memo', 'public');
                    $purchase->memo=$path;
                }
                $purchase->save();
                //save the purchase item
                $purchase_item=PurchaseItem::where('purchase_id',$id)->first();
                $product->stock = (($product->stock + $request->quantity) - $purchase_item->quantity ) ;
                $product->save();
                //save purchase item
                $purchase_item->product_id = $product->id;
                $purchase_item->price = $request->price;
                $purchase_item->quantity = $request->quantity;
                $purchase_item->save();
                //restore debit amount
                $credit= new Credit() ;
                $credit->date=date('Y-m-d');
                $credit->purpose="product purchase";
                $credit->comment="product purchase amount is restored";
                $credit->balance_id=$purchase->balance_id;
                $credit->insert_admin_id=Auth::user()->id;
                $credit->amount=$purchase->paid;
                   //save a supplier paid amount 
                if($purchase->paid>0){
                    $supplier_payment=new SupplierPayment();
                    $supplier_payment->supplier_id=$request->supplier_id;
                    $supplier_payment->amount=$request->paid;
                    $supplier_payment->balance_id=$request->balance_id;
                    $supplier_payment->save();

                    //create a debit  
                    $debit = new Debit();
                    $debit->purpose = "Product purchase ";
                    $debit->balance_id=$request->balance_id;
                    $debit->amount = $request->paid;
                    $debit->comment = "product purchase paid '$request->paid'";
                    $debit->insert_admin_id= Auth::user()->id;
                    $debit->save();
            
                }

            });

            return response()->json([
                'status' => "OK",
                'message' => 'purchased updated successfully',
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
