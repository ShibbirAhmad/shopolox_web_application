<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Debit;
use App\Models\Credit;
use App\Models\Loaner;
use App\Models\Investor;
use App\Models\LoanPaid;
use App\Models\Supplier;
use App\Models\PrintHouse;
use Illuminate\Http\Request;
use App\Exports\DebitExport ;
use App\Exports\CreditExport ;
use App\Models\BillStatement ;
use App\Models\EmployeeSalary;
use App\Models\Account_purpose;
use App\Models\SupplierPayment;
use App\Models\InvestmentReturn;
use App\Models\BillPaidStatement;
use App\Models\PrintHousePayment;
use App\Models\InvestorProfitPaid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel ;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    //this method return all type of credit data
    // method return data based on $request->satus;

    public function get_credit(Request $request)
    {

        if($request->ajax()){
            $paginate=$request->item??20;
              if($request->status=='all'){
                    $crdits=Credit::orderBy('id','DESC')->with('admin','balance')->paginate($paginate);
                    return response()->json($crdits);
             }
             if($request->status=='search'){
                $crdits=Credit::where('purpose', 'like', '%' . $request->search . '%')
                                ->orWhere('comment', 'like', '%' . $request->search . '%')
                                ->orWhere('amount', 'like', '%' . $request->search . '%')
                                ->orWhere('date', 'like', '%' . $request->search . '%')
                                ->orderBy('id','DESC')->with('admin','balance')
                                ->paginate($paginate);
                return response()->json($crdits);
         }
         if($request->status=='filter'){


            if(!empty($request->start_date) && empty($request->end_date)){
                $crdits=Credit::whereDate('date','=',$request->start_date)
                                ->orderBy('id','DESC')->with('admin','balance')
                                ->paginate($paginate);
            }else{
                $crdits=Credit::whereDate('date','>=',$request->start_date)
                                ->whereDate('date','<=',$request->end_date)
                                ->orderBy('id','DESC')->with('admin','balance')
                                ->paginate($paginate);
            }

            return response()->json($crdits);

         }

        }else{
            return abort(404);
        }
    }

    public function store_credit(Request $request)
    {

      //  return $request->all();
        $validatedData = $request->validate([
            'date'=>'required|before:tomorrow',
            'purpose' => 'required',
            'amount' => 'required|numeric',
            'credit_in' => 'required'

        ]);

        $credit = new Credit();
        $credit->purpose = $request->purpose;
        $credit->amount = $request->amount;
        $credit->comment = $request->comment ?? null;
        $credit->date = $request->date;
        $credit->balance_id=$request->credit_in;
        $credit->insert_admin_id=session()->get('admin')['id'];

        if ($credit->save()) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => "credit was successfully created",
            ]);
        }

    }


    public function edit_credit(Request $request,$id)
    {

        if($request->ajax()){
           $credit=Credit::find($id);
           if($credit){
            return response()->json([
                'status' => 'SUCCESS',
                'credit' => $credit ,
            ]);
           }
        }else{
            return abort(404);
        }
    }


    public function update_credit(Request $request,$id)
    {

        if($request->ajax()){
        $validatedData = $request->validate([
            'date'=>'required|before:tomorrow',
            'purpose' => 'required',
            'amount' => 'required',
            'credit_in' => 'required',
        ]);

        $credit =Credit::find($id);
        $credit->purpose = $request->purpose;
        $credit->amount = $request->amount;
         $credit->balance_id=$request->credit_in;
        $credit->comment = $request->comment ?? null;
        $credit->date = $request->date;
        if ($credit->save()) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => "credit was successfully updated",
            ]);
        }
    }
    else{
        return abort(404);
    }
    }


    public function destroy_credit(Request $request, $id)
    {
        if($request->ajax()){
            $credit=Credit::find($id);
            if($credit){
                if($credit->delete()){
                    return response()->json([
                        'status' => 'SUCCESS',
                        'message' => "credit was successfully deleted",
                    ]);
                }
            }

        }else{
            return abort(404);
        }


    }





    //start debit method

    public function get_debit(Request $request)
    {
        if($request->ajax()){
            $paginate=$request->item??20;

             if($paginate==80){
                $paginate=800;
            }

             if(!empty($request->accuount_purpose)){

                 $debits=Debit::where('purpose',$request->accuount_purpose)
                                ->orderBy('id','DESC')->with(['admin','purpose','balance'])
                                ->paginate($paginate);
                 return response()->json($debits);
             }


              if($request->status=='all'){
                    $debits=Debit::orderBy('id','DESC')->with(['purpose','admin','balance'])->paginate($paginate);
                    return response()->json($debits);
             }
             if($request->status=='search'){
                $debits=Debit::where('purpose', 'like', '%' . $request->search . '%')
                                ->orWhere('comment', 'like', '%' . $request->search . '%')
                                ->orWhere('amount', 'like', '%' . $request->search . '%')
                                ->orWhere('date', 'like', '%' . $request->search . '%')
                                ->orderBy('id','DESC')->with(['purpose','admin','balance'])
                                ->paginate($paginate);
                return response()->json($debits);
         }
         if($request->status=='filter'){


            if(!empty($request->start_date) && empty($request->end_date)){
                $debits=Debit::whereDate('date','=',$request->start_date)
                                ->orderBy('id','DESC')->with(['purpose','admin','balance'])
                                ->paginate($paginate);
            }else{
                $debits=Debit::whereDate('date','>=',$request->start_date)
                                ->whereDate('date','<=',$request->end_date)
                                ->orderBy('id','DESC')->with(['purpose','admin','balance'])
                                ->paginate($paginate);
            }

            return response()->json($debits);

         }

        }else{
            return abort(404);
        }
    }

    public function store_debit(Request $request)
    {
       //return $request->all();
        $validatedData = $request->validate([
            'date'=>'required|before:tomorrow',
            'purpose' => 'required',
            'amount' => 'required',
            'debit_from'=>'required',
            'signature'=>'required'
        ]);

        DB::transaction(function() use($request){
                //make signature image
                $name='debit-signature-'.time().'.png';
                Image::make(file_get_contents($request->signature))->save(public_path('storage/images/debitSignature/').$name);
                $debit = new Debit();
                $debit->purpose = $request->purpose;
                $debit->balance_id=$request->debit_from;
                $debit->amount = $request->amount;
                $debit->comment = $request->comment ?? null;
                $debit->date = $request->date;
                $debit->insert_admin_id=session()->get('admin')['id'];
                $debit->signature='images/debitSignature/'.$name;
                $debit->save();
                //inserting employee salary
                if(!empty($request->employee_id)){
                    $emplye=Team::where('id',$request->employee_id)->first();
                    $employee_salary=new EmployeeSalary();
                    $employee_salary->employee_id=$request->employee_id;
                    $employee_salary->amount=$request->amount;
                    $employee_salary->date=$request->date;
                    $employee_salary->comment=$debit->comment;
                    $employee_salary->paid_by=$debit->balance_id;
                    $employee_salary->save();
                    //update debit comment
                    $debit->comment = $debit->comment.'('. $emplye->name .')';
                    $debit->save();
                    Team::sendMessageToEmployeer($emplye,$employee_salary->amount);
                }

                if(!empty($request->loaner_id)){
                    $loaner=Loaner::where('id',$request->loaner_id)->first();
                    $loan_paid=new LoanPaid();
                    $loan_paid->loaner_id=$loaner->id;
                    $loan_paid->amount=  $debit->amount;
                    $loan_paid->date= $debit->date;
                    $loan_paid->comment=$debit->comment;
                    $loan_paid->paid_by=$debit->balance_id;
                    $loan_paid->save();
                    //update comment
                    $debit->comment = $debit->comment.'('. $loaner->name .')';
                    $debit->save();
                }

                //save a supplier paid amount
                    if(!empty($request->supplier_id)){
                        $supplier=Supplier::where('id',$request->supplier_id)->first();
                        $supplier_payment=new SupplierPayment();
                        $supplier_payment->supplier_id=$request->supplier_id;
                        $supplier_payment->amount=$request->amount;
                        $supplier_payment->date=$request->date;
                        $supplier_payment->paid_by=$debit->balance_id . '('. $debit->comment.')';
                        $supplier_payment->save();
                        //update debit comment
                        $debit->comment = $debit->comment.'('. $supplier->name .')';
                        $debit->save();

                    }


                //investor payment inserting
                if(!empty($request->investor_id)){
                    $investor=Investor::where('id',$request->investor_id)->first();
                    $investor_profit_paid=new InvestorProfitPaid();
                    $investor_profit_paid->investor_id=$investor->id;
                    $investor_profit_paid->amount=  $debit->amount;
                    $investor_profit_paid->profit_month= $request->profit_month;
                    $investor_profit_paid->date= $debit->date;
                    $investor_profit_paid->comment=$debit->comment;
                    $investor_profit_paid->paid_by=$debit->balance_id;
                    $investor_profit_paid->save();
                    $debit->comment = $debit->comment.'('. $investor->name .')';
                    $debit->save();
                }


                //investor payment return
                if(!empty($request->investor_return_id)){
                    $investor=Investor::where('id',$request->investor_return_id)->first();
                    $invest_return=new InvestmentReturn();
                    $invest_return->investor_id=$investor->id;
                    $invest_return->amount=  $debit->amount;
                    $invest_return->date= $debit->date;
                    $invest_return->comment=$debit->comment;
                    $invest_return->paid_by=$debit->balance_id;
                    $invest_return->save();
                    $debit->comment = $debit->comment.'('. $investor->name .')';
                    $debit->save();
                }

                    //print house payment inserting
                    if(!empty($request->print_house_id)){
                    $print_house=PrintHouse::where('id',$request->print_house_id)->first();
                    $print_house_paid=new PrintHousePayment();
                    $print_house_paid->print_house_id=$print_house->id;
                    $print_house_paid->amount=  $debit->amount;
                    $print_house_paid->date= $debit->date;
                    $print_house_paid->comment=$debit->comment;
                    $print_house_paid->paid_by=$debit->balance_id;
                    $print_house_paid->save();
                    //update debit comment
                    $debit->comment = $debit->comment.'('.$print_house->name.')';
                    $debit->save();
                }


                //storing bill statement payment
                if(!empty($request->bill_statement_id)){
                    $bill=BillStatement::where('id',$request->bill_statement_id)->first();
                    $bill_paid=new BillPaidStatement();
                    $bill_paid->bill_statement_id=$bill->id;
                    $bill_paid->amount=  $debit->amount;
                    $bill_paid->date= $debit->date;
                    $bill_paid->comment=$debit->comment;
                    $bill_paid->paid_by=$debit->balance_id;
                    $bill_paid->save();
                    //debit comment update
                    $debit->comment = $debit->comment.'('.$bill->name.')';
                    $debit->save();
                }



        });

          return response()->json([
                'status' => 'SUCCESS',
                'message' => "Debit was successfully created",

            ]);

    }


    public function edit_debit(Request $request,$id)
    {
        if($request->ajax()){
            $debit=Debit::find($id);
            if($debit){
             return response()->json([
                 'status' => 'SUCCESS',
                 'debit' => $debit ,
             ]);
            }
         }else{
             return abort(404);
         }
    }


    public function update_debit(Request $request,$id)
    {
        if($request->ajax()){
            $validatedData = $request->validate([
                'date'=>'required|before:tomorrow',
                'purpose' => 'required',
                'amount' => 'required',
            ]);

            $debit =Debit::find($id);
            $debit->purpose = $request->purpose;
            $debit->amount = $request->amount;
            $debit->comment = $request->comment ?? null;
            $debit->date = $request->date;
            if ($debit->save()) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => "debit was successfully updated",
                ]);
            }
        }
        else{
            return abort(404);
        }
    }


    public function destroy_debit(Request $request,$id)
    {
        if($request->ajax()){
            $debit=Debit::find($id);
            if($debit){
                if($debit->delete()){
                    return response()->json([
                        'status' => 'SUCCESS',
                        'message' => "debit was successfully deleted",
                    ]);
                }
            }

        }else{
            return abort(404);
        }
    }






    public  function get_purpose_list(){

            $purposes = Account_purpose::orderBy('id','DESC')->paginate(10) ;

            return response()->json([
                    "status" => "OK",
                    "purposes" => $purposes ,
            ]);
     }



    public  function add_purpose(Request $request){

         $validatedData = $request->validate([
                'text' => 'required|unique:account_purposes',
            ]);
        $purpose = new Account_purpose() ;
        $purpose->text=$request->text ;
        $purpose->save();
        return response()->json([
                "status" => "OK",
                "message" => "new purpose added" ,
        ]);

    }


    public  function get_edit_purpose($id){

        $purpose = Account_purpose::find($id);

        return response()->json([
                "status" => "OK",
                "purpose" => $purpose ,
        ]);
    }



    public function update_purpose(Request $request, $id){

        $validatedData = $request->validate([
                'text' => 'required|unique:account_purposes,text,'.$id,
            ]);
                $purpose = Account_purpose::find($id) ;
                $purpose->text=$request->text ;
                $purpose->save();
                return response()->json([
                        "status" => "OK",
                        "message" => "purpose edited " ,
                ]);

    }

    public function accountPurpose(){

            $purpose=Account_purpose::all();
            return response()->json($purpose);
    }

    public function employeeList(){
        $employeies=Team::where('status',1)->orderBy('position','ASC')->get();
        return response()->json($employeies);
    }



    public   function export_credit(){

        return   Excel::download(new CreditExport(),'credit.xlsx') ;
    }

    public   function export_debit(){

        return Excel::download(new DebitExport(),'debit.xlsx') ;
    }












}
