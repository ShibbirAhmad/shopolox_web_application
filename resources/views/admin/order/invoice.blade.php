<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>  shopolox.com </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Invoicebus Invoice Template">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <style>

          @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
                    html, body, div, span, applet, object, iframe,
                    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
                    a, abbr, acronym, address, big, cite, code,
                    del, dfn, em, img, ins, kbd, q, s, samp,
                    small, strike, strong, sub, sup, tt, var,
                    b, u, i, center,
                    dl, dt, dd, ol, ul, li,
                    fieldset, form, label, legend,
                    table, caption, tbody, tfoot, thead, tr, th, td,
                    article, aside, canvas, details, embed,
                    figure, figcaption, footer, header, hgroup,
                    menu, nav, output, ruby, section, summary,
                    time, mark, audio, video {
                    margin: 0;
                    padding: 0;
                    border: 0;
                    font: inherit;
                    font-size: 100%;
                    vertical-align: baseline;
                    }

                    html {
                    line-height: 1;
                    }

                    ol, ul {
                    list-style: none;
                    }

                    table {
                    border-collapse: collapse;
                    border-spacing: 0;
                    }

                    caption, th, td {
                    text-align: left;
                    font-weight: normal;
                    vertical-align: middle;
                    }

                    q, blockquote {
                    quotes: none;
                    }
                    q:before, q:after, blockquote:before, blockquote:after {
                    content: "";
                    content: none;
                    }

                    a img {
                    border: none;
                    }

                    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
                    display: block;
                    }

                    .clearfix {
                    display: block;
                    clear: both;
                    }

                    .hidden {
                    display: none;
                    }

                    b, strong, .bold {
                    font-weight: bold;
                    }

                    #container {
                    font: normal 13px/1.4em 'Open Sans', Sans-serif;
                    margin: 0 auto;
                    padding: 50px 40px;
                    min-height: 1058px;
                    }

                    #memo .company-name {
                    background: #8BA09E url("../img/arrows.png") 560px center no-repeat;
                    background-size: 100px auto;
                    padding: 10px 20px;
                    position: relative;
                    margin-bottom: 15px;
                    }
                    #memo .company-name span {
                    color: white;
                    display: inline-block;
                    min-width: 20px;
                    font-size: 36px;
                    font-weight: bold;
                    line-height: 1em;
                    }
                    #memo .company-name .right-arrow {
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    width: 100px;
                    background: url("../img/right-arrow.png") right center no-repeat;
                    background-size: auto 60px;
                    }
                    #memo:after {
                    content: '';
                    display: block;
                    clear: both;
                    }

                    #invoice-info {
                    float: left;
                    margin:15px 0px;
                    }
                    #invoice-info > div {
                    float: left;
                    }
                    #invoice-info > div > span {
                    display: block;
                    min-width: 20px;
                    min-height: 18px;
                    margin-bottom: 3px;
                    }
                    #invoice-info > div:last-child {
                    margin-left: 20px;
                    }
                    #invoice-info:after {
                    content: '';
                    display: block;
                    clear: both;
                    }

                    #client-info {
                    float: right;
                    margin: 5px 20px 0 0;
                    min-width: 220px;
                    text-align: right;
                    }
                    #client-info > div {
                    margin-bottom: 3px;
                    min-width: 20px;
                    }
                    #client-info span {
                    display: block;
                    min-width: 20px;
                    }

        

                    table {
                    table-layout: fixed;
                    }
                    table th, table td {
                    word-break: keep-all;
                    word-wrap: break-word;
                    }

                    #items {
                    margin:0px ;
                    }

                    #items .first-cell, #items table th:first-child, #items table td:first-child {
                    width: 18px;
                    text-align: right;
                    }
                    #items table {
                    border-collapse: separate;
                    width: 100%;
                    }
                    #items table th {
                    padding: 12px 10px;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: center;
                    background: #E6E7E7;
                    border-bottom: 2px solid #487774;
                    }
                    #items table th:nth-child(2) {
                    width: 30%;
                    text-align: left;
                    }

                    #items table td {
                    padding: 0px 10px;
                    text-align: center;
                    /* border-right: 1px solid #CCCCCF; */
                    }
                    #items table td:first-child {
                    text-align: left;
                    border-right: 0 !important;
                    }
                    #items table td:nth-child(2) {
                    text-align: left;
                    }

                    .currency {
                    border-bottom: 2px solid #487774;
                    padding: 0 20px;
                    }
                    .currency span {
                    font-size: 11px;
                    font-style: italic;
                    color: #8b8b8b;
                    display: inline-block;
                    min-width: 20px;
                    }

                    .sums {
                    float: right;
                    background: #8BA09E ;
                    background-size: auto 100px;
                    color: white;
                    padding-right: 35px;
                    }
                    .sums table tr th, .sums table tr td {
                    min-width: 100px;
                    padding: 8px 20px 8px 35px;
                    /* text-align: right; */
                    font-weight: 600;
                    }
                    .sums table tr th {
                    text-align: left;
                    padding-right: 25px;
                    }
                    .sums table tr.amount-total th {
                    text-transform: uppercase;
                    }
                    .sums table tr.amount-total th, .sums table tr.amount-total td {
                    font-size: 16px;
                    font-weight: bold;
                    }
                    .sums table tr:last-child th {
                    text-transform: uppercase;
                    }
                    .sums table tr:last-child th, .sums table tr:last-child td {
                    font-size: 16px;
                    font-weight: bold;
                    padding-top: 20px !important;
                    padding-bottom: 40px !important;
                    }

                    #terms {
                    margin: 50px 20px 10px 20px;
                    }
                    #terms > span {
                    display: inline-block;
                    min-width: 20px;
                    font-weight: bold;
                    }
                    #terms > div {
                    margin-top: 10px;
                    min-height: 50px;
                    min-width: 50px;
                    }

                    .payment-info {
                    margin: 0 20px;
                    }
                    .payment-info div {
                    font-size: 12px;
                    color: #8b8b8b;
                    display: inline-block;
                    min-width: 20px;
                    }

                    .ib_bottom_row_commands {
                    margin: 10px 0 0 20px !important;
                    }

                    .ibcl_tax_value:before {
                    color: white !important;
                    }

                    .product_image {
                    width: 80px;
                    height: 80px;
                    }


                    .angle_icon_0 {
                        font-size: 120px;
                        position: absolute;
                        color: #fff;
                        margin-top: -46px;
                        margin-left: 62%;
                    }

                    .angle_icon_1 {
                        font-size: 120px;
                        position: absolute;
                        color: #fff;
                        margin-top: -46px;
                        margin-left: 69%;
                    }


                    .angle_icon_2 {
                        font-size: 120px;
                        position: absolute;
                        color: #fff;
                        margin-top: -46px;
                        margin-left: 75%;
                    }

                        .payment_image {
                        width: 88%;
                        margin: 1%;
                        }


                    @media only screen  and (max-width:450px){
                        .sums {
                            float: none;
                        }

                    .sums table tr th, .sums table tr td {
                        padding-left: 100px;
                    }

                        #container {
                        margin:5px;
                        /* padding:10px 0px; */
                        min-height: 500px;
                        width: 100%;
                    }

                    #memo .company-info {
                        margin-left: 0px;

                        }

                        #invoice-info > div:last-child {
                        margin-left: 0px;
                    }


                    #items table td {
                        padding: 10px 10px;
                        }

                        .r_angle {
                        display: none;
                        }

                        .product_image {
                        width: 50px;
                        height: 50px;
                        }


                        .payment_image {
                        width: 88%;
                        margin: 5%;
                        }




                    }

                  .company_info_row{
                     display: flex;
                  }

                  .customer_info{
                    width:35%;
                  }

                  .customer_info p {
                    font-size: 14px;
                    padding:5px 0px;
                  }

                  .company_logo{
                    width:30% ;
                    max-height: 120px;
                    }

                  .company_logo img {
                      height: 120px;;
                  }

                  .company_info{
                    width:30% ;
                    }

                  .company_info p {
                    font-size: 14px;
                    padding:5px 0px;
                  }


                  .invoice_row{
                    display: flex;
                    background: #E6E7E7;
                    padding:20px 10px;
                    margin:10px 0px;
                     
                  }

                  .invoice_no{
                    width: 50%;
                  }

                  .invoice_no h4{
                    font-size: 18px;
                  }

                  .invoice_date{
                    width: 50%;
                  }

                  .invoice_date h4{
                    font-size: 18px;
                  }


                  .product_container{
                    display: flex;
                  }

                  .product_container>p{
                     padding: 30px 2px;;
                  }
                  

     </style>

  </head>
  <body>
    <div id="container">
      <section id="memo">
        <div class="company-name">
          <span>Shopolox</span>
              <i class="fa fa-angle-double-right angle_icon_0 r_angle"></i>
              <i class="fa fa-angle-double-right angle_icon_1 r_angle"></i>
              <i class="fa fa-angle-double-right angle_icon_2 r_angle"></i>
        </div>

       <div class="row  company_info_row">

        <div class="customer_info">
          <p>Name:   {{ $order->customer->name ?? "" }} </p>
          <p>Phone: {{ $order->customer->phone ?? "" }} </p>
          <p>City: {{ $order->customer->city->name ?? "" }} </p>
          <p>Address:   @if(!empty($order->customer->address))
                                    {{ $order->customer->address. ',' }}
                           @endif
           </p>


        </div>

        <div class="company_logo">
          <img src="https://www.amrazmart.com/public/storage/images/general_setting/XcTRbE811PcdDHYaEfWJIguRWaVOQAluwgBmjxhH.png" />
        </div>

        <div class="company_info">
            
          <p>Office: House: 36, Road: 06, Block: A,</p>
          <p>Benarashi Polly, Section-10, Mirpur, Dhaka.</p>
          <p>E-mail: support@shopolox.com</p>
          <p>Hot Line: 01627 444 999 / 01633-666 222</p>

       </div>
          
      </div>

      </section>

      <div class="clearfix"></div>

      <div class="row invoice_row">

        <div class="invoice_no">
          <h4> Invoice Number : <strong> {{$order->invoice_no}}</strong>  </h4>
        </div>

        
        <div class="invoice_date">
          <h4> Invoice Date : <strong> {{  $order->created_at->format('d F,Y') }}</strong>  </h4>
        </div>
 

      </div>

      <div class="clearfix"></div>

      <section id="items">

        <table >

          <tr>
            <th>#</th>
            <th>product</th>
            <th>Size</th>
            <th>Color</th>
            <th>qty</th>
            <th>price</th>
          </tr>


              @foreach($order->order_items as $k=> $item)

                <tr data-iterate="item">
                    <td> {{$k+1}} </td>
                    <td> 
                      <div class="product_container">
                        <img class="product_image" src="https://www.amrazmart.com/public/storage/images/products/BL9YiKINkTH2FGLmwQwql6tdI1ZGuJWJA3CYFulI.jpg" alt="product">
                        <p>  {{$item->product->name}} - {{$item->product->code}} </p>
                      </div>
                    </td>
                  
                    <td> @if ($item->size)
                        {{ $item->size }}
                    @else
                     {{   'None' }}
                    @endif </td>
                  <td> @if ($item->color)
                      {{ $item->color }}
                  @else
                   {{   'None' }}
                  @endif </td>
                    <td> {{ $item->quantity }} </td>

                    <td>&#2547;  {{$item->price}} </td>
                </tr>

      @endforeach


        </table>

      </section>

      <div class="currency">

      </div>

      <section class="sums">

        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Sub Total</th>
            <td> &#2547; {{$order->total}} </td>
          </tr>

          <tr>
            <th>Discount</th>
            <td> &#2547; {{$order->discount}} </td>
          </tr>

          <tr>
            <th>Paid </th>
            <td> &#2547; {{$order->paid}} </td>
          </tr>

          <tr>
            <th>Shipping Charge </th>
            <td> &#2547; {{ $order->shipping_cost  }} </td>
          </tr>

           <tr >
            <th>Amount Due </th>
            <td> &#2547;   {{ ($order->total)-($order->paid+$order->discount)+$order->shipping_cost  }} </td>
          </tr>

          <tr> </tr>

        </table>

      </section>

      <div class="clearfix"></div>


     {{-- <div class="payment_info">
        <img class="payment_image" src="https://mail.google.com/mail/u/0?ui=2&ik=46c71f6b8b&attid=0.4&permmsgid=msg-f%3A1703993175845665386&th=17a5ccc3e9f87a6a&view=fimg&realattid=17a570fac812967670a4&disp=thd&attbid=ANGjdJ9GjoC_B_PnqGFaZqq9DEniUJrEdJANuhzewJLU6G1ZAMY_npeRYV38kThrBxrHjPJtgS--DySlrNdKFWs2RjyDUcYpq4OPdWa-PZPeqZplNZB8SS7FuZzKEZU&ats=2524608000000&sz=w180-h120-df-p-nu" alt="payment">

     </div> --}}

    </div>


  </body>
</html>