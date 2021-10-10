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
    .statistic_item{
        float: left;
        background: #fff;
        box-shadow: 0 1pt 6pt rgb(150 165 237);
        border: none;
        padding: 20px 40px;
        margin: 5px;
        width: 23.4%;
        height: 100px;
    }
    .statistic_item h2 {
        font-size: 34px;
        font-weight: bold;
        font-family: serif;
        line-height: 23px;
        color: #000;
    }
    .statistic_item p {
        font-size: 16px;
        font-family: serif;
        position: absolute;
        line-height: 13px;
        color: #000;
    }



  </style>  
@endpush
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

        <div class="col-lg-12">
        <a class="btn btn-primary mb-2 mr-2 btn-rounded " href="{{ route('admin.home') }} " 
                  ><i class="fa fa-arrow-left"></i></a>


         </div>





            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Orders Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th colspan="4" width="30%">Customer Information</th>
                                            <th colspan="6" width="70%"> Order Information</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th >Name</th>
                                            <th >Phone</th>
                                            <th >Address</th>

                                            <th>Date</th>
                                            <th >Invoice</th>
                                            <th >Payment</th>
                                            <th >Discount</th>
                                            <th >Status</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach ($orders as $key => $order)
                                      <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td >{{ $order->customer->name }}</td>
                                        <td >{{  $order->customer->phone }}</td>
                                        <td >{{  $order->customer->address }}</td>

                                        <td>{{  $order->created_at }}</td>
                                        <td >{{  $order->invoice_no }}</td>
                                        <td >
                                            <div class="payment_container">
                                                <ul>
                                                    <li>Total:   <span style="padding-left: 25px"> &#2547;{{ $order->total }} </span> </li>
                                                    <li>Shipping:<span style="padding-left: 5px">&#2547;{{ $order->shipping_cost }} </span> </li>
                                                    <li>Paid:  
                                                        @if(!empty($order->payment)) 

                                                        @if ($order->payment->status=='Pending')
                                                         <span style="padding-left: 30px">  {{ 'Pending'.'-'.$order->payment->amount }}  </span> 
                                                        @else
                                                        <span style="padding-left: 30px">  {{ $order->payment->status.'-'.$order->payment->amount }}  </span> 
                                                        @endif
                        
                        
                                                        @else
                                                        <span style="padding-left: 30px">&#2547;0</span>
                                                       @endif

                                                     </li>
                                                    <li>Due:     <span style="padding-left: 32px">&#2547;{{ ($order->total + $order->shipping_cost) - ($order->paid + $order->discount) }}  </span></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td >{{ $order->discount }}</td>
                                        <td > <span class="badge badge-info">{{ $order->status }}</span> </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  action
                                                </button>
                                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenu2">
  
        
                                                    <li  class="dropdown-item"> <a class="btn btn-sm btn-info" href="{{ route('backend_order_details',$order->id) }}">View</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'pending')" class="dropdown-item"> <a class="btn btn-sm btn-warning" >Pending</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'cancel')" class="dropdown-item"> <a class="btn btn-sm btn-danger" >Cancel</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'confirm')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Confirm</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'processing')" class="dropdown-item"> <a class="btn btn-sm btn-primary" >Processing</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'purchased')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Purchased</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'Wait for the supplier to deliver')" class="dropdown-item"> <a class="btn btn-sm btn-warning" >Wait for the supplier to deliver</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'handover to airline')" class="dropdown-item"> <a class="btn btn-sm btn-primary" >Handover to airline</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'arrived at bangladesh')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Arrived at Bangladesh</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'under customs clearance')" class="dropdown-item"> <a class="btn btn-sm btn-warning" >Under customs clearance </a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'received by  shopolox')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Received by  shopolox</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'shipped')" class="dropdown-item"> <a class="btn btn-sm btn-info" >Shipped</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'delivered')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Delivered</a> </li>
                                                    <li onclick="statusChange({{ $order->id }},'return')" class="dropdown-item"> <a class="btn btn-sm btn-success" >Return</a> </li>
                                               
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="pagination_container">
                                {{  $orders->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
@endsection



@push('extra_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

<script>
    
              
    function statusChange($id,status){
             console.log($id,status);
            let $action = '{{url("admin/api/order/status/change")}}';
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action+'/'+$id+'/'+status,
                type: "GET",
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                    }
                },
                error: function(e) {}
            });

            
          }



      
      function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                type: 'success',
                title: message
            })

            setTimeout(() => {
                location.reload();
            }, 1000);
        }


</script>
    
@endpush