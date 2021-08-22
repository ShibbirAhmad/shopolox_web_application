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
                <div class="ps-section__content">
                    <form class="ps-form--checkout" id="checkout_form" action="{{ route('order.store') }}"  method="post">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Order Details</h3>
                                    <div class="form-group">
                                        <label> Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input name="name" value="{{ $user->name }}" required class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input  name="phone" value="{{ $user->phone }}" maxlength="11" required  class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" name="address" value="{{ $user->address }}" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>City<sup>*</sup>
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
                                        <label>Sub City<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <select required id="customer_sub_city" name="sub_city" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                            
                              
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <div class="ps-form__total">
                                    <h3 class="ps-form__heading">Your Order</h3>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                        
                                            <div class="ps-block__content">
                                                <table class="table ps-block__products">
                                                    <tbody>
                                                        @foreach ($cart_content as $item)
                                                        <tr>
                                                            <td> <a href="{{ route('product',$item->options->slug)  }}"> <img class="checkout_c_img" src="{{ asset('storage/'.$item->options->image->image) }}" > </a> </td>
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
                                                   </ul>
                                                 
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
                                        </div><button type="submit" class="ps-btn ps-btn--fullwidth" >Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--include ../../partials/sections/newsletter-->
    <!--include ../../shared/footers/footer-->
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

@endsection


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
