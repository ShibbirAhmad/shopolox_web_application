@extends('frontend.layouts.app')

@section('title', 'request for product')

@section('content')
    @parent

    <div class="ps-page--simple">
  
            <div class="container">
            
                  <div class="request_product_container">
                      
                    <div class="text-center">
                        <h4>Request For Product</h4>
                        <p>Get Aliexpress, Alibaba, Amazon, Flipkart, eBay, Walmart or any other international brand's product at your doorstep. Just drop the product link</p>
                    </div>
                     {{-- reqeust product form start  --}}
                     <form method="POST" id="request_product_form" action="{{ route('request_product') }}">
                        <div class="form_inside">
                            <div class="ps-form__content">

                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" for="name"> Name <b class="required">*</b></label>
                                            <input class="form-control" required name="name" type="text" placeholder="Ex:Mohammad">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" for="phone"> Phone<b class="required">*</b></label>
                                            <input class="form-control" maxlength="11" required name="phone" type="text" placeholder="0xxxx-xxxxxx">
                                        </div>
                                    </div>
                                </div>
                      
                                <div class="form-group">
                                    <label class="form label" for="email"> Email<b class="required">*</b></label>
                                    <input class="form-control" required name="email" type="email" placeholder="you@gmail.com">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" > Product-1 Link <b class="required">*</b></label>
                                            <input class="form-control" required name="product_one_link" type="text" placeholder="Ex:https://......">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" > Product-1 Variant ( size & color )<b class="required">*</b></label>
                                            <input class="form-control" required name="product_one_variant" type="text" >
                                        </div>
                                    </div>
                                </div>
                      

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" > Product-2 Link </label>
                                            <input class="form-control"  name="product_two_link" type="text" placeholder="Ex:https://......">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form label" > Product-2 Variant ( size & color )</label>
                                            <input class="form-control"  name="product_two_variant" type="text" >
                                        </div>
                                    </div>
                                </div>
                      
                              
                                <div class="form-group  text-center">
                                    <button class="ps-btn ">Request</button>
                                </div>
                            </div>
                    
                        </div>
                     </form>   
                     {{-- reqeust product form end --}}
                  </div>
                  
            </div>
      
    </div>

@endsection


@push('extra_js')


@endpush
