@php
        $cart_content=Cart::content();
        $cart_total=Cart::subtotal();
        $cart_item=Cart::count();
        $wishlist_item = Cart::instance('wishlist')->count();
        $categories=App\Models\Category::where('status',1)->with('sub_categories.sub_sub_categories')->get();
@endphp
<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">

                            @foreach ($categories as $category)
                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{ route('category_product',$category->slug) }}"><i class="icon-laundry"></i> {{ $category->name }}  
                                  @if(count($category->sub_categories) > 0)   <span style="float:right"><i class="fa fa-angle-right" aria-hidden="true"></i></span> @endif
                                </a>
                                    @if(count($category->sub_categories) > 0)  
                                        <div class="mega-menu">
                                            <div class="mega-menu__column">
                                                <h4>Product Collections<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                @foreach ($category->sub_categories as $sub_category)
                                                <li class="current-menu-item"><a href="{{ route('sub_category_product',$sub_category->slug) }}">{{ $sub_category->name }}</a>
                                                    <ul class="mega-menu__list">
                                                        @foreach ($sub_category->sub_sub_categories as $item)
                                                                <li class="current-menu-item"><a href="{{ route('sub_sub_category_product',$item->slug) }}">{{ $item->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                
           
                        </ul>
                    </div>
                </div><a class="ps-logo" href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo_light.png') }}" alt=""></a>
            </div>
            <div class="header__center">
                <form class="ps-form--quick-search" action="index.html" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control">
                            <option value="0" selected="selected">All</option>
                            @foreach ($categories as $category)
                              <option class="level-0" value="{{ $category->name  }}">{{ $category->name }}</option>
                               @foreach ($category->sub_categories as $item)
                                 <option class="level-1" value="{{ $item->name }}"> {{ $item->name }}</option>  
                               @endforeach                        
                            @endforeach

                        </select>
                    </div>
                    <input class="form-control" type="text" placeholder="I'm shopping for...">
                    <button>Search</button>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions"><a class="header__extra" href="{{ route('wishlist_view') }}"><i class="icon-heart"></i><span id="wilist_item_header"><i>{{ $wishlist_item }}</i></span></a>
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i id="__cart_count">{{ $cart_item }}</i></span></a>
                        <div id="__cart_content_parent" class="ps-cart__content">
                            <div id="__cart_content_container" class="ps-cart__items">
                               @foreach ($cart_content as $item)

                                <div class="ps-product--cart-mobile {{ $item->rowId }}">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('storage/images/thumbnail_img/'.$item->options->image) }}" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" ><i cart_row_id="{{ $item->rowId }}" class="icon-cross __remove_cart"></i></a>{{ $item->name }}
                                       <small><span id="header_cart_qty_{{ $item->rowId }}" > {{ $item->qty }} </span> x &#2547;{{ $item->price }}</small>
                                    </div>
                                </div>
                                                                  
                              @endforeach
                            </div>
                            <div class="ps-cart__footer">
                                <h3 >Sub Total:<strong> <span>&#2547;</span> <span id="__cart_total_in_header" >{{ $cart_total }}</span> </strong></h3>
                                <figure><a class="ps-btn" href="{{ route('cart_view') }}">View Cart</a><a class="ps-btn" href="{{ route('order.index') }}">Checkout</a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                       @if (auth()->guest())
                         <div class="ps-block__left"><a href="{{ route('login') }}"><i class="icon-user"></i></a></div>     
                       @else
                        <li class="nav-item dropdown user_drop_nav">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right user_drop_nav_item" aria-labelledby="navbarDropdown">
                                <a href="{{ route('orders') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="ps-container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">

                            @foreach ($categories as $category)
                                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{ route('category_product',$category->slug) }}"><i class="icon-laundry"></i> {{ $category->name }}  
                                  @if(count($category->sub_categories) > 0)   <span style="float:right"><i class="fa fa-angle-right" aria-hidden="true"></i></span> @endif
                                </a>
                                    @if(count($category->sub_categories) > 0)  
                                        <div class="mega-menu">
                                            <div class="mega-menu__column">
                                                <h4>Product Collections<span class="sub-toggle"></span></h4>
                                                <ul class="mega-menu__list">
                                                @foreach ($category->sub_categories as $sub_category)
                                                <li class="current-menu-item"><a href="{{ route('sub_category_product',$sub_category->slug) }}">{{ $sub_category->name }}</a>
                                                    <ul class="mega-menu__list">
                                                        @foreach ($sub_category->sub_sub_categories as $item)
                                                                <li class="current-menu-item"><a href="{{ route('sub_sub_category_product',$item->slug) }}">{{ $item->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                
           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation__right">
                <ul class="menu">
                    <li class="menu-item-has-children"><a href="/">Home</a></li>
       
                    <li class="menu-item-has-children has-mega-menu"><a href="#">Pages</a><span class="sub-toggle"></span>
                        <div class="mega-menu">
                            <div class="mega-menu__column">
                                <h4>Basic Page<span class="sub-toggle"></span></h4>
                                <ul class="mega-menu__list">
                                    <li class="current-menu-item "><a href="about-us.html">About Us</a>
                                    </li>
                                    <li class="current-menu-item "><a href="contact-us.html">Contact</a>
                                    </li>
                                    <li class="current-menu-item "><a href="faqs.html">Faqs</a>
                                    </li>
                                    <li class="current-menu-item "><a href="comming-soon.html">Comming Soon</a>
                                    </li>
                                    <li class="current-menu-item "><a href="404-page.html">404 Page</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Vendor Pages<span class="sub-toggle"></span></h4>
                                <ul class="mega-menu__list">
                                    <li class="current-menu-item "><a href="become-a-vendor.html">Become a Vendor</a>
                                    </li>
                                    <li class="current-menu-item "><a href="vendor-store.html">Vendor Store</a>
                                    </li>
                                    <li class="current-menu-item "><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>
                                    </li>
                                    <li class="current-menu-item "><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"><a href="#">Blogs</a><span class="sub-toggle"></span>
                        <div class="mega-menu">
                            <div class="mega-menu__column">
                                <h4>Blog Layout<span class="sub-toggle"></span></h4>
                                <ul class="mega-menu__list">
                                    <li class="current-menu-item "><a href="blog-grid.html">Grid</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-list.html">Listing</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-small-thumb.html">Small Thumb</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-left-sidebar.html">Left Sidebar</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-right-sidebar.html">Right Sidebar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Single Blog<span class="sub-toggle"></span></h4>
                                <ul class="mega-menu__list">
                                    <li class="current-menu-item "><a href="blog-detail.html">Single 1</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-detail-2.html">Single 2</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-detail-3.html">Single 3</a>
                                    </li>
                                    <li class="current-menu-item "><a href="blog-detail-4.html">Single 4</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navigation__extra">
                    <li><a href="{{ url('/request/for/product') }}">Request For Product</a></li>
                    <li><a href="#">Tract your order</a></li>
                
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p>Welcome to Shopolox Online Shopping Store !</p>
        </div>
        <div class="header__right">
            <ul class="navigation__extra">
                {{-- <li><a href="#">Sell on Martfury</a></li> --}}
                <li><a href="#">Tract your order</a></li>
                {{-- <li>
                    <div class="ps-dropdown"><a href="#">US Dollar</a>
                        <ul class="ps-dropdown-menu">
                            <li><a href="#">Us Dollar</a></li>
                            <li><a href="#">Euro</a></li>
                        </ul>
                    </div>
                </li>                     --}}
            </ul>
        </div>
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{ url('/') }}"><img src="img/logo_light.png" ></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('frontend/img/products/clothing/7.jpg') }}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('frontend/img/products/clothing/5.jpg') }}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong>$59.99</strong></h3>
                            <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="{{ route('order.create') }}">Checkout</a></figure>
                        </div>
                    </div>
                </div>
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><i class="icon-user"></i></div>
                    <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
</header>
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        <div class="ps-cart--mobile">
            <div class="ps-cart__content">
                <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('frontend/img/products/clothing/7.jpg') }}" alt=""></a></div>
                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                    </div>
                </div>
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong>$59.99</strong></h3>
                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
            </div>
        </div>
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">


            @foreach ($categories as $category)

            <li class="current-menu-item menu-item-has-children has-mega-menu">  <a href="{{ route('category_product',$category->slug) }}"><i class="icon-laundry"></i> {{ $category->name }} </a>
              @if(count($category->sub_categories) > 0)  <span class="sub-toggle"></span> @endif
           
                @if(count($category->sub_categories) > 0)  
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>Product Collections<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                            @foreach ($category->sub_categories as $sub_category)
                            <li class="current-menu-item"><a href="{{ route('sub_category_product',$sub_category->slug) }}">{{ $sub_category->name }}</a>
                                <ul class="mega-menu__list">
                                    @foreach ($sub_category->sub_sub_categories as $item)
                                            <li class="current-menu-item"><a href="{{ route('sub_sub_category_product',$item->slug) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                        </ul>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach

        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="index.html">Home</a>  </li>
           
            <li class="menu-item-has-children has-mega-menu"><a href="#">Pages</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Basic Page<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="about-us.html">About Us</a>
                            </li>
                            <li class="current-menu-item "><a href="contact-us.html">Contact</a>
                            </li>
                            <li class="current-menu-item "><a href="faqs.html">Faqs</a>
                            </li>
                            <li class="current-menu-item "><a href="comming-soon.html">Comming Soon</a>
                            </li>
                            <li class="current-menu-item "><a href="404-page.html">404 Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Vendor Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="become-a-vendor.html">Become a Vendor</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-store.html">Vendor Store</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>
                            </li>
                            <li class="current-menu-item "><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item-has-children has-mega-menu"><a href="#">Blogs</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Blog Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-grid.html">Grid</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-list.html">Listing</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-small-thumb.html">Small Thumb</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-left-sidebar.html">Left Sidebar</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-right-sidebar.html">Right Sidebar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Single Blog<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="blog-detail.html">Single 1</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-2.html">Single 2</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-3.html">Single 3</a>
                            </li>
                            <li class="current-menu-item "><a href="blog-detail-4.html">Single 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>



    {{-- product quick view modal  --}}

    <div class="modal  " id="product_quickview_modal" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span id="quick_p_modal_close" class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
        <article class="ps-product--detail ps-product--fullwidth ps-product--quickview"><div class="ps-product__header">
            <div class="ps-product__thumbnail" >
                <div class="ps-product__images " id="quick_p_img_container" >
              
                </div>
            </div>
            <div style="margin-bottom:20px;" class="ps-product__info">
                <h4 id="quick_p_name">  </h4>
                <div class="ps-product__meta">
            </div>
                <h4 class="ps-product__price  sale "><span>&#2547;</span><span id="quick_p_sale_price"></span>  <del>&#2547;</del><del id="quick_p_regular_price"></del> </h4>
                <div class="ps-product__desc">
                    <div class="ps-list--dot">
                        <p id="quick_p_details">  </p>  
                    </div>
                </div>
        <div class="pr_switch_wrap">
        <div class="product-attributes" >
        {{-- for color  --}}
         <div class="visual-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
            data-type="visual">
            <label class="attribute-name">Color</label>
            <div class="attribute-values">
                <ul id="quick_p_color_list" class="visual-swatch color-swatch attribute-swatch">
                   
                </ul>
            </div>
         </div>
        {{-- for color  --}}

        {{-- for size  --}}


        <div class="text-swatches-wrapper attribute-swatches-wrapper attribute-swatches-wrapper form-group product__attribute product__color"
            data-type="text">
            <label class="attribute-name">Size</label>
            <div class="attribute-values">
                <ul id="quick_p_size_list"  class="text-swatch attribute-swatch color-swatch">

                </ul>
            </div>
        </div>

        {{-- for size  --}}


        </div>
        
                    </div>
                    <div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
                    <figure>
                        <figcaption>Quantity</figcaption>
                        <div class="form-group--number">
                            <button onclick="incrementQty()" class="up"><i class="fa fa-plus"></i></button>
                            <button onclick="dicrementQty()" class="down"><i
                                    class="fa fa-minus"></i></button>
                            <input id="quick_p_quantity" class="form-control" name="quantity" type="text"
                                value="1">
                        </div>
                    </figure>
                    <br>
                        <button class="ps-btn" id="quick_p_cart_btn" type="submit">Add to cart</button>
                        <button class="ps-btn" id="quick_p_buy_btn" type="submit" name="checkout">Buy Now</button>
                        <a class="ps-btn js-add-to-wishlist-button" id="quick_p_wishlist_btn" href="#" ><i class="icon-heart"></i></a>
                     
                    </div>
            </div>
        </div>
        </article>
        </div>
        </div>
        </div>


    {{-- quick view closed  --}}




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