@extends('admin.layouts.app')

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
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Requested Products </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bproducted text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th colspan="4" width="30%">Customer Information</th>
                                            <th colspan="6" width="70%"> Product Information</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th >Name</th>
                                            <th >Phone</th>
                                            <th >Email</th>

                                            <th>Date</th>
                                            <th >Proudct-1</th>
                                            <th >Product-1 Variant</th>
                                            <th >Proudct-2</th>
                                            <th >Product-2 Variant</th>                                     
                 
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach ($products as $key => $product)
                                      <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td >{{  $product->name }}</td>
                                        <td >{{  $product->phone }}</td>
                                        <td >{{  $product->email }}</td>

                                        <td>{{  $product->created_at->diffforhumans() }}</td>
                                        <td> <a target="_blank" style="color:blue" href="{{$product->product_one_link }}">{{  $product->product_one_link }}</a> </td>
                                        <td >{{ $product->product_one_variant }}</td>
                                        <td >  <a target="_blank" style="color:blue" href="{{$product->product_two_link }}">{{ $product->product_two_link ? $product->product_two_link : 'None'  }}</a>  </td>
                                        <td >{{ $product->product_two_variant ? $product->product_two_variant : 'None'  }}</td>
                                     
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

