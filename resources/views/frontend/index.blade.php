@extends('frontend.layouts.app')

@section('title','welcome')

@section('content')
@parent

<div id="homepage-1">
    <div class="ps-home-banner ps-home-banner--1">
        <div class="ps-container">
            
            <div class="ps-section__right"><a class="ps-collection" href="#"><img src="{{ asset('frontend/img/slider/home-1/promotion-1.jpg') }}" alt=""></a>
                <a class="ps-collection" href="#"><img src="{{ asset('frontend/img/slider/home-1/promotion-2.jpg') }}" alt=""></a></div>
   

            <div class="ps-section__left">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                  @foreach ($sliders as $slider)
                  <div class="ps-banner"><a href="{{ $slider->url }}"><img src="{{ asset('storage/'.$slider->image) }}" alt="slier image"></a></div>
                  @endforeach
                </div>
                <div class="row banner_row">
                      <div class="col-md-6">
                       <a href="{{ $banners[0]->url }}" target="_blank"><img src="{{ asset('storage/'.$banners[0]->image) }}" alt="banner" class="banner_1">
                       </a> 
                     </div>
                    <div class="col-md-6">
                       <a href="{{ $banners[1]->url }}" target="_blank"><img src="{{ asset('storage/'.$banners[1]->image) }}" alt="banner" class="banner_2">
                       </a> 
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-site-features">
        <div class="ps-container">
            <div class="ps-block--site-features">
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-rocket"></i></div>
                    <div class="ps-block__right">
                        <h4>Free Delivery</h4>
                        <p>For all oders over $99</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-sync"></i></div>
                    <div class="ps-block__right">
                        <h4>90 Days Return</h4>
                        <p>If goods have problems</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                    <div class="ps-block__right">
                        <h4>Secure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                    <div class="ps-block__right">
                        <h4>24/7 Support</h4>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-gift"></i></div>
                    <div class="ps-block__right">
                        <h4>Gift Service</h4>
                        <p>Support gift service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-deal-of-day">
        <div class="scrolling-pagination">
        @foreach ($sub_categories_with_products as $sub_category)

        <div  class="ps-container">
            <div class="ps-section__header">
                <div class="ps-block--countdown-deal">
                    <div class="ps-block__left">
                        <h3>{{ $sub_category->name }}</h3>
                    </div>
                    {{-- <div class="ps-block__right">
                        <figure>
                            <figcaption>End in:</figcaption>
                            <ul class="ps-countdown" data-time="July 21, 2020 15:37:25">
                                <li><span class="days"></span></li>
                                <li><span class="hours"></span></li>
                                <li><span class="minutes"></span></li>
                                <li><span class="seconds"></span></li>
                            </ul>
                        </figure>
                    </div> --}}
                </div> 
                @foreach ($sub_category->sub_sub_categories as $item)
                         <a target="_blank" href="{{ $item->name }}">{{ $item->name }}</a>
                @endforeach
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   @foreach ($sub_category->products as $product)

                    <div class="ps-product ps-product--inner">
                        <div class="ps-product__thumbnail"><a href="{{ route('product',$product->slug) }}"> @if( count($product->product_images) > 0)  <img src="{{ asset('storage/'.$product->product_images['0']->image) }}" alt="{{ $product->name }}"> @endif </a>
                         @if ($product->discount > 0 )
                              <div class="ps-product__badge">
                                   @php
                                   echo  intval(($product->discount / $product->sale_price ) * 100 ) .'% off'
                                   @endphp 
                              </div>
                         @endif  
                            <ul class="ps-product__actions">
                                <li><a class="quick_cart_btn" product_id={{ $product->id }} title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                <li><a  title="Quick View"><i class="icon-eye"></i></a></li>
                                <li><a  title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                             </ul>
                        </div>
                        <div class="ps-product__container">
                            <p class="ps-product__price sale"> &#2547;{{ $product->sale_price }} <del>&#2547; {{ $product->regular_price }} </del><small> @php
                                echo  intval(($product->discount / $product->sale_price ) * 100) .'% off'
                                @endphp </small></p>
                            <div class="ps-product__content"><a class="ps-product__title" href="{{ route('product',$product->slug) }}">{{ $product->name }}</a>
                             
                            </div>
                        </div>
                    </div>
                
                   @endforeach   
                </div>
            </div>
        </div>

        

                    
        @endforeach
        {{-- {{ $sub_categories_with_products->links() }} --}}
    </div>
    </div>
    <div class="ps-home-ads">
        <div class="ps-container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{ asset('frontend/img/collection/home-1/1.jpg') }}" alt=""></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{ asset('frontend/img/collection/home-1/2.jpg') }}" alt=""></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection" href="#"><img src="{{ asset('frontend/img/collection/home-1/3.jpg')  }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-top-categories">
        <div class="ps-container">
            <h3>Top categories of the month</h3>
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/1.jpg') }}" alt="">
                        <p>Electronics</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/2.jpg') }}" alt="">
                        <p>Clothings</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/2.jpg') }}" alt="">
                        <p>Computers</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/3.jpg') }}" alt="">
                        <p>Home & Kitchen</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/4.jpg') }}" alt="">
                        <p>Health & Beauty</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/5.jpg') }}" alt="">
                        <p>Health & Beauty</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/6.jpg') }}" alt="">
                        <p>Jewelry & Watch</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                    <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="{{ asset('frontend/img/categories/7.jpg') }}" alt="">
                        <p>Technology Toys</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="ps-product-list ps-new-arrivals">
        <div class="ps-container">
            <div class="ps-section__header">
                <h3>Hot New Arrivals</h3>
                <ul class="ps-section__links">
                    <li><a href="shop-grid.html">Technologies</a></li>
                    <li><a href="shop-grid.html">Electronic</a></li>
                    <li><a href="shop-grid.html">Furnitures</a></li>
                    <li><a href="shop-grid.html">Clothing & Apparel</a></li>
                    <li><a href="shop-grid.html">Health & Beauty</a></li>
                    <li><a href="shop-grid.html">View All</a></li>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/1.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 32GB</a>
                                <p class="ps-product__price">$990.50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/1.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                <p class="ps-product__price">$1120.50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/1.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 128GB</a>
                                <p class="ps-product__price">$1220.50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/arrivals/2.jpg" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">$36.78 – $56.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/3.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price">$125.30</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/4.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price">$55.30</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/5.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price sale">$41.27 <del>$52.99 </del></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('frontend/img/products/arrivals/6.jpg') }}" alt=""></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">$41.27 <del>$62.39 </del></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
        <div class="ps-container">
            <form class="ps-form--newsletter" action="do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('extra_js')
{{-- infinite laravel scrolling js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: '.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
@endpush