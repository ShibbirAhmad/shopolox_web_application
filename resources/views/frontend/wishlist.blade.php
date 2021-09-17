@extends('frontend.layouts.app')

@section('title', 'wishlist products')

@section('content')
    @parent

    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
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
                               @foreach ($wishlist_content as $item)
                                    <tr class="{{$item->rowId  }}" >
                                        <td>
                                            <div class="ps-product--cart">
                                                <div class="ps-product__thumbnail"><a href="{{ route('product',$item->options->slug) }}"><img src="{{ asset('storage/images/thumbnail_img/'.$item->options->image) }}" ></a></div>
                                                <div class="ps-product__content"><a href="{{ route('product',$item->options->slug) }}">{{ $item->name }}</a>
                                                </div>
                                            </div>
                                        </td>
                                       <td class="price">&#2547;{{ $item->price }}</td>
                                        <td>
                                            <div class="form-group--number">
                                                <button  class="up ">+</button>
                                                <button  class="down ">-</button>
                                                <input class="form-control" type="text" id="__wishlist_input_{{ $item->rowId }}" value="{{ $item->qty }}">
                                            </div>
                                        </td>
                                        <td>  <span>&#2547;</span><span id="__total_of_wishlist_item_{{ $item->rowId }}" > {{ $item->qty * $item->price }} </span></td>
                                        <td style="text-align: center !important" >
                                            <a class="ps-btn " style="font-size: 14px;" route="{{ route('cart_add', $item->id) }}">add to cart</a>
                                            <a style="cursor: pointer"  class="__wishlist_destroy__"><i wishlist_row_id="{{ $item->rowId }}" class="icon-cross __remove_wishlist"></i></a></td>
                                    </tr>
                                                                  
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                 </div>
 
            </div>
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