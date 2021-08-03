@extends('frontend.layouts.app')

@section('title','product')

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
                                           <div class="item"><a href="{{ asset('storage/'.$item->image) }}"><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $product->name }}"></a></div>
                                        @endforeach
                                     </div>
                                </div>
                            </figure>
                            <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                @foreach ($product->product_images as $item)
                                <div class="item"><img src="{{ asset('storage/'.$item->image) }}" alt="{{ $product->name }}"></div>
                               @endforeach
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>{{ $product->name }}</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="shop-default.html">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">&#2547;{{ $product->sale_price }}   @if($product->discount > 0) <del>&#2547;{{ $product->regular_price }}</del> @endif</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__variations">
                                <figure>
                                    <figcaption>{{ $product_attributes[0]->name }}</figcaption>
                                    <div class="ps-variant ps-variant--color color--1"><span class="ps-variant__tooltip">Black</span></div>
                                    <div class="ps-variant ps-variant--color color--2"><span class="ps-variant__tooltip"> Gray</span></div>
                                </figure>
                            </div>
                            <div class="ps-product__shopping">
                                <figure>
                                    <figcaption>Quantity</figcaption>
                                    <div class="form-group--number">
                                        <button class="up"><i class="fa fa-plus"></i></button>
                                        <button class="down"><i class="fa fa-minus"></i></button>
                                        <input class="form-control" type="text" placeholder="1">
                                    </div>
                                </figure><a class="ps-btn ps-btn--gray" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                            <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                                <p><strong>SKU:</strong> SF1133569600-1</p>
                                <p class="categories"><strong> Categories:</strong><a href="#">Consumer Electronics</a>,<a href="#"> Refrigerator</a>,<a href="#">Babies & Moms</a></p>
                                <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                            </div>
                            <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>
                        </div>
                    </div>
                    <div class="ps-product__content ps-tab-root">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">Description</a></li>
                            <li><a href="#tab-2">Specification</a></li>
                            <li><a href="#tab-4">Reviews (1)</a></li>
                            <li><a href="#tab-5">Questions and Answers</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    <h5>Embodying the Raw, Wayward Spirit of Rock 'N' Roll</h5>
                                    <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                                    <p>Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering. Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound that is both articulate and pronounced. The analogue knobs allow you to fine tune the controls to your personal preferences while the guitar-influenced leather strap enables easy and stylish travel.</p><img class="mb-30" src="img/products/detail/content/description.jpg" alt="">
                                    <h5>What do you get</h5>
                                    <p>Sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                                    <p>Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering. Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound that is both articulate and pronounced. The analogue knobs allow you to fine tune the controls to your personal preferences while the guitar-influenced leather strap enables easy and stylish travel.</p>
                                    <p>The FM radio is perhaps gone for good, the assumption apparently being that the jury has ruled in favor of streaming over the internet. The IR blaster is another feature due for retirement – the S6 had it, then the Note5 didn’t, and now with the S7 the trend is clear.</p>
                                    <h5>Perfectly Done</h5>
                                    <p>Meanwhile, the IP68 water resistance has improved from the S5, allowing submersion of up to five feet for 30 minutes, plus there’s no annoying flap covering the charging port</p>
                                    <ul class="pl-0">
                                        <li>No FM radio (except for T-Mobile units in the US, so far)</li>
                                        <li>No IR blaster</li>
                                        <li>No stereo speakers</li>
                                    </ul>
                                    <p>If you’ve taken the phone for a plunge in the bath, you’ll need to dry the charging port before plugging in. Samsung hasn’t reinvented the wheel with the design of the Galaxy S7, but it didn’t need to. The Gala S6 was an excellently styled device, and the S7 has managed to improve on that.</p>
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
                                                <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                            </div>
                                            <div class="ps-block__star"><span>4 Star</span>
                                                <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                            </div>
                                            <div class="ps-block__star"><span>3 Star</span>
                                                <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                            </div>
                                            <div class="ps-block__star"><span>2 Star</span>
                                                <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                            </div>
                                            <div class="ps-block__star"><span>1 Star</span>
                                                <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                        <form class="ps-form--review" action="index.html" method="get">
                                            <h4>Submit Your Review</h4>
                                            <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
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
                                                <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" placeholder="Your Name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                    <div class="form-group">
                                                        <input class="form-control" type="email" placeholder="Your Email">
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
                            <div class="ps-tab" id="tab-5">
                                <div class="ps-block--questions-answers">
                                    <h3>Questions and Answers</h3>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Shipping worldwide</p>
                    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                </aside>
                <aside class="widget widget_sell-on-site">
                    <p><i class="icon-store"></i> Sell on Martfury?<a href="#"> Register Now !</a></p>
                </aside>
                <aside class="widget widget_ads"><a href="#"><img src="img/ads/product-ads.png" alt=""></a></aside>
                <aside class="widget widget_same-brand">
                    <h3>Same Brand</h3>
                    <div class="widget__content">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                <div class="ps-product__badge">-37%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/6.jpg" alt=""></a>
                                <div class="ps-product__badge">-5%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Youngshop</a>
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
                                    <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>
                                </div>
                            </div>
                        </div>
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
                           <div class="ps-product__thumbnail"><a href="{{ route('product',$c_product->slug) }}"><img src="{{ asset('storage/'.$c_product->product_images[0]->image) }}" alt=""></a>
                               <ul class="ps-product__actions">
                                   <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                   <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                   <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                   <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                               </ul>
                           </div>
                           <div class="ps-product__container">
                               <div class="ps-product__content"><a class="ps-product__title" href="{{ route('product',$c_product->slug) }}">{{ $c_product->name }}</a>
                                   <div class="ps-product__rating">
                                       <select class="ps-rating" data-read-only="true">
                                           <option value="1">1</option>
                                           <option value="1">2</option>
                                           <option value="1">3</option>
                                           <option value="1">4</option>
                                           <option value="2">5</option>
                                       </select><span>01</span>
                                   </div>
                                   <p class="ps-product__price">&#2547;{{ $c_product->sale_price }}</p>
                               </div>
                               <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('product',$c_product->slug) }}">{{ $c_product->name }}</a>
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
                <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach ($related_products as $r_product)
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="{{ route('product',$r_product->slug) }}"><img src="{{ asset('storage/'.$r_product->product_images[0]->image) }}" alt=""></a>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content"><a class="ps-product__title" href="{{ route('product',$r_product->slug) }}">{{ $r_product->name }}</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price">&#2547;{{ $r_product->sale_price }}</p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('product',$r_product->slug) }}">{{ $r_product->name }}</a>
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
    
@endpush