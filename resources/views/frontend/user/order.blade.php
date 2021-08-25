@extends('frontend.layouts.app')

@section('title', 'customer order details')

@push('extra_css')
<style>
  .order_p_image {
      width: 60px;
      height: 60px;
      border-radius: 10px;
  }

  .text_decoration {
      text-align: left;
  }



  ol.progtrckr {
    margin-top: 20px;
    list-style-type: none;
}

ol.progtrckr li {
    display: block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 100%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-right: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-right: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2em;
    border: none;
    border-radius: 3em;
    margin-left: -13px;
    top: -5px;
}

ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2em;
    bottom: -1.2em;
    margin-left: -8px;
    top: -2px;
}






.order_progress_container li {
    list-style-type: none;
    padding: 20px 0px;
    margin-left: -10%;
    width: 100%;
    display: -webkit-flex;
    display: flex;
    border-bottom: 1px solid rgba(0,0,0,.08);
    transition: all .2s ease;
}

.order_progress_container  li:hover {
    background-color: #0111331c;
    padding-left: 0.275rem;
}



</style>
@endpush

@section('content')
    @parent

    <div class="ps-vendor-dashboard">
        <div class="container-fluid">
       
            <div class="ps-section__content">
           
                 <div class="row mt-5">
                     <div class="col-lg-2 col-md-2"> 
                         @include('frontend.user.sidebar')
                     </div>
                     <div class="col-lg-7 col-md-7">
                      
                            <div class="ps-block__content">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center  ps-table ps-table--vendor">
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
                                            @foreach ($order_items as $key => $item)

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
                                                    <td> &#2547;{{ $order->paid }} </td>
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
                     <div class="col-lg-3 col-md-3">
                           
                           <div class="order_status_diagram_container">
                            <h4>Order Progress</h4>
                            <div class="row">
                                <div class="col-md-2 col-lg-2">
                                    <ol class="progtrckr" data-progtrckr-steps="5">
                                        <li class="progtrckr-done"></li>
                                        <li class="progtrckr-done"></li>
                                        <li class="progtrckr-done"></li>
                                        <li class="progtrckr-todo"></li>
                                        <li class="progtrckr-todo"></li>
                                    </ol>
                                 </div>
                                <div class="col-md-10 col-lg-10"> 
                                    <ul class="order_progress_container">
                                        <li>
                                            Order Placed
                                           <span>01-10-2021</span>
                                        </li>
                                        <li>Pending</li>
                                        <li>Confirm</li>
                                        <li>Processing</li>
                                        <li>Purchased</li>
                                        <li>Order Placed</li>
                                        <li>Order Placed</li>
                                    </ul>
                                </div>
                            </div>
                           </div>
                     </div>
                 </div>

            </div>
        </div>
    </div>

@endsection


