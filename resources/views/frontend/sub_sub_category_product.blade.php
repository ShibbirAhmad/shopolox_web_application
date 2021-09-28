@extends('frontend.layouts.app')

@section('title', 'sub sub category product collections')

@section('content')
    @parent

    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            @foreach($related_categories as $category)
                                <li class="menu-item-has-children"><a href="{{ route('sub_sub_category_product',$category->slug) }}"> {{ $category->name }} </a> 
                                </li>     
                            @endforeach
                          
                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            @foreach ($brands as $brand)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="{{ $brand->name }}" name="brand">
                                    <label for="{{ $brand->name }}">{{ $brand->name }}</label>
                                </div>
                            @endforeach
        
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-slider" data-default-min="13" data-default-max="1300" data-max="1311" data-step="100" data-unit="&#2547"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p>
                        </figure>
                     

     

                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root"><a class="ps-shop__filter-mb" href="#" id="filter-sidebar"><i class="icon-menu"></i> Show Filter</a>
                        <div class="ps-shopping__header">
                            <p><strong> 36</strong> Products found</p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                    
                                      
                                        @foreach ($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a
                                                        href="{{ route('product', $product->slug) }}"><img
                                                            src="{{  asset('storage/images/thumbnail_img/'.$product->thumbnail_img) }}"
                                                            alt=""></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a class="quick_cart_btn" product_id={{ $product->id }} title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a class="quick_view_btn"  product_id={{ $product->id }} title="Quick View"><i class="icon-eye"></i></a></li>
                                                        <li><a class="quick_wishlist_btn" product_id={{ $product->id }} title="Add to Whishlist" ><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container">
                                                    <div class="ps-product__content"><a class="ps-product__title"
                                                            href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                                        <p class="ps-product__price">&#2547;{{ $product->sale_price }}</p>
                                                    </div>
                                                    <div class="ps-product__content hover"><a class="ps-product__title"
                                                            href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                                        <p class="ps-product__price">&#2547;{{ $product->sale_price }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                           </div>
                                        @endforeach
                                        
                                     

                                    </div>
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    {{-- <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                                <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                                <ul class="ps-product__desc">
                                                    <li> Unrestrained and portable active stereo speaker</li>
                                                    <li> Free from the confines of wires and chords</li>
                                                    <li> 20 hours of portable capabilities</li>
                                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__shopping">
                                                <p class="ps-product__price">$1310.00</p><a class="ps-btn" href="#">Add to cart</a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#"><i class="icon-heart"></i> Add to Wishlish</a></li>
                                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                             
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('extra_js')


@endpush
