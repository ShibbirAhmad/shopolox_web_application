
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>



<script>
   $(document).ready(function() {

       $('.ps-product__shopping').find('#cart_btn').on('click',function (e) {
            console.log("adding cart");
            let  $action = $(this).attr('route');
            let  $quantity = document.getElementById('p_quantity').value; 
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
            let $color = '';
            for(var i in document.getElementsByClassName("variant_color")){
               if(document.getElementsByClassName("variant_color")[i].checked){
                   $color += document.getElementsByClassName("variant_color")[i].value
                }
            }

            let $size = '';
            for(var i in document.getElementsByClassName("variant_size")){
               if(document.getElementsByClassName("variant_size")[i].checked){
                   $size += document.getElementsByClassName("variant_size")[i].value
                }
            }


            let $weight = '';
            for(var i in document.getElementsByClassName("variant_weight")){
               if(document.getElementsByClassName("variant_weight")[i].checked){
                   $size += document.getElementsByClassName("variant_weight")[i].value
                }
            }

            $data={
                'quantity':$quantity,
                'size':$size,
                'color':$color,
                'weight':$weight,
                };
           //ajax action is here
           $.ajax({
               headers:{
                     'X-CSRF-TOKEN' : csrf_token
                       },
               url: $action ,
               method: 'POST',
               data: $data,
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

           setTimeout(() => {
           }, 1000);
       }

   });

</script>
