<link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}" />
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap4/css/bootstrap.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/lightGallery-master/dist/css/lightgallery.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/select2/dist/css/select2.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">


<style>

   /* modal style  */

    #product_quickview_modal {
        z-index: 9999;
    }

    #product_quickview_modal .modal-dialog {
        max-width: 960px;
    }


    #product_quickview_modal .modal-dialog .modal-content {
        padding: 40px 0 0 20px;
        position: relative;
    }

    #product_quickview_modal .modal-dialog .modal-close {
        position: absolute;
        right: 10px;
        top: 10px;
        z-index: 10;
        cursor: pointer
    }


    #product_quickview_modal .ps-product--quickview {
        display: block;
    }

     .ps-product--quickview {
            display: none;
            margin-bottom: 0;
            max-height: 500px;
            overflow: auto;
        }

     .ps-product--detail .ps-product__header {
            display: flex;
            flex-flow: row nowrap;
        }

        

       .quick_p_image {
           width: 400px;
       } 
    
   /* quick view modal style  */



     /* .preview_image_item {
        width: 60px !important;
     } */

    /* .single_p_main_img {
         width: 350px ;
     } */



</style>