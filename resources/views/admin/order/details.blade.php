@extends('admin.layouts.app')
@section('title', 'order details')


@push('extra_css')

  <style>
    .order_p_image {
        width:60px;
        height:60px;
    }
    .text_decoration {
        text-align: left ;
    }

    .customer_info {
        margin-top: 60px;
    }

    .customer_info ul li {
        list-style-type: none;
        padding: 5px 0px;
        font-size: 16px;
    }

    .site_logo{
        margin-top: 50px;
    }


    .print_btn{
        margin-top: 100px;
        margin-left: 50px;
    }
    

  </style>
  
@endpush

@section('content')
    <div id="order_details_container" class="layout-px-spacing">

      <div class="ps-block__content">

      <div class="row">
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="customer_info ">
                <ul>
                    <li> Name: {{ $order->customer->name }} </li>
                    <li> Phone: {{ $order->customer->phone }} </li>
                    <li> City: {{ $order->city->name }} </li>
                    <li> Sub-City: {{ $order->sub_city->name }} </li>
                    <li> Address Details: {{ $order->customer->address }} </li>
                </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-xs-12">
            <img src="{{ asset('frontend/img/logo_light.png') }}"
                        class="img-fluid site_logo" />
          </div>
          <div class="col-lg-4 col-md-4 col-xs-12">

               <a class="btn btn-success print_btn" href="{{ route('invoice_print',$order->id) }}" target="_blank" ><i class="fa fa-print"></i>Invoice Print</a>
               
          </div>
      </div>

        <div class="table-responsive mt-5">      
            <table class="table table-hover text-center  ps-table ps-table--vendor ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Weight</th>
                    </tr>
                    @foreach ($order->order_items as $key => $item)

                     <tr>
                         <td>{{ $key + 1 }}</td>
                         <td> <a href="{{ route('product',$item->product->slug) }}"> <img class="order_p_image" src="{{ asset('storage/'.$item->product->product_images[0]->image ) }}" >  </a> </td>
                         <td> &#2547;{{ $order->total }} </td>
                         <td> {{ $item->quantity }} </td>
                         <td> {{ $item->size ? $item->size : 'None' }} </td>
                         <td> {{ $item->color ? $item->color : 'None' }} </td>
                         <td> {{ $item->weight ? $item->weight : 'None' }} </td>
                     
                       </tr>
                       @endforeach
                       <tr>
                            <td colspan="5" ></td>
                            <td class="text_decoration">discount </td>
                            <td> &#2547;{{ $order->discount }} </td>
                       </tr>
                       <tr>
                            <td colspan="5" ></td>
                            <td class="text_decoration">paid </td>
                            <td> &#2547;
                               @if(!empty($order->payment)) 

                                @if ($order->payment->status=='Pending')
                                 <span>  {{ 'Pending'.'-'.$order->payment->amount }}  </span> 
                                @else
                                <span>  {{ $order->payment->status.'-'.$order->payment->amount }}  </span> 
                                @endif


                                @else
                                <span>  {{ '0' }} </span>
                               @endif
                      
                            
                            </td>
                        
                      </tr>
                       <tr>
                           <td colspan="5" ></td>
                           <td class="text_decoration">sub total </td>
                           <td> &#2547;{{ $order->total }} </td>
                       </tr>
                       <tr>
                            <td colspan="5" ></td>
                            <td class="text_decoration"> shipping cost </td>
                            <td> &#2547;{{ $order->shipping_cost }} </td>
                       </tr>
                        <tr>
                            <td colspan="5" ></td>
                            <td class="text_decoration"> Total </td>
                            <td> &#2547;{{ $order->total + $order->shipping_cost }} </td>
                       </tr>                                             
             
                </thead>
                <tbody>

            
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection



@push('extra_js')


@endpush


