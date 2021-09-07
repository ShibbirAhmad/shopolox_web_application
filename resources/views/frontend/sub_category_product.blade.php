@extends('frontend.layouts.app')

@section('title', 'product details')

@section('content')
    @parent

    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            <li class="menu-item-has-children"><a href="shop-default.html">Clothing &amp; Apparel</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Womens</a>
                                    </li>
                                    <li><a href="shop-default.html">Mens</a>
                                    </li>
                                    <li><a href="shop-default.html">Bags</a>
                                    </li>
                                    <li><a href="shop-default.html">Sunglasses</a>
                                    </li>
                                    <li><a href="shop-default.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-default.html">Kid's Fashion</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Garden &amp; Kitchen</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Cookware</a>
                                    </li>
                                    <li><a href="shop-default.html">Decoration</a>
                                    </li>
                                    <li><a href="shop-default.html">Furniture</a>
                                    </li>
                                    <li><a href="shop-default.html">Garden Tools</a>
                                    </li>
                                    <li><a href="shop-default.html">Home Improvement</a>
                                    </li>
                                    <li><a href="shop-default.html">Powers And Hand Tools</a>
                                    </li>
                                    <li><a href="shop-default.html">Utensil &amp; Gadget</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Consumer Electrics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children"><a href="shop-default.html">Air Conditioners</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">Accessories</a>
                                            </li>
                                            <li><a href="shop-default.html">Type Hanging Cell</a>
                                            </li>
                                            <li><a href="shop-default.html">Type Hanging Wall</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop-default.html">Audios &amp; Theaters</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">Headphone</a>
                                            </li>
                                            <li><a href="shop-default.html">Home Theater System</a>
                                            </li>
                                            <li><a href="shop-default.html">Speakers</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop-default.html">Car Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">Audio &amp; Video</a>
                                            </li>
                                            <li><a href="shop-default.html">Car Security</a>
                                            </li>
                                            <li><a href="shop-default.html">Radar Detector</a>
                                            </li>
                                            <li><a href="shop-default.html">Vehicle GPS</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop-default.html">Office Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">Printers</a>
                                            </li>
                                            <li><a href="shop-default.html">Projectors</a>
                                            </li>
                                            <li><a href="shop-default.html">Scanners</a>
                                            </li>
                                            <li><a href="shop-default.html">Store &amp; Business</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop-default.html">TV Televisions</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">4K Ultra HD TVs</a>
                                            </li>
                                            <li><a href="shop-default.html">LED TVs</a>
                                            </li>
                                            <li><a href="shop-default.html">OLED TVs</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop-default.html">Washing Machines</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li><a href="shop-default.html">Type Drying Clothes</a>
                                            </li>
                                            <li><a href="shop-default.html">Type Horizontal</a>
                                            </li>
                                            <li><a href="shop-default.html">Type Vertical</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-default.html">Refrigerators</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Health &amp; Beauty</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Equipments</a>
                                    </li>
                                    <li><a href="shop-default.html">Hair Care</a>
                                    </li>
                                    <li><a href="shop-default.html">Perfumer</a>
                                    </li>
                                    <li><a href="shop-default.html">Skin Care</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Computers &amp; Technologies</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Desktop PC</a>
                                    </li>
                                    <li><a href="shop-default.html">Laptop</a>
                                    </li>
                                    <li><a href="shop-default.html">Smartphones</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Jewelry &amp; Watches</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Gemstone Jewelry</a>
                                    </li>
                                    <li><a href="shop-default.html">Men's Watches</a>
                                    </li>
                                    <li><a href="shop-default.html">Women's Watches</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Phones &amp; Accessories</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Iphone 8</a>
                                    </li>
                                    <li><a href="shop-default.html">Iphone X</a>
                                    </li>
                                    <li><a href="shop-default.html">Sam Sung Note 8</a>
                                    </li>
                                    <li><a href="shop-default.html">Sam Sung S8</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Sport &amp; Outdoor</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Freezer Burn</a>
                                    </li>
                                    <li><a href="shop-default.html">Fridge Cooler</a>
                                    </li>
                                    <li><a href="shop-default.html">Wine Cabinets</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop-default.html">Babies &amp; Moms</a>
                            </li>
                            <li><a href="shop-default.html">Books &amp; Office</a>
                            </li>
                            <li><a href="shop-default.html">Cars &amp; Motocycles</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-1" name="brand">
                                <label for="brand-1">Adidas (3)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-2" name="brand">
                                <label for="brand-2">Amcrest (1)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-3" name="brand">
                                <label for="brand-3">Apple (2)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-4" name="brand">
                                <label for="brand-4">Asus (19)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-5" name="brand">
                                <label for="brand-5">Baxtex (20)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-6" name="brand">
                                <label for="brand-6">Adidas (11)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-7" name="brand">
                                <label for="brand-7">Casio (9)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-8" name="brand">
                                <label for="brand-8">Electrolux (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-9" name="brand">
                                <label for="brand-9">Gallaxy (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-10" name="brand">
                                <label for="brand-10">Samsung (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-11" name="brand">
                                <label for="brand-11">Sony (0)</label>
                            </div>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-slider" data-default-min="13" data-default-max="1300" data-max="1311" data-step="100" data-unit="$"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-1" name="review">
                                <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-2" name="review">
                                <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-3" name="review">
                                <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-4" name="review">
                                <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-5" name="review">
                                <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(1)</small></label>
                            </div>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Color</h4>
                            <div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-1" name="size">
                                <label for="color-1"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-2 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-2" name="size">
                                <label for="color-2"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-3 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-3" name="size">
                                <label for="color-3"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-4 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-4" name="size">
                                <label for="color-4"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-5 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-5" name="size">
                                <label for="color-5"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-6 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-6" name="size">
                                <label for="color-6"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-7 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-7" name="size">
                                <label for="color-7"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-8 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-8" name="size">
                                <label for="color-8"></label>
                            </div>
                        </figure>
                        <figure class="sizes">
                            <h4 class="widget-title">BY SIZE</h4><a href="#">L</a><a href="#">M</a><a href="#">S</a><a href="#">XL</a>
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
                                                            src="{{ asset('storage/' . $product->product_images[0]->image) }}"
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
