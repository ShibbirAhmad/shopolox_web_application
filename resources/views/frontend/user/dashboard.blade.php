@extends('frontend.layouts.app')

@section('title', 'customer order list')

@push('extra_css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    table {
        overflow-x: auto ;
    }
    table tr td {
        font-size: 16px;
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
                     <div class="col-lg-10 col-md-10">
                      
                            <div class="ps-block__content">
                                <div class="table-responsive">
                                    <table class="table table-hover  ps-table ps-table--vendor">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Invoice</th>
                                                <th>Paid</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     @foreach ($orders as $key => $order)
                                         
                                     <tr>
                                        <td>{{ $key + 1   }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>&#2547; {{ $order->paid }}</td>
                                        <td>&#2547; {{ $order->discount }}</td>
                                        <td>&#2547; {{ $order->shipping_cost + $order->total }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            @if ( ($order->total+$order->shipping_cost) != $order->paid )
                                                <div class="spinner-grow text-success" role="status">
                                                    <span class="sr-only">...</span>
                                                  </div>
                                                  <a href="">Pay Now</a>
                                            @else 
                                             <button class="btn btn-sm btn-success">Piad</button> 
                                            @endif
                                         
                                        </td>
                                        <td>   <a href="{{ route('order',$order->id) }}">Details</a></td>
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
    </div>

@endsection





@push('extra_js')

<script>

  
    


</script>

@endpush
