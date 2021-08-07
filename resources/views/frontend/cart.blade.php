@extends('frontend.layouts.app')

@section('title', 'cart details')

@section('content')
    @parent

    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Whishlist</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table text-center table-hover table-striped ps-table--shopping-cart">
                            <thead>
                                <tr>
                                    <th>Product </th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($cart_content as $item)
                                    <tr>
                                        <td>
                                            <div class="ps-product--cart">
                                                <div class="ps-product__thumbnail"><a href="{{ route('product',$item->options->slug) }}"><img src="{{ asset('storage/'.$item->options->image->image) }}" alt=""></a></div>
                                                <div class="ps-product__content"><a href="{{ route('product',$item->options->slug) }}">{{ $item->name }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">&#2547;{{ $item->price }}</td>
                                        <td>
                                            <div class="form-group--number">
                                                <button cart_row_id="{{ $item->rowId }}"   class="up cart_item_increment">+</button>
                                                <button cart_row_id="{{ $item->rowId }}"  class="down cart_item_dicrement">-</button>
                                                <input class="form-control" type="text" id="__cart_update_input_{{ $item->rowId }}" value="{{ $item->qty }}">
                                            </div>
                                        </td>
                                        <td>  <span>&#2547;</span><span id="__total_of_cart_item_{{ $item->rowId }}" > {{ $item->qty * $item->price }} </span></td>
                                        <td><a  class="__cart_destroy__"><i cart_row_id="{{ $item->rowId }}" class="icon-cross __remove_cart"></i></a></td>
                                    </tr>
                                                                  
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                 </div>
                <div class="ps-section__footer">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">
                                <div class="ps-block__header">
                                    <p>Subtotal  <span>&#2547;</span><span id="__cart_total_in_cart_view">{{ $cart_total }}</span></p>
                                </div>
                            </div><a class="ps-btn ps-btn--fullwidth" href="{{ route('order.index') }}">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('extra_js')


@endpush
