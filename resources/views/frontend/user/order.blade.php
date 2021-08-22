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
                                                 <td> &#2547; {{ $order->total }} </td>
                                                 <td> {{ $item->quantity }} </td>
                                                 <td> {{ $item->size ? $item->size : 'None' }} </td>
                                                 <td> {{ $item->color ? $item->color : 'None' }} </td>
                                                 <td> {{ $item->weight ? $item->weight : 'None' }} </td>
                                             
                                               </tr>
                                               @endforeach
                                               <tr>
                                                    <td colspan="5" ></td>
                                                    <td class="text_decoration">discount </td>
                                                    <td> {{ $order->discount }} </td>
                                               </tr>
                                               <tr>
                                                    <td colspan="5" ></td>
                                                    <td class="text_decoration">paid </td>
                                                    <td> {{ $order->paid }} </td>
                                              </tr>
                                               <tr>
                                                   <td colspan="5" ></td>
                                                   <td class="text_decoration">sub total </td>
                                                   <td> {{ $order->total }} </td>
                                               </tr>
                                               <tr>
                                                    <td colspan="5" ></td>
                                                    <td class="text_decoration"> shipping cost </td>
                                                    <td> {{ $order->shipping_cost }} </td>
                                               </tr>
                                                <tr>
                                                    <td colspan="5" ></td>
                                                    <td class="text_decoration"> Total </td>
                                                    <td> {{ $order->total + $order->shipping_cost }} </td>
                                               </tr>                                             
                                     
                                        </thead>
                                        <tbody>
    
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                     </div>
                     <div class="col-lg-3 col-md-3">

                     </div>
                 </div>

            </div>
        </div>
    </div>

@endsection


