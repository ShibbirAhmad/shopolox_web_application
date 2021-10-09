
@php


function todayCreditBalance($balance){
        $amount = 0 ;
        foreach($balance->today_credit_balance as $item) {
           $amount += $item->amount ;
        }
        return $amount ;
    }


function todayTotalCredit($balance){
        $amount = 0 ;
        foreach($balance->today_credit_balance as $item) {
           $amount += $item->amount ;
        }
        return $amount ;
    }
    


function todayDebitBalance($balance){
        $amount = 0 ;
        foreach($balance->today_debit_balance as $item) {
           $amount += $item->amount ;
        }
        return $amount ;
    }


function todayTotalDebit($balance){
        $amount = 0 ;
        foreach($balance->today_debit_balance as $item) {
           $amount += $item->amount ;
        }
        return $amount ;
    }
    


function debitCreditSubstraction($balance){
        $debit_amount = 0 ;
        $credit_amount = 0 ;
        foreach($balance->total_debit_balance as $item) {
           $debit_amount += $item->amount ;
        }

        foreach($balance->total_credit_balance as $item) {
           $credit_amount += $item->amount ;
        }

       $total = intval($credit_amount) - intval($debit_amount) ;
        return $total ;
    }


function TotalBalance($balance){
        $debit_amount = 0 ;
        $credit_amount = 0 ;

        foreach ($balance as $balance_item) {
           foreach ($balance_item->total_debit_balance as $item) {
              $debit_amount += $item->amount ;
           }
        }

        foreach ($balance as $balance_item) {
           foreach ($balance_item->total_credit_balance as $item) {
              $credit_amount += $item->amount ;
           }
        }


       $total = intval($credit_amount) - intval($debit_amount) ;
        return $total ;
    }


    
    
    
@endphp

@extends('admin.layouts.app')
@push('extra_css')
  <style>
     
     .payment_container ul li{
         list-style-type: none;
         padding: 2px 0px ;
         text-align: left;
         margin-left: -30px;
      }

    .order_statistic{
        margin-left: 10px;
    }
    .statistic_item {
        float: left;
        box-shadow: 0 1pt 6pt rgb(150 165 237);
        border: none;
        margin: 5px;
        width: 24%;
        height: 120px;
    }

    .statistic_item>.more_info {
        width: 100%;
        height: 35px;
        background: rgba(54, 53, 53, 0.1);
        margin-top: 47px;
    }

    .statistic_item>.more_info>a {
        color: #fff;
        padding-top: 5px;
        position: absolute;
        margin-left: 8%;
    }

    .statistic_item h2 {
        font-size: 34px;
        padding-top: 20px ;
        padding-left: 40px; ;
        font-weight: bold;
        font-family: serif;
        line-height: 23px;
        color: #fff;
    }
    .statistic_item>p {
        padding: 0px 40px;
        font-size: 16px;
        font-family: serif;
        position: absolute;
        line-height: 13px;
        color: #fff;
    }

    .custom-box {
        background: #fff;
        padding: 13px;
        min-height: 280px;
        box-shadow: 3px 3px 3px #ddd;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .custom-box-body strong {
        position: absolute;
        right: 10%;
        color: blue;
        }

    .custom-box-body h4{
      font-family: serif;
      font-size: 18px;
    }    

    .custom-box-footer {
        background: #00a65a;
        color: #fff;
    }

    .accounts_heading{
        display: inline-block;
    }

  </style>  
@endpush
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="order_statistic">

                <div class="statistic_item bg-primary" >
                  <h2> {{ $analysis['new_order'] }} </h2>
                   <p> New Orders</p>
                   <div class="more_info ">
                       <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
                   </div>
                </div>
    
            <div class="statistic_item bg-warning " >
                <h2> {{ $analysis['pending_order'] }} </h2>
                <p>Pending Orders</p>
                <div class="more_info ">
                    <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    
    
            <div class="statistic_item bg-success" >
             <h2> {{ $analysis['approved_order'] }} </h2>
             <p> Confirm Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
    
    
    
            <div class="statistic_item bg-info" >
             <h2>  {{ $analysis['shipment_order'] }} </h2>
             <p> Shipment  Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
    
    
            <div class="statistic_item bg-success" >
             <h2> {{ $analysis['delivered_order'] }} </h2>
             <p> Delivered  Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
    
    
            <div class="statistic_item bg-danger" >
             <h2> {{ $analysis['return_order'] }} </h2>
             <p> Return  Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
    
            <div class="statistic_item bg-danger" >
             <h2> {{ $analysis['cancel_order'] }} </h2>
             <p> Cancel  Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
    
            <div class="statistic_item bg-primary " >
             <h2>  {{ $analysis['total_order'] }} </h2>
             <p> Total  Orders </p>
             <div class="more_info ">
                <a href="{{ route('backend_orders') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>


            <div class="statistic_item bg-info " >
                <h2>  {{ $analysis['total_product_request'] }} </h2>
                <p> Products Request </p>
                <div class="more_info ">
                   <a href="{{ route('backend_requested_product') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>


            <div class="statistic_item bg-primary " >
                <h2>   {{ $analysis['total_product'] }} </h2>
                <p> Total Products </p>
                <div class="more_info ">
                   <a href="{{ route('product.index') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
    
                        
            <div class="statistic_item bg-info " >
                <h2>   {{ $analysis['total_purchase'] }} </h2>
                <p> Total purchased   </p>
                <div class="more_info ">
                 <a href="{{ route('purchase.index') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
    
            <div class="statistic_item bg-secondary " >
                <h2>   {{ $analysis['total_supplier'] }} </h2>
                <p> Suppliers </p>
                <div class="more_info ">
                   <a href="{{ route('supplier.index') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <div class="statistic_item bg-warning " >
              <h2>   {{ $analysis['total_user'] }} </h2>
              <p> Users  </p>
              <div class="more_info ">
                 <a href="{{ route('user_list') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>

            <div class="statistic_item bg-success " >
                <h2>   {{ $analysis['total_customer'] }} </h2>
                <p> Customers  </p>
                <div class="more_info ">
                   <a href="{{ route('customer_list') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>

            

            </div>
        </div>  
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

          <div class="row ">

              <div class="col-lg-12 col-xs-12 text-center">
                  <h2 class="accounts_heading">Accounts</h2>
    
              </div>
            

              <div class="col-lg-4">
                <div class="custom-box">
    
                  <div class="custom-box-body">
                    @foreach ($balance_data as $balance)
                    <h4 >
                      In {{ $balance->name }} : <strong> {{ todayCreditBalance($balance) }}</strong>
                    </h4>          
                    @endforeach

                  <h4> In  Total : <strong>{{  todayTotalCredit($balance) }} </strong>  </h4>
                  </div>
    
                  <div class="custom-box-footer">
                    <h3 class="text-center  text-white  text-uppercase">today credit</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="custom-box">
                  <div class="custom-box-body">
                    @foreach ($balance_data as $debit)
                    <h4 >
                      In {{ $debit->name }} : <strong> {{ todayDebitBalance($debit) }}</strong>
                    </h4>          
                    @endforeach

                  <h4> In  Total : <strong>{{  todayTotalDebit($balance) }} </strong>  </h4>
                  </div>
    
    
                  <div class="custom-box-footer">
                    <h3 class="text-center  text-white  text-uppercase">today debit</h3>
                  </div>
                </div>
              </div>
    
    
              <div class="col-lg-4">
                <div class="custom-box">
                  <div class="custom-box-body">
                    @foreach ($balance_data as $debit_credit)
                    <h4 >
                      In {{ $debit_credit->name }} : <strong> {{ debitCreditSubstraction($debit_credit) }}</strong>
                    </h4>          
                    @endforeach

                  <h4> In  Total : <strong>{{  TotalBalance($balance_data) }} </strong>  </h4>
                  </div>
    
                  <div class="custom-box-footer">
                    <h3 class="text-center text-white text-uppercase">total balance</h3>
                  </div>
                </div>
              </div>
          </div>
        </div>

        

   
        <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Recent Orders</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Customer</div></th>
                                    <th><div class="th-content">Product</div></th>
                                    <th><div class="th-content">Invoice</div></th>
                                    <th><div class="th-content th-heading">Total</div></th>
                                    <th><div class="th-content">Status</div></th>
                                    <th><div class="th-content">Payable amount</div></th>
                                    <th><div class="th-content">Payment Status</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($recent_orders as $order)
                                <tr>
                                    <td><div class="td-content customer-name"><img src="{{asset('admin/assets/img/90x90.jpg')}}" alt="avatar"><span>{{ $order->customer->name }}</span></div></td>
                                    <td><div class="td-content product-brand text-primary"> <img style="width: 60px;height:60px;" src="{{asset('storage/images/thumbnail_img/'.$order->order_items[0]->product->thumbnail_img)}}" />
                                                                                           <p> {{ $order->order_items[0]->product->name }} </p></div></td>
                                    <td><div class="td-content product-invoice">{{ $order->invoice_no }}</div></td>
                                    <td><div class="td-content pricing"><span class="">&#2547;{{ $order->total }}</span></div></td>
                                    <td><div class="td-content"><span class="badge badge-success">{{ $order->status }}</span></div></td>
                                    <td><div class="td-content"><span class="">&#2547;{{ $order->payment ?  $order->payment->amount : '0' }}</span></div></td>
                                    <td><div class="td-content"><span class="badge badge-success">{{ $order->payment ?  $order->payment->status : 'none' }}</span></div></td>
                                </tr>                            
                              @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class="">Top Selling Products In Last 7 Days</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table table-scroll">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Product</div></th>
                                    <th><div class="th-content th-heading">Price</div></th>
                                    <th><div class="th-content th-heading">Discount</div></th>
                                    <th><div class="th-content">Sold</div></th>
                                    <th><div class="th-content">Source</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($top_selling_products_this_week as $product)

                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product"><div class="align-self-center"><p class="prd-name">Headphone</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                    <td><div class="td-content"><span class="pricing">$168.09</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">$60.09</span></div></td>
                                    <td><div class="td-content">170</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Direct</a></div></td>
                                </tr>
                                  
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

    </div>

</div>





@endsection