@extends('frontend.layouts.app')

@section('title', 'customer profile info')

@push('extra_css')
            <style>
         

            .user_form_container {
                    box-shadow: 0 1pt 12pt rgb(150 165 237);
                    width: 65%;
                    padding:10px;
                    height: 500px;
                    margin-left: 17%;
                }


              .loginBox{
              margin:1% auto 0% auto;
              padding:5px 60px 20px 60px;
              width:100%;
              height:100%;
              box-sizing:border-box;
              }

      

              .loginBox p{
              margin:0;
              padding:0;
              font-weight:bold;
              color:#000;
              }

              .loginBox input{
              width:100%;
              height:20px;
              margin:0 0 20px 0;
              }

              .loginBox input[type="text"],
              .loginBox input[type="email"]{
              border:none;
              border-bottom:1px solid #ddd;
              background:transparent;
              outline:none;
              color:#000;
              font-size:14px;
              text-align:center;
              }

              ::placeholder{
              color: white;
              opacity:0.1;
              text-align:center;
              }


              form a{
              color:violet;
              text-decoration:none;
              }

          .send-button {
              margin-top: 30px;
              width: 100px;
              height: 40px;
              font-size: 18px;
          }
         
         
   </style>  
@endpush

@section('content')
    @parent

    <div class="ps-vendor-dashboard">
        <div class="container-fluid">
       
            <div class="ps-section__content">
           
                 <div class="row mt-5">
                     <div  class="col-lg-2 col-md-2"> 
                         @include('frontend.user.sidebar')
                     </div>
                     <div class="col-lg-10 col-md-10">
                      
                            <div class="ps-block__content user_form_container">
                             <div class="loginBox">
                                 
                               <form method="POST" id="user_profile_update_form" action="{{ route('profile_update') }}">     
                                      
                                   <p>Name</p>
                                     <input type="text" name="name" value="{{ Auth::user()->name }}" id="user_name" />
                                    
                    
                                  <p>Phone Number</p>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}"  id="user_phone" />

                                  <p>Email</p>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}"  id="user_email" />

                                     @php
                                         $cities = App\Models\City::where('status',1)->orderBy('name')->get();
                                     @endphp
                                   
                                     <p>City</p>
                                      <select style="border:none;" class="form-control " name="city_id" id="user_city" >
                                          @foreach ($cities as $item)
                                              <option @if(Auth::user()->city_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                          @endforeach
                                      </select>
                                      
                                     <p>Address</p>
                                    <input type="text" name="address" value="{{ Auth::user()->address }}"  id="user_address" />

                                    <div class="form-group text-center ">
                                       
                                    <button onclick="goBack()" class="btn btn-lg send-button" type="button">Back</button>
                                    <button  class="btn btn-lg send-button" type="submit">Change</button>
                                  
                                    </div>
          
                                  </div>
                             </form>

                                  
    
                                  </div>
                            </div>
                        
                     </div>
                 </div>

            </div>
        </div>
    </div>

@endsection


@push('extra_js')

<script>

         function goBack(){

             window.history.back();
         }
            
        
</script>

@endpush
