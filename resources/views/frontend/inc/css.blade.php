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

        
    
   /* quick view modal style  */



   /* search style start  */
     

   .ps-panel--search-result.active {
        opacity: 1;
        transform: scaleX(1);
        visibility: visible;
    }

    .ps-panel--search-result {
        background-color: #fff;
        border: 1px solid #eaeaea;
        left: 0;
        opacity: 0;
        padding: 10px 20px;
        position: absolute;
        top: 100%;
        transform: scaleZ(0);
        transition: all .4s ease;
        visibility: hidden;
        width: 100%;
        z-index: 999;
    }


    .ps-panel--search-result .ps-panel__content {
            max-height: 400px;
            overflow-y: auto;
        }

    .ps-product--search-result.ps-product--wide {
            margin-bottom: 20px;
        }

    .ps-panel--search-result .ps-product {
        border-bottom: 1px solid #eaeaea;
        padding-bottom: 10px;
    }

     .ps-product--search-result {
        align-items: flex-start;
        border: none;
        display: flex;
        justify-content: space-between;
    }


    .ps-panel--search-result .ps-panel__footer {
        border-top: 1px solid #eaeaea;
        padding: 10px 0;
        text-align: center;
    }


   /* search style end  */

</style>