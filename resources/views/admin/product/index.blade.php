@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <a class="btn btn-primary mb-2 mr-2 btn-rounded " href="{{ route('product.create') }} " 
                  >Add Product</a>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Products Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="10%">Name</th>
                                            <th width="5%">Code</th>
                                            <th width="5%">Image</th>
                                            <th width="5%">Purchase Price </th>
                                            <th width="5%">Regular Price</th>
                                            <th width="5%">Discount</th>
                                            <th width="5%">Sale Price</th>
                                            <th width="5%">Profit Margin</th>
                                            <th width="5%">Stock</th>
                                            <th width="5%">Status</th>
                                            <th width="10%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key=>$product)

                                            <tr>
                                                <td>{{ $key+1 }}</td>                                         
                                                <td>{{ $product->name }}</td>                                         
                                                <td>{{ $product->code }}</td>                                                                                  
                                                <td>
                                                @if (count($product->product_images) > 0)
                                                <img class="small_image" src="{{ asset('storage/'.$product->product_images[0]->image ) }}" alt="image"></td>
                                                @else
                                                    <img class="small_image" src="{{ asset('storage/images/no_image.png') }}" alt="no image">  
                                                @endif 
                                                </td>
                                                <td> p-10 </td>
                                                <td> {{ $product->regular_price }} </td>
                                                <td> {{ $product->discount  }} </td>
                                                <td> {{ $product->sale_price }} </td>
                                                <td>  5%  </td>
                                                <td> <span class="badge badge-success">{{ $product->stock  }}</span> </td>
                                                <td>
                                                    @if ($product->status==1)
                                                        <span class="badge badge-success"> Active </span>
                                                    @else
                                                    <span class="bade badge-warning"> Inactive </span>
                                                    @endif
                                                </td>
                                                <td>

                                                 @if ($product->status==1)
                                                    <a href="#" route="{{ route('product.destroy', $product->id) }}"
                                                        class="btn btn-sm btn-warning btn_status_change">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" route="{{ route('product.destroy', $product->id) }}"
                                                        class="btn btn-sm btn-success btn_status_change">
                                                        <i class="fa fa-check"></i>
                                                    </a>        
                                                    @endif

                                                    <a href="{{ route('product.edit', $product->id) }}" 
                                                        class="btn btn-sm btn-success mt-1" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a onclick="copyProduct({{ $product->id }})"  class="btn btn-sm btn-success copy_btn mt-1"> <i class="fa fa-clone"></i>  </a>
                                                </td>

                                            </tr>

                                        @endforeach
                                   

                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="pagination_container">
                                {{  $products->links() }}
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
    
              
    function copyProduct($id){
            var item = prompt('Number of copy item') ;
            if (item.length > 0) {
            let $action = '{{url("admin/api/product/copy")}}';
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action+'/'+$id+'/'+item,
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