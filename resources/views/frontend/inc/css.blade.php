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



    /* check out page */

    .chekout_customer_info{
        box-shadow: 0 1pt 12pt rgb(150 165 237);
        padding: 20px;
    }

    .chekout_amount_product_info{
        box-shadow: 0 1pt 12pt rgb(150 165 237);
        padding: 20px;
        min-height: 612px;
    }




    
      /* radio button css  */
      [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
        }
        [type="radio"]:checked+label,
        [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 35px;
        margin: 0px 5px;
        cursor: pointer;
        line-height: 29px;
        display: inline-block;
        color: #000;
        font-size: 14px;
        font-weight: bold;
        }
        [type="radio"]:checked+label:before,
        [type="radio"]:not(:checked)+label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 28px;
            height: 28px;
            border: 1px solid #fcb800;
            border-radius: 100%;
            background: #fff;
        }
        [type="radio"]:checked+label:after,
        [type="radio"]:not(:checked)+label:after {
            content: '';
            width: 24px;
            height: 24px;
            background: #F87DA9;
            position: absolute;
            top: 2px;
            left: 2px;
            border-radius: 100%;
            transition: all 0.2s ease;
        }
        [type="radio"]:not(:checked)+label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        [type="radio"]:checked+label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
      /* radio button css  */

    /* check out page */



    /* footer css  */

    .foooter {
        background: #eee;
    }
   .fpart-first {
        background-color: #eee;
    }
   .fpart-first {
        padding-top: 50px;
        padding-bottom: 10px;
    }
   .fpart-second {
        background-color: #111;
    }
   h5 {
        color: #000;
    }
   .fpart-first a {
        color: #000;
    }
    .short_desc {
      color: #000;
      font-size: 14px;
      line-height: 24px;
    }

    .payment-card img {
      width:100% ;
      height: auto ;
    }
    .quick_link_container {
        display: flex;
      }
    .quick_link {
        margin: 0px 25px;
      }
      .link_line li {
        padding: 6px 0px;
        width: 100%;
        border-bottom: 1px solid #ddd;
        display: -webkit-flex;
        display: flex;
        transition: all .2s ease;
        margin-left: -45%;
    }
    .link_line li:hover {
        background-color: #2a2b2b;
        padding-left: 0.275rem;
    }
    .line {
      width: 72px;
      height: 2px;
      background: #FCB800;
      margin-top: -10px;
      margin-bottom: 12px;
    }
    .subscribe_container{
      display: flex;
      box-shadow: 0 1pt 12pt rgb(150 165 237);
      padding: 10px 0px;
      margin-bottom: 10px;
    }
    .s_form {
      width: 450px;
      padding:10px;
      margin-top: 22px;
    }
  .email_btn {
      width: 62px;
      height: 44px;
      background: #FCB800;
      margin-top: -44px;
      border: none;
      float: right;
      border-radius: 0px 10px 10px 0px;
  }
    .email_btn i
    {
        color: #fff;
        font-size: 26px;
    }
    .social_container{
      display: flex;
      margin: 10px 0px;
      box-shadow: 0 1pt 12pt rgb(150 165 237);
      padding: 5px 0px;
    }
    .social-icon {
        margin: 10px;
        width: 50px;
    }
    .social-wrape {
      float: left;
      width: 40px;
      height: 40px;
      border: 1.5px dashed;
      border-radius: 50%;
      margin-left: 10px;
    }
    .social-wrape:hover {
      background: #FCB800;
    }
    .social-wrape:hover > i {
      color: #fff ;
    }
    .f-icon {
        font-size: 26px;
        cursor: pointer;
        color: #FCB800;
        position: absolute;
        margin: 6px 6px;
    }
    .end_footer {
      background: #FCB800;
      height: 50px;
    }
    .f_info_left {
      margin-left: 70px !important;
      color: #fff;
      margin-top: 10px;
      margin-left: 5px;
      font-family: serif;
      font-size: 16px;
    }
     .copy_right_info {
      color: #000;
      font-weight: bold;
      padding-top: 10px;
      font-family: serif;
      font-size: 18px;
    }
    .f_info_right {
      float: right;
      color: #fff;
      margin-top: 10px;
      margin-left: 120px;
      font-size: 16px;
      font-family: serif;
      margin-right: 20px ;
    }
    @media only screen and (max-width:768px) {
      .s_form {
          width: 330px;
        }
      .social-wrape {
        margin-left: 12px;
        margin-top: 10px;
      }
      .social_container{
        margin: 60px 0px;
      }
      .social-icon {
        margin: 45% 20%;
        position: absolute;
      }
        .short_desc {
            margin-left: -20px;
            padding: 5px;
        }
        .news_letter {
          padding:0px 20px;
        }
        .payment-card {
            padding-top: 20px;
            margin-top: -20px;
            margin-bottom: 35px;
        }
      }
    /* footer css  */

</style>