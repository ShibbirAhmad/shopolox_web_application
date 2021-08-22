@extends('frontend.layouts.app')

@section('title', 'customer order list')

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
                                    <table class="table ps-table ps-table--vendor">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>Order ID</th>
                                                <th>Shipping</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nov 4, 2019</td>
                                                <td><a href="#">MS46891357</a></td>
                                                <td>$00.00</td>
                                                <td>$295.47</td>
                                                <td><a href="#">Open</a></td>
                                                <td><a href="#">View Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Nov 2, 2017</td>
                                                <td><a href="#">AP47305441</a></td>
                                                <td>$00.00</td>
                                                <td>$25.47</td>
                                                <td>Close</td>
                                                <td><a href="#">View Detail</a></td>
                                            </tr>
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
