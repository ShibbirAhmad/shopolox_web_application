@extends('frontend.layouts.app')

@section('title', 'product details')

@section('content')
    @parent

    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            @foreach ($product->product_images as $item)
                                                <div class="item"><a href="{{ asset('storage/' . $item->image) }}"><img
                                                            src="{{ asset('storage/' . $item->image) }}"
                                                            alt="{{ $product->name }}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    @foreach ($product->product_images as $item)
                                        <div class="item"><img src="{{ asset('storage/' . $item->image) }}"
                                                alt="{{ $product->name }}"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1>{{ $product->name }}</h1>
                                <div class="ps-product__meta">  </div>
                                <h4 class="ps-product__price">&#2547;{{ $product->sale_price }} @if ($product->discount > 0)
                                        <del>&#2547;{{ $product->regular_price }}</del>
                                    @endif
                                </h4>
                                @if ($product->shipment)
                                    <div class="ps-product__desc">
                                        <p>{!! $product->shipment->description !!}</p>
                                    </div>
                                @endif

                                <div class="ps-product__variations">
                                    <div class="pr_switch_wrap">
                                        <div class="product-attributes">
                                            @foreach ($product_attributes as $item)
                                                @if (strtolower($item->attributes->name) === 'color')
                                                    <div class="visual-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
                                                        data-type="visual">
                                                        <label class="attribute-name">Color</label>
                                                        <div class="attribute-values">
                                                            <ul class="visual-swatch color-swatch attribute-swatch">
                                                                @foreach ($item->attributes->variants as $key => $variant)
                                                                    <li data-slug="blue" data-id="2"
                                                                        class="attribute-swatch-item"
                                                                        title="{{ $variant->name }}">
                                                                        <div class="custom-radio">
                                                                            <label>
                                                                                <input
                                                                                    class="form-control product-filter-item variant_color"
                                                                                    type="radio" name="color"
                                                                                    value="{{ $variant->name }}" @if ($key == 0) checked @endif>
                                                                                <span
                                                                                    class="{{ $variant->name }}"></span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (strtolower($item->attributes->name) === 'size')
                                                    <div class="text-swatches-wrapper attribute-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
                                                        data-type="text">
                                                        <label class="attribute-name">Size</label>
                                                        <div class="attribute-values">
                                                            <ul class="text-swatch attribute-swatch color-swatch">
                                                                @foreach ($item->attributes->variants as $key => $variant)
                                                                    <li data-slug="xl" data-id="9"
                                                                        class="attribute-swatch-item pe-none">
                                                                        <div>
                                                                            <label>
                                                                                <input class="product-filter-item variant_size"
                                                                                    type="radio" name="size"
                                                                                    value="{{ $variant->name }}" @if ($key == 0) checked @endif>
                                                                                <span>{{ $variant->name }}</span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product__shopping">
                                    <figure>
                                        <figcaption>Quantity</figcaption>
                                        <div class="form-group--number">
                                            <button onclick="incrementQty()" class="up"><i class="fa fa-plus"></i></button>
                                            <button onclick="dicrementQty()" class="down"><i
                                                    class="fa fa-minus"></i></button>
                                            <input id="p_quantity" class="form-control" name="quantity" type="text"
                                                value="1">
                                        </div>
                                    </figure><a id="cart_btn" class="ps-btn ps-btn--gray"
                                        route="{{ route('cart_add', $product->id) }}">Add to cart</a>
                                    <a class="ps-btn"  route="{{ route('cart_add', $product->id) }}" id="buy_now_button" href="#">Buy Now</a>
                                    <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a></div>
                                </div>

                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                <li><a href="#tab-2">Specification</a></li>
                                <li><a href="#tab-4">Reviews (1)</a></li>
                                {{-- <li><a href="#tab-5">Questions and Answers</a></li> --}}
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                        <p> {!! $product->details !!} </p>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered ps-table ps-table--specification">
                                            <tbody>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Black, Gray</td>
                                                </tr>
                                                <tr>
                                                    <td>Style</td>
                                                    <td>Ear Hook</td>
                                                </tr>
                                                <tr>
                                                    <td>Wireless</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>Dimensions</td>
                                                    <td>5.5 x 5.5 x 9.5 inches</td>
                                                </tr>
                                                <tr>
                                                    <td>Weight</td>
                                                    <td>6.61 pounds</td>
                                                </tr>
                                                <tr>
                                                    <td>Battery Life</td>
                                                    <td>20 hours</td>
                                                </tr>
                                                <tr>
                                                    <td>Bluetooth</td>
                                                    <td>Yes</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>4.00</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>1 Review</span>
                                                </div>
                                                <div class="ps-block__star"><span>5 Star</span>
                                                    <div class="ps-progress" data-value="100"><span></span></div>
                                                    <span>100%</span>
                                                </div>
                                                <div class="ps-block__star"><span>4 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>3 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>2 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div>
                                                    <span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>1 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                            <form class="ps-form--review" action="index.html" method="get">
                                                <h4>Submit Your Review</h4>
                                                <p>Your email address will not be published. Required fields are
                                                    marked<sup>*</sup></p>
                                                <div class="form-group form-group__rating">
                                                    <label>Your rating of this product</label>
                                                    <select class="ps-rating" data-read-only="false">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="6"
                                                        placeholder="Write your review here"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="email"
                                                                placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group submit">
                                                    <button class="ps-btn">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">

                    <aside class="widget widget_ads"><a href="#"><img src="img/ads/product-ads.png" alt=""></a></aside>
                    <aside class="widget widget_same-brand">
                        <h3>Recommend For You</h3>
                        <div class="widget__content">
                            @foreach ($recommend_products as $r_product)
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a
                                            href="{{ route('product', $r_product->slug) }}"><img
                                                src="{{ asset('storage/' . $r_product->product_images[0]->image) }}"
                                                alt=""></a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i
                                                        class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                        class="icon-chart-bars"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container">
                                        <div class="ps-product__content"><a class="ps-product__title"
                                                href="{{ route('product', $r_product->slug) }}">{{ $r_product->name }}</a>
                                            <p class="ps-product__price">&#2547;{{ $r_product->sale_price }}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title"
                                                href="{{ route('product', $r_product->slug) }}">{{ $r_product->name }}</a>
                                            <p class="ps-product__price">&#2547;{{ $r_product->sale_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </aside>
                </div>
            </div>
            <div class="ps-section--default ps-customer-bought">
                <div class="ps-section__header">
                    <h3>Customers who bought this item also bought</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        @foreach ($related_category_products as $c_product)
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a
                                            href="{{ route('product', $c_product->slug) }}"><img
                                                src="{{ asset('storage/' . $c_product->product_images[0]->image) }}"
                                                alt=""></a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i
                                                        class="icon-bag2"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="icon-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__container">
                                        <div class="ps-product__content"><a class="ps-product__title"
                                                href="{{ route('product', $c_product->slug) }}">{{ $c_product->name }}</a>
                                            <p class="ps-product__price">&#2547;{{ $c_product->sale_price }}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title"
                                                href="{{ route('product', $c_product->slug) }}">{{ $c_product->name }}</a>
                                            <p class="ps-product__price">&#2547;{{ $c_product->sale_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6"
                        data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4"
                        data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($related_products as $r_product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a
                                        href="{{ route('product', $r_product->slug) }}"><img
                                            src="{{ asset('storage/' . $r_product->product_images[0]->image) }}"
                                            alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a class="quick_cart_btn" r_product={{ $product->id }} title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                        <li><a  title="Quick View"><i class="icon-eye"></i></a></li>
                                        <li><a  title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="{{ route('product', $r_product->slug) }}">{{ $r_product->name }}</a>
                                        <p class="ps-product__price">&#2547;{{ $r_product->sale_price }}</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title"
                                            href="{{ route('product', $r_product->slug) }}">{{ $r_product->name }}</a>
                                        <p class="ps-product__price">&#2547;{{ $r_product->sale_price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach



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
