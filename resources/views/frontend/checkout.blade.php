@extends('frontend.layouts.app')

@section('title', 'checkout')

@section('content')
    @parent

    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <div class="ps-checkout ps-section--shopping">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                           <img src="{{ asset('frontend/img/logo_light.png') }}" >
                           <h3>Please Checkout Now</h3>
                    </div>
                </div>
                <br>
                <div class="ps-section__content">
                    <form class="ps-form--checkout" id="checkout_form" action="{{ route('order.store') }}"  method="post">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info chekout_customer_info">
                                    <div class="form-group">
                                        <label> Name<b class="text-danger">*</b>
                                        </label>
                                        <div class="form-group__content">
                                            <input name="name" value="{{ $user->name }}" required class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<b class="text-danger">*</b>
                                        </label>
                                        <div class="form-group__content">
                                            <input  name="phone" value="{{ $user->phone }}" maxlength="11" required  class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<b class="text-danger">*</b>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" name="address" value="{{ $user->address }}" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>City<b class="text-danger">*</b>
                                        </label>
                                        <div class="form-group__content">
                                            <select id="customer_city" required name="city" class="form-control">
                                                <option selected disabled >select your city </option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub City<b class="text-danger">*</b>
                                        </label>
                                        <div class="form-group__content">
                                            <select required id="customer_sub_city" name="sub_city" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                                
                                <div  class="form-group">
                                    <p  for="city">Select Payment Method  <b class="text-danger">*</b></p>
                                    <div class="row"> 
                                    <div class="col-md-6 col-xs-12">
                                        <input   type="radio" id="Cash On Delivery" checked  name="payment_method" value="Cash On Delivery">
                                        <label for="Cash On Delivery">Cash On Delivery</label>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <input   type="radio" id="Online Payment"   name="payment_method" value="Online Payment">
                                        <label for="Online Payment">Online Payment</label>
                                    </div>
                                 </div>
                                </div>

                            
                              
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <div class="ps-form__total chekout_amount_product_info">
                                    <h4 class="ps-form__heading">Your Order</h4>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                        
                                            <div class="ps-block__content">
                                                <table class="table ps-block__products">
                                                    <tbody>
                                                        @foreach ($cart_content as $item)
                                                        <tr>
                                                            <td> <a href="{{ route('product',$item->options->slug)  }}"> <img class="checkout_c_img" src="{{ asset('storage/images/thumbnail_img/'.$item->options->image) }}" > </a> </td>
                                                            <td><a href="{{ route('product',$item->options->slug)  }}">  {{ $item->name }} × {{ $item->qty }}</a>
                                                            </td>
                                                            <td>&#2547;{{ $item->price }}</td>
                                                        </tr>  
                                                        @endforeach
                                                  
                                                    </tbody>
                                                </table>
                                                <div class="checkout_total_section">
                                                  
                                                   <ul>
                                                       <li>    <h4>Subtotal : &#2547;<span id="checkout_sub_total">{{ $cart_total }}</span></h4> </li>
                                                       <li>    <h4>Shipping Cost : &#2547;<span id="shipping_cost">  </span> </h4> </li>
                                                       <li>    <h4>Total : &#2547;<span id="checkout_total">{{ $cart_total }}</span></h4></li>
                                                       <li>    <h4>Pay Now 10%  <span id="ten_percent_value_of_order">(00)</span>BDT Of : &#2547;<span id="checkout_total_1">{{ $cart_total }}</span></h4></li>
                                                   </ul>
                                                 <br>
                                                    <div  class="coupon">
                                                        <label for="">
                                                        <strong>Apply Coupon Here</strong>
                                                        </label>
                                                    <div style="display:flex">
                                                        <input id="coupon_code" style="width:80%;height:40px" name="coupon_code" type="text" class="form-control">
                                                        <input type="hidden" name="coupon_discount">
                                                        <button  class="btn btn-primary"  style="border-radius: 0px;
                                                        width: 20%;
                                                        font-size: 16px;">Apply</button>
                                                    </div>
                                                    </div>
                                                  <br/>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <br>
                                        <button type="submit" id="place_order_btn" class="ps-btn ps-btn--fullwidth" >Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <form id="online_payment_form" action="/pay" method="post">
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <div class="ps-site-overlay"></div>

 
      

@endsection
 

@push('extra_css')

    <style> 
     h3,h4 {
         font-family: sans-serif !important;
     }
    </style>

@endpush

@push('extra_js')

    <script>
        function incrementQty() {
            let input_value = document.getElementById('p_quantity').value;
            document.getElementById('p_quantity').value = parseInt(input_value) + 1;
        }

        function dicrementQty() {
            let input_value = document.getElementById('p_quantity').value;
            if (parseInt(input_value) > 1) {
                document.getElementById('p_quantity').value = parseInt(input_value) - 1;
            } else {
                alert('quantity should be at least one');
            }

        }
    </script>

@endpush
