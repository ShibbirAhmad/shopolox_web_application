@extends('admin.layouts.app')
@section('title', 'order details')
@section('content')
    <div id="order_details_container" class="layout-px-spacing">

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
@endsection



@push('extra_js')


@endpush




@push('extra_css')

  <style>

  </style>
  
@endpush
