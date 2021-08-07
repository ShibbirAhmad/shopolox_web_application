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
                    <form class="ps-form--checkout" action="do_action" method="post">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Billing Details</h3>
                                    <div class="form-group">
                                        <label>First Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="create-account">
                                            <label for="create-account">Create an account?</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="cb01">
                                            <label for="cb01">Ship to a different address?</label>
                                        </div>
                                    </div>
                                    <h3 class="mt-40"> Addition information</h3>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <div class="form-group__content">
                                            <textarea class="form-control" rows="7" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                                <div class="ps-form__total">
                                    <h3 class="ps-form__heading">Your Order</h3>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                            <div class="ps-block__header">
                                                <p>Product</p>
                                                <p>Total</p>
                                            </div>
                                            <div class="ps-block__content">
                                                <table class="table ps-block__products">
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                                                <p>Sold By:<strong>YOUNG SHOP</strong></p>
                                                            </td>
                                                            <td>$57.99</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#"> Apple Macbook Retina Display 12” × 1</a>
                                                                <p>Sold By:<strong>ROBERT’S STORE</strong></p>
                                                            </td>
                                                            <td>$625.50</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h4 class="ps-block__title">Subtotal <span>$863.49</span></h4>
                                                <div class="ps-block__shippings">
                                                    <figure>
                                                        <h4>YOUNG SHOP Shipping</h4>
                                                        <p>Free shipping</p><a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                                    </figure>
                                                    <figure>
                                                        <h4>ROBERT’S STORE Shipping</h4>
                                                        <p>Free shipping</p><a href="#">Apple Macbook Retina Display 12” ×1</a>
                                                    </figure>
                                                </div>
                                                <h3>Total <span>$683.49</span></h3>
                                            </div>
                                        </div><a class="ps-btn ps-btn--fullwidth" href="checkout.html">Proceed to checkout</a>
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
