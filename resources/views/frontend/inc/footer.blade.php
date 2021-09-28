<footer class="ps-footer">
    <div class="bg-gray-14 py-2 hide">
        <div class="container-fluid">
            <div class="foooter desktop_footer">

                <div class="fpart-first">

                    <div class="row">
                        <div class="contact col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <ul>
                                <li style="list-style-type:none" class="address">

                                    <router-link to="/">
                                        <img src="{{ asset('frontend/img/logo_light.png') }}"
                                            class="img-fluid site_logo" />
                                    </router-link>

                                    <p class="short_desc">
                                        <span style="
                        font-size: 16px;
                        color: #199EFF;
                        font-weight: 700;
                      ">shopolox.com</span>
                                        is a complete e-commerce market place.
                                        Here, consumers of all ages can buy every essential product
                                        of the day, from gadgets, electronics, home appliances,
                                        leather goods, jewelry, baby accessories, cosmetics, fashion
                                        and lifestyle products to affordable prices at home
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="quick_link_container">
                                <div class="quick_link">
                                    <h5>Quick Links</h5>
                                    <div class="line"></div>
                                    <ul class="link_line">
                                        <li><a href="/" class="router-link-active">Home</a></li>
                                        <li><a href="/about/us"
                                                class="">About Us</a></li>
                    <li><a href="
                                                /contact/us"
                                                class="">Contact Us</a></li>
                  </ul>
                </div>

              <div class="
                                                quick_link">
                                                <h5>Information</h5>
                                                <div class="line"></div>
                                                <ul class="link_line">
                                                    <li><a href="/how/to/buy"
                                                            class="">How to order</a></li>
                  <li><a href="
                                                            /return/policy"
                                                            class="">Return Policy</a></li>
                  <li><a href="
                                                            /shipment"
                                                            class="">Shipment </a></li>
                  <li><a href="
                                                            /about/seller"
                                                            class="">About Seller </a></li>
                </ul>
              </div>

             </div>
            </div>

            <div class="
                                                            col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                            <div class="news_letter">
                                                                <h5>Follow Us</h5>
                                                                <div class="line"></div>
                                                                <form>
                                                                    <div class="row">
                                                                        <div class="subscribe_container">
                                                                            <form method="POST" action="">
                                                                                <div class="form-group s_form">
                                                                                    <label for="subscribe"
                                                                                        class="form-label">submit
                                                                                        email to recieve latest offer
                                                                                        .</label>
                                                                                    <input type="email"
                                                                                        style="height: 44px;" required
                                                                                        placeholder="example@gmail.com"
                                                                                        class="form-control"
                                                                                        name="email" />

                                                                                    <button type="submit"
                                                                                        class="email_btn">
                                                                                        <i class="fa fa-envelope"></i>
                                                                                    </button>

                                                                                </div>

                                                                            </form>
                                                                            <div class="social-icon">
                                                                                <a href="https://www.youtube.com/"
                                                                                    target="_blank"
                                                                                    class="social-wrape"><i
                                                                                        class="fa fa-youtube-square f-icon"></i>

                                                                                </a>
                                                                                <a href="#" target="_blank"
                                                                                    class="social-wrape"
                                                                                    style="margin-top: 10px">
                                                                                    <i class="fa fa-twitter f-icon"></i>
                                                                                </a>
                                                                                <a href="https://linkedin.com/"
                                                                                    target="_blank"
                                                                                    class="social-wrape"
                                                                                    style="margin-top: 10px"><i
                                                                                        class="fa fa-linkedin f-icon"></i></a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                </div>
                            </div>



                        </div>

                        <div class="fpart-second">
                     
                                <div id="powered" class="clearfix"></div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="payment-card"><img
                                                src="{{ asset('frontend/ssl.png') }}"></div>
                                    </div>
                                </div>

                                
                        <div class="end_footer">

                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">
                                <p class="copy_right_info">
                                    Copyright © shopolox.com 2021. All rights reserved.
                                </p>
                            </div>

                        </div>
                      
                        </div>



                    </div>
                </div>
            </div>
</footer>
{{-- <div class="ps-popup" id="subscribe" data-time="500">
    <div class="ps-popup__content bg--cover" data-background="{{ asset('frontend/img/bg/subscribe.jpg') }}"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
        <form class="ps-form--subscribe-popup" action="index.html" method="get">
            <div class="ps-form__content">
                <h4>Get <strong>25%</strong> Discount</h4>
                <p>Subscribe to the Martfury mailing list <br /> to receive updates on new arrivals, special offers <br /> and our promotions.</p>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email Address" required>
                        <button class="ps-btn">Subscribe</button>
                    </div>
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="not-show" name="not-show">
                        <label for="not-show">Don't show this popup again</label>
                    </div>
            </div>
        </form>
    </div>
</div> --}}
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left">
        <div style="margin:50% 90%" class="my_loading">
            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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












{{-- product quick view modal --}}

<div class="modal  " id="product_quickview_modal" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
    aria-modal="true" style="padding-right: 16px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span id="quick_p_modal_close" class="modal-close" data-dismiss="modal"><i
                    class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__images " id="quick_p_img_container">

                        </div>
                    </div>
                    <div style="margin-bottom:20px;" class="ps-product__info">
                        <h4 id="quick_p_name"> </h4>
                        <div class="ps-product__meta">
                        </div>
                        <h4 class="ps-product__price  sale "><span>&#2547;</span><span id="quick_p_sale_price"></span>
                            <del>&#2547;</del><del id="quick_p_regular_price"></del> </h4>
                        <div class="ps-product__desc">
                            <div class="ps-list--dot">
                                <p id="quick_p_details"> </p>
                            </div>
                        </div>
                        <div class="pr_switch_wrap">
                            <div class="product-attributes">
                                {{-- for color --}}
                                <div class="visual-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
                                    data-type="visual">
                                    <label class="attribute-name">Color</label>
                                    <div class="attribute-values">
                                        <ul id="quick_p_color_list" class="visual-swatch color-swatch attribute-swatch">

                                        </ul>
                                    </div>
                                </div>
                                {{-- for color --}}

                                {{-- for size --}}


                                <div class="text-swatches-wrapper attribute-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
                                    data-type="text">
                                    <label class="attribute-name">Size</label>
                                    <div class="attribute-values">
                                        <ul id="quick_p_size_list" class="text-swatch attribute-swatch color-swatch">

                                        </ul>
                                    </div>
                                </div>

                                {{-- for size --}}


                            </div>

                        </div>
                        <div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
                        <figure>
                            <figcaption>Quantity</figcaption>
                            <div class="form-group--number">
                                <button onclick="incrementQty()" class="up"><i
                                        class="fa fa-plus"></i></button>
                                <button onclick="dicrementQty()" class="down"><i
                                        class="fa fa-minus"></i></button>
                                <input id="quick_p_quantity" class="form-control" name="quantity" type="text"
                                    value="1">
                            </div>
                        </figure>
                        <br>
                        <button class="ps-btn" id="quick_p_cart_btn" type="submit">Add to cart</button>
                        <button class="ps-btn" id="quick_p_buy_btn" type="submit" name="checkout">Buy
                            Now</button>
                        <a class="ps-btn js-add-to-wishlist-button" id="quick_p_wishlist_btn" href="#"><i
                                class="icon-heart"></i></a>

                    </div>
                </div>
        </div>
        </article>
    </div>
</div>
</div>


{{-- quick view closed --}}




<script>
    function incrementQty() {
        let input_value = document.getElementById('quick_p_quantity').value;
        document.getElementById('quick_p_quantity').value = parseInt(input_value) + 1;
    }

    function dicrementQty() {
        let input_value = document.getElementById('quick_p_quantity').value;
        if (parseInt(input_value) > 1) {
            document.getElementById('quick_p_quantity').value = parseInt(input_value) - 1;
        } else {
            alert('quantity should be at least one');
        }

    }
</script>
