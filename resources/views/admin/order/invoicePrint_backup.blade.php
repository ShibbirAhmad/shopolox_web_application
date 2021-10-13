<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Print || Invoice</title>


    <style>

        .pull-right.moha_add_inv p {
            line-height: .5;
        }
        .pull-right.moha_add_inv {
            text-align: right;
            margin-right: 120px !important;
            margin-top: 20px;
        }
        
        body {
            background: #ddd;
        }

        .print {
            background: #fff;
            padding:28px;
            display:block;
        }
        .page-break {
            page-break-after: always;
            background-color: #fff;
            padding-bottom: 50px;
            padding-top: 50px;
            margin-bottom: 20px;
            width: 70%;
        }
        .col-lg-4{
            text-align: center;
            width: 35% !important;
            margin: 0;
            padding:0;
            margin-left: 20px;
        }
        .col-lg-6{
            text-align: center;
            width: 60% !important;
            margin: 0;
            padding:0;
        }
        @media print {
            #print {
                display: none;
            }
        }
        .btn-pr{
            text-align: right;
            display: block;
            position: fixed;
            right:0;
            top: 280px;
        }
        .btn-pr button{
            height: 50px;
        }
 .rotate-logo {
    position: fixed;
    left: 35%;
    top:25%;
    right: 0;
    bottom: 50%;
    width: 502px;
    font-size: 24px;
    opacity: 0.2;
    
}

.rotate-logo img{
width: 350px;
}


    </style>

</head>
<body>
<div class="btn-pr">
    <button class="btn btn-success text-center print-button" onclick="allPrint()" id="print"><i class="fa fa-print"></i></button>
</div>
@foreach($orders as $order)

 <div class="container page-break">
        <div class="row justify-content-center break">
            <div class="col-lg-4  ml-5">
                <div class="header-left ml-4 text-left">
                    <img class="inv_logo" src="{{ asset('frontend/image/logo.png') }}" alt="logo" width="200">
                    <p class="moha_title_inv" >Trusted Online Shopping In Bangladesh</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pull-right moha_add_inv" >
                    <p>Office: House: 36, Road: 06, Block: A,</p>
                    <p>Benarashi Polly, Section-10, Mirpur, Dhaka.</p>
                    <p>E-mail: support@mohasagor.com</p>
                    <p>Hot Line: 01627 444 999 / 01633-666 222</p>
                    <p class="pull-right current_date" style="margin-top: 5px;" ><span style="border: 1px solid #000;padding:2px 4px 2px 4px; border-right: none;">Date: </span><span style="border: 1px solid #000;padding:2px 4px 2px 4px;"><?php echo date("d/m/Y"); ?></span></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-11 col-lg-offset-1 col-md-offset-1">

                <table class="table table-bordered moha_tbl_inv" style="margin-top: 5px;">

                    <tbody>
                    <tr>
                        <th colspan="5" class="text-left"> Name &nbsp;:
                        <span style="font-size:15px;">
                           {{ $order->customer->name ?? "" }}
                            </span>

                        </th>
                        <th class="text-left">Invoice No : <b style="font-size:20px;">{{$order->invoice_no}}</b></th>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-left" style="text-transform: capitalize;"><b>Address  : </b><b>

                                @if(!empty($order->customer->address))
                                    {{ $order->customer->address. ',' }}
                                @endif
                               
                                    {{ $order->city->name ?? ''}}
                               
                            </b>
                        </td>
                    </tr>
                    <tr>
                        {{--  <td colspan="6" class="text-left">Phone &nbsp;&nbsp;:  {{$order['order']s->mobile_no}}</td>--}}
                        <th colspan="4" class="text-left"> Phone &nbsp;: <b>

                          {{ $order->cutomer_phone }}
                            </b></th>
                        <th class="text-left">Courier : <b>
                              
                                {{ $order->courier->name ?? "" }}
                </b></th>
                    </tr>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">Product Details</th>
                        <th class="text-left">Order No</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Qty</th>
                        <th class="text-right">Total</th>
                    </tr>
                    @foreach($order->order_items as $k=> $item)

                        <tr>

                            <td class="text-center">{{$k+1}}</td>
                            <td class="text-center" style="text-transform: capitalize;">


                                {{$item->product->name}} {{$item->product->product_code}}
                                {{ $item->attribute->name ?? "" }}
                                @if(!empty($item->attribute))
                                {{ '-'. $item->variant->name ?? ''}}
                                @endif
                            </td>
                            <td class="text-center">
                                {{$item->id}}
                            </td>
                            <td class="text-center">
                                {{$item->price}}
                            </td>
                            <td class="text-center"><span style="border: 1px solid #000;"><b style="font-size: 16px;padding:5px 5px 5px 5px;"> {{$item->quantity}}</b></span></td>
                            <td class="text-right">{{$item->quantity*$item->price}} Tk</td>
                        </tr>
                    @endforeach



                    <tr>
                        <td colspan="5" class="text-right"><span style="font-weight: 900; font-size: 13px;">Sub-Total:</span></td>
                        <td class="text-right"><span style="font-weight: 900; font-size: 13px;">{{$order->total}} Tk</span></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Courier Charge:</td>
                        <td class="text-right">
                          {{$order->shipping_cost}}
                        </td>
                    </tr>
                        <tr>
                            <td colspan="5" class="text-right">Discount:</td>
                            <td class="text-right"> {{$order->discount}} Tk</td>
                        </tr>
                         <tr>
                            <td colspan="5" class="text-right">Paid:</td>
                            <td class="text-right"> {{$order->paid}} Tk</td>
                        </tr>
                         <tr>
                            <td colspan="5" class="text-right">Amount Due:</td>
                            <td class="text-right">{{ ($order->total)-($order->paid+$order->discount)+$order->shipping_cost}} Tk</td>
                        </tr>
                  
                    </tbody>
                </table>
                     <p style="margin-top:8px;"> <b><i> **No return will be accepted after 7 days</i></b></p>

                <table style="width:100%;margin-top:50px;" >
                    <tr>
                        <td style="margin-left: 115px;display: block;"><p>
                                Approved by<br>
                           
                                    {{$order->approvedBy->name ?? ""}}
                              
                                </p></td>
                        <td>Accounts</td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
@endforeach
    <div class="rotate-logo">
            <img src="{{ asset('rotatelogo.png') }}" alt="">
     </div>
<script>
    function allPrint() {
        window.print();
    };
    
    window.addEventListener('DOMContentLoaded', (event) => {
       // window.print();
    });

    window.addEventListener('click',function(){
         //let a=console.log('c');
         console.log(a);
    });
    
</script>

</body>
</html>