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
            };
            //ajax action is here
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                url: $action,
                method: 'POST',
                data: $data,
                cache: false,
                contentType: false,
                processData: false,

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
                            console.log(ele.options.image.image);
                            template += ` <div class="ps-product--cart-mobile">
                            <div class="ps-product__thumbnail"><img src="/storage/${ele.options.image.image}" > </div>
                            <div class="ps-product__content"><a class="ps-product__remove" ><i cart_row_id="${ele.rowId}" class="icon-cross __remove_cart"></i></a>${ele.name }
                                <small> ${ele.qty} x &#2547; ${ele.price}</small>
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
                        document.getElementById('__cart_update_input_'+resp.rowId).value = resp.updated_qty;
                        document.getElementById('__cart_total_in_cart_view').innerHTML = resp.cart_total;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        document.getElementById('__total_of_cart_item_'+resp.rowId).innerHTML = resp.updated_qty * resp.item_price;
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
                        document.getElementById('__cart_update_input_'+resp.rowId).value = resp.updated_qty;
                        document.getElementById('__cart_total_in_cart_view').innerHTML = resp.cart_total;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        document.getElementById('__total_of_cart_item_'+resp.rowId).innerHTML =  resp.updated_qty * resp.item_price;
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
                    if (resp.status == "OK") {
                        document.getElementById('__cart_count').innerHTML = resp.item_count;
                        document.getElementById('__cart_total_in_header').innerHTML = resp.cart_total;
                        e.target.parentElement.parentElement.parentElement.remove()
                        $('body').find()
                        toastMessage(resp.message);
                    }
                },
                error: function(e) {}
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
