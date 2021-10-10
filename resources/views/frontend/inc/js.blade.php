<script src="{{ asset('frontend/plugins/jquery-1.12.4.min.js ') }}"></script>
<script src="{{ asset('frontend/plugins/popper.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/slick-animation.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/gmap3.min.js') }}"></script>
<!-- custom scripts-->
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>



<script>
    $(document).ready(function() {
        
       
        //cart from single product
        $('.ps-product__shopping').find('#cart_btn').on('click', function(e) {
            console.log("adding cart");
            let $action = $(this).attr('route');
            let $quantity = document.getElementById('p_quantity').value;
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            let $color = '';
            for (var i in document.getElementsByClassName("variant_color")) {
                if (document.getElementsByClassName("variant_color")[i].checked) {
                    $color += document.getElementsByClassName("variant_color")[i].value
                }
            }

            let $size = '';
            for (var i in document.getElementsByClassName("variant_size")) {
                if (document.getElementsByClassName("variant_size")[i].checked) {
                    $size += document.getElementsByClassName("variant_size")[i].value
                }
            }


            let $weight = '';
            for (var i in document.getElementsByClassName("variant_weight")) {
                if (document.getElementsByClassName("variant_weight")[i].checked) {
                    $size += document.getElementsByClassName("variant_weight")[i].value
                }
            }
             
             $data = {
                    'quantity': $quantity,
                    'size': $size,
                    'color': $color,
                    'weight': $weight,
                } ;
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

        });

         //buy from single product
        $('.ps-product__shopping').find('#buy_now_button').on('click', function(e) {
            let $action = $(this).attr('route');
            let $quantity = document.getElementById('p_quantity').value;
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            let $color = '';
            for (var i in document.getElementsByClassName("variant_color")) {
                if (document.getElementsByClassName("variant_color")[i].checked) {
                    $color += document.getElementsByClassName("variant_color")[i].value
                }
            }

            let $size = '';
            for (var i in document.getElementsByClassName("variant_size")) {
                if (document.getElementsByClassName("variant_size")[i].checked) {
                    $size += document.getElementsByClassName("variant_size")[i].value
                }
            }


            let $weight = '';
            for (var i in document.getElementsByClassName("variant_weight")) {
                if (document.getElementsByClassName("variant_weight")[i].checked) {
                    $size += document.getElementsByClassName("variant_weight")[i].value
                }
            }
             
             $data = {
                    'quantity': $quantity,
                    'size': $size,
                    'color': $color,
                    'weight': $weight,
                } ;
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        toastMessage(resp.message);
                        var url = "http://127.0.0.1:8000/order";
                        $(location).attr('href',url);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

        });


         //quick cart check 
         $('.ps-product__actions').find('.quick_cart_btn').on('click',function(){
              let $prdouct_id = $(this).attr('product_id') ;
              let $action = '{{ url('api/add/cart') }}';
              let csrf_token = $('meta[name="csrf-token"]').attr('content');
              $data = { 'quantity': 1, 'size': '', 'color': '', 'weight': '',
            };
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action+'/'+$prdouct_id,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

         });

         //quick view product 
         $('.ps-product__actions').find('.quick_view_btn').on('click',function(){
              let $prdouct_id = $(this).attr('product_id') ;
              let $action = '{{ url('api/quick/view/product') }}';
              let csrf_token = $('meta[name="csrf-token"]').attr('content');

            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action+'/'+$prdouct_id,
                method: 'GET',
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        let p_colors = "";
                        let p_size = "" ;
                        resp.variants.forEach((item)=>{
                        
                          
                            if (item.name==="Black" || item.name==="Red" || item.name==="White" || item.name==="Green" || item.name==="Yellow" || item.name==="Navy") {
                                p_colors += `<li data-slug="blue" data-id="2"
                                                    class="attribute-swatch-item"
                                                    title="${item.name }">
                                                    <div class="custom-radio">
                                                        <label>
                                                            <input
                                                                class="form-control product-filter-item variant_color"
                                                                type="radio" name="color"
                                                                value="${item.name }" >
                                                            <span
                                                                class="${item.name }"></span>
                                                        </label>
                                                    </div>
                                                 </li>` 
                            }else if (item.name==="M" || item.name==="L" || item.name==="XL" || item.name==="XXL" || item.name==="S") {
                                            p_size += 
                                            `<li data-slug="xl" data-id="9"
                                                    class="attribute-swatch-item pe-none">
                                                    <div>
                                                        <label>
                                                            <input class="product-filter-item variant_size"
                                                                type="radio" name="size"
                                                                value="${item.name}">
                                                            <span>${item.name}</span>
                                                        </label>
                                                    </div>
                                                </li>`
                            }
                                    

                            $('#product_quickview_modal').find('#quick_p_color_list').html(p_colors);
                            $('#product_quickview_modal').find('#quick_p_size_list').html(p_size);
         
                      });

                     let img  = `<img src="/storage/${resp.product.product_images[0].image}" class="quick_p_image">`
                     $('#product_quickview_modal').find('#quick_p_img_container').html(img) ;
                     let route = 'http://127.0.0.1:8000/api/add/cart/'+resp.product.id; 
                     $('#product_quickview_modal').find('#quick_p_cart_btn').attr('route',route); 
                     $('#product_quickview_modal').find('#quick_p_buy_btn').attr('route',route); 
                     $('#product_quickview_modal').find('#quick_p_wishlist_btn').attr('route',route); 

                     document.getElementById('quick_p_name').innerHTML = resp.product.name ;
                     document.getElementById('quick_p_sale_price').innerHTML = resp.product.sale_price ;
                     document.getElementById('quick_p_regular_price').innerHTML = resp.product.regular_price ;
                     document.getElementById('quick_p_details').innerHTML = resp.product.details ;
                     document.getElementById('product_quickview_modal').style.display = "block" ;
                     
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

         });


         //quick product modal close 
         $('#product_quickview_modal').find('#quick_p_modal_close').on('click', function(e) {
            $('#product_quickview_modal').hide();
         });    


         //quick product cart from quick view
         $('#product_quickview_modal').find('#quick_p_cart_btn').on('click', function(e) {
            console.log("adding cart");
            let $action = $(this).attr('route');
            let $quantity = document.getElementById('quick_p_quantity').value;
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            let $color = '';
            for (var i in document.getElementsByClassName("variant_color")) {
                if (document.getElementsByClassName("variant_color")[i].checked) {
                    $color += document.getElementsByClassName("variant_color")[i].value
                }
            }

            let $size = '';
            for (var i in document.getElementsByClassName("variant_size")) {
                if (document.getElementsByClassName("variant_size")[i].checked) {
                    $size += document.getElementsByClassName("variant_size")[i].value
                }
            }


            let $weight = '';
            for (var i in document.getElementsByClassName("variant_weight")) {
                if (document.getElementsByClassName("variant_weight")[i].checked) {
                    $size += document.getElementsByClassName("variant_weight")[i].value
                }
            }
             
             $data = {
                    'quantity': $quantity,
                    'size': $size,
                    'color': $color,
                    'weight': $weight,
                } ;
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

         });

         //quick product buy from quick view
         $('#product_quickview_modal').find('#quick_p_buy_btn').on('click', function(e) {

            let $action = $(this).attr('route');
            let $quantity = document.getElementById('quick_p_quantity').value;
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            let $color = '';
            for (var i in document.getElementsByClassName("variant_color")) {
                if (document.getElementsByClassName("variant_color")[i].checked) {
                    $color += document.getElementsByClassName("variant_color")[i].value
                }
            }

            let $size = '';
            for (var i in document.getElementsByClassName("variant_size")) {
                if (document.getElementsByClassName("variant_size")[i].checked) {
                    $size += document.getElementsByClassName("variant_size")[i].value
                }
            }


            let $weight = '';
            for (var i in document.getElementsByClassName("variant_weight")) {
                if (document.getElementsByClassName("variant_weight")[i].checked) {
                    $size += document.getElementsByClassName("variant_weight")[i].value
                }
            }
             
             $data = {
                    'quantity': $quantity,
                    'size': $size,
                    'color': $color,
                    'weight': $weight,
                } ;
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        toastMessage(resp.message);
                        var url = "http://127.0.0.1:8000/order";
                        $(location).attr('href',url);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }


                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

         });

        
       
        //get cart content
        function getCartContent() {

            let $action = '{{ url('api/cart/content') }}';
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                type: "GET",
                success: function(resp) {
                    if (resp.status == "OK") {
                      //  console.log(resp.cart_content);
                        document.getElementById('__cart_count').innerHTML = resp.item_count;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        let template = "";
                        Object.keys(resp.cart_content).forEach(item => {
                            let ele = resp.cart_content[item]
                            template += ` <div class="ps-product--cart-mobile ${ele.rowId}">
                            <div class="ps-product__thumbnail"><img src="/storage/images/thumbnail_img/${ele.options.image}" > </div>
                            <div class="ps-product__content"><a class="ps-product__remove" ><i cart_row_id="${ele.rowId}" class="icon-cross __remove_cart"></i></a>${ele.name }
                                <small> <span id="header_cart_qty_${ele.rowId}"> ${ele.qty} </span> x &#2547; ${ele.price}</small>
                                </div>
                            </div> `
                        })

                        $('#__cart_content_parent').find("#__cart_content_container").html(template);
                    }
                },
                error: function(e) {}
            });
        }

        //increase   cart content
        $('body').on('click','.cart_item_increment',function(){
            $rowId = $(this).attr('cart_row_id') ;
            let c_qty = document.getElementById('__cart_update_input_'+$rowId).value ;
            let quantity = parseInt(c_qty) + 1 ;
            let $action = '{{ url('api/cart/item/update') }}';
            $data = { 'rowId' : $rowId,  'qty' : quantity } ;
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action ,
                type: "POST",
                data : $data ,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == "OK") {
                        document.getElementById('__cart_count').innerHTML = resp.item_count;
                        document.getElementById('__cart_update_input_'+$rowId).value = resp.updated_qty;
                        document.getElementById('header_cart_qty_'+$rowId).innerHTML = resp.updated_qty;
                        document.getElementById('__cart_total_in_cart_view').innerHTML = resp.cart_total;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        document.getElementById('__total_of_cart_item_'+$rowId).innerHTML = resp.updated_qty * resp.item_price;
                    }
                },
                error: function(e) {}
            });
        });



        //increase   cart content
        $('body').on('click','.cart_item_dicrement',function(){
           $rowId = $(this).attr('cart_row_id') ;
           let c_qty = document.getElementById('__cart_update_input_'+$rowId).value ;
           let quantity = parseInt(c_qty) - 1 ;
            if (quantity ==0 ) {
                alert('qty should be at least one') ;
                document.getElementById('__cart_update_input_'+$rowId).value  = 1;
                return ;
            }
            let $action = '{{ url('api/cart/item/update') }}';
            $data = { 'rowId' : $rowId,  'qty' : quantity } ;
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action ,
                type: "POST",
                data : $data ,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == "OK") {
                        document.getElementById('__cart_count').innerHTML = resp.item_count;
                        document.getElementById('__cart_update_input_'+$rowId).value = resp.updated_qty;
                        document.getElementById('header_cart_qty_'+$rowId).innerHTML = resp.updated_qty;
                        document.getElementById('__cart_total_in_cart_view').innerHTML = resp.cart_total;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        document.getElementById('__total_of_cart_item_'+$rowId).innerHTML =  resp.updated_qty * resp.item_price;
                    }
                },
                error: function(e) {}
            });
        });


        //remove  cart content
        $('body').on('click','.__remove_cart',function(e){
            let $action = '{{ url('api/cart/remove') }}';
            $rowId = $(this).attr('cart_row_id') ;
            console.log($rowId);
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action + '/' + $rowId,
                type: "GET",
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == "OK") {
                        document.getElementById('__cart_count').innerHTML = resp.item_count;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        document.getElementById('__cart_total_in_cart_view').innerHTML = resp.cart_total;
                        $('body').find('.'+$rowId).remove(); 
                        toastMessage(resp.message);
                    }
                },
                error: function(e) {}
            });
        });



        //quick cart check 
        $('.ps-product__actions').find('.quick_wishlist_btn').on('click',function(){
              let $prdouct_id = $(this).attr('product_id') ;
              let $action = '{{ url('api/add/wishlist') }}';
              let csrf_token = $('meta[name="csrf-token"]').attr('content');
              $data = { 'quantity': 1 };
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action+'/'+$prdouct_id,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        document.getElementById('wilist_item_header').innerHTML = resp.wishlist_item ;
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

        });


         //quick cart check 
         $('body').on('click','.__wishlist_to_cart',function(){

              let $action =  $(this).attr('route');
              let csrf_token = $('meta[name="csrf-token"]').attr('content');
              let $rowId =  $(this).attr('rowId');
              let qty = document.getElementById('__wishlist_input_'+$rowId).value
              $data = { 'quantity': qty, 'size': '', 'color': '', 'weight': '','wishlist_rowId' : $rowId };
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        getCartContent();
                        document.getElementById('wilist_item_header').innerHTML = resp.wishlist_item ;
                        $('body').find('.'+$rowId).remove(); 
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });

         });


        //remove  wishlist content
        $('body').on('click','.__remove_wishlist',function(e){
            let $action = '{{ url('api/wishlist/remove') }}';
            $rowId = $(this).attr('wishlist_row_id') ;
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action + '/' + $rowId,
                type: "GET",
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == "OK") {
                        document.getElementById('wilist_item_header').innerHTML = resp.wishlist_item ;
                        $('body').find('.'+$rowId).remove(); 
                        toastMessage(resp.message);
                    }
                },
                error: function(e) {}
            });
        });


        //category wise sub category
        $('#checkout_form').on('change','#customer_city',function(e) {
                let id=$(this).val();
                let $action = '{{ url('api/city/wise/sub/city') }}'
                $.ajax({
                    url: $action+'/'+id,
                    type: "GET",
                    cache: false,
                    success: function(resp) {
                        console.log(resp);
                        let option=`<option disabled> Select  Sub City</option>`;
                        if(resp.sub_cities.length>0){
                            resp.sub_cities.forEach(element=>{
                                option+=`<option value=${element.id}>${element.name}</option>`
                            })
                          let sub_total = document.getElementById('checkout_sub_total').innerHTML  ;
                          document.getElementById('shipping_cost').innerHTML = resp.city.delivery_charge  ;
                    
                          document.getElementById('checkout_total').innerHTML = parseInt(sub_total) + parseInt(resp.city.delivery_charge) ;
                          document.getElementById('checkout_total_1').innerHTML = parseInt(sub_total)  ;
                          let s_total = parseInt(sub_total) ;
                          let ten_percent_value_of_order = parseFloat( ( s_total * 10 ) / 100 ) ;
                          document.getElementById('ten_percent_value_of_order').innerHTML = `(${ten_percent_value_of_order}) `;
                          document.getElementById('due_amount_of_order').innerHTML = s_total -  ten_percent_value_of_order;
                        
                        }else{
                            option=`<option disabled>Select  Sub City</option>`;
                        }                    
                        $('#checkout_form').find("#customer_sub_city").html(option);
                    },
                    error: function(e) {
                        alert("something went wrong");
                    }
            });
            
        })



        //user login
        $('.user_authentication').on('submit', '#user_login_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)

                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        var url = "http://127.0.0.1:8000/order";
                        $(location).attr('href',url);
                    }else if (resp.status == "not_matched"){
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.message,
                            footer: '<b> Something Wrong</b>'
                        });
                    }else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });



        //user register
        $('.user_authentication').on('submit', '#user_register_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        var url = "http://127.0.0.1:8000/order";
                        $(location).attr('href',url);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });
        

        //otp login 
        $('.user_authentication').on('submit', '#user_otp_login_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        let number = document.getElementById('otp_phone_number').value ;
                        document.getElementById('user_phone_to_get_otp').value = number ;
                        document.getElementById('user_otp_login_form').classList.toggle('form_display_toggle');
                        document.getElementById('user_otp_validation_form').classList.toggle('form_display_toggle');

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });


        //verirfy otp code  
        $('.user_authentication').on('submit', '#user_otp_validation_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        var url = "http://127.0.0.1:8000/order";
                            $(location).attr('href',url);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.message,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });


        //place order 
        $('body').on('submit', '#checkout_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        if (resp.payment_method=='Online Payment') {
                            document.getElementById('place_order_btn').innerHTML = "Redirecting to SSLCOMMEREZ";
                            document.getElementById('online_payment_form').submit();
                        }else{
                            var url = "http://127.0.0.1:8000/";
                            $(location).attr('href',url);
                        }

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });

 

        //user profile update
        $('body').on('submit', '#user_profile_update_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        document.getElementById('user_name').value = resp.user.name ;
                        document.getElementById('user_email').value = resp.user.email ;
                        document.getElementById('user_phone').value = resp.user.phone ;
                        document.getElementById('user_address').value = resp.user.address ;
                        document.getElementById('user_city').value = resp.user.city_id ;
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.errors,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });



        //user password update
        $('body').on('submit', '#change_password_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.message,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });


        //user set new password 
        $('body').on('submit', '#set_new_password_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.message,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });

        //user set new password 
        $('body').on('submit', '#request_product_form', function(e) {
            event.preventDefault();

            let $action = $(this).attr('action');
            let $method = $(this).attr('method');
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                url: $action,
                method: $method,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp)
                    if (resp.status == "OK") {
                        toastMessage(resp.message);
                        setTimeout(()=>{
                          location.reload();
                        },2000);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: resp.message,
                            footer: '<b> Something Wrong</b>'
                        });
                    }

                },
                //error function
                error: function(e) {
                    console.log(e);
                    alert("something went wrong");
                }
            });
        });


        function toastMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                type: 'success',
                title: message
            })

            setTimeout(() => {}, 1000);
        }

    });
</script>
