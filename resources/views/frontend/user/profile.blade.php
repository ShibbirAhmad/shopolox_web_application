@extends('frontend.layouts.app')

@section('title', 'customer order list')

@push('extra_css')
            <style>
            @import url(https://fonts.googleapis.com/css?family=Raleway:200,500,700,800);
            *,
            *:after,
            *:before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            }

            .user_form_container {
                    box-shadow: 0 1pt 12pt rgb(150 165 237);
                    width: 65%;
                    height: 500px;
                    margin-left: 17%;
                }

            #container {
            position: absolute;
            width: 710px;
            height: 5em;
            left: 50%;
            top: 50%;
            margin-left: -355px;
            margin-top: -2.5em;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            }

            .input {
            position: relative;
            margin: 1em;
            width: calc(50% - 2em);
            height: 40px;
            }

            .message {
            width: calc(100% - 2em);
            height: 100px;
            }

            textarea {
            border: none;
            resize: none;
            }

            .input__field {
            position: absolute;
            margin: 0.8em 0;
            padding: 0.4em;
            width: 100%;
            height: calc(100% - 1.6em);
            border: none;
            border-radius: 0;
            background: transparent;
            color: #ffcc00;
            font-size: 1.55em;
            font-weight: bold;
            -webkit-appearance: none;/* for box shadows to show on iOS */
            }

            .input__field:focus {
            outline: none;
            }

            .input__label {
            padding: 0 1em;
            margin: 1.2em 0;
            width: 100%;
            height: calc(100% - 2.4em);
            color: #6a7989;
            font-weight: bold;
            font-size: 70.25%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

           .input__label-content {
            position: relative;
            display: block;
            padding: 1.5em 0;
            font-size: 14px;
            width: 100%;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            }

            .input__label::before,
            .input__label:after {
            content: '';
            position: absolute;
            left: 0;
            width: 100%;
            height: 1px;
            background: #6a7989;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            }

            .input__label::before {
            top: 0;
            }

            .input__label::after {
            bottom: 0;
            }

            .input__field:focus + .input__label .input__label-content,
            .input--filled .input__label-content {
            -webkit-transform: translate3d(0, -90%, 0);
            transform: translate3d(0, -90%, 0);
            }

            .input__field:focus + .input__label::before,
            .input--filled .input__label::before {
            -webkit-transform: translate3d(0, -0.5em, 0);
            transform: translate3d(0, -0.5em, 0);
            }

            .input__field:focus + .input__label::after,
            .input--filled .input__label::after {
            -webkit-transform: translate3d(0, 0.5em, 0);
            transform: translate3d(0, 0.5em, 0);
            }

            #send-button {
            margin:0px 10px;
            width: 200px;
            height: 60px;
            background-color: #6a7989;
            color: #000;
            border: 0;
            font-weight: bold;
            font-size: 70.25%;
            text-transform: uppercase;
            letter-spacing: 4px;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            }

            #send-button:hover,
            #send-button:focus {
            outline: 0;
            background-color: #ffcc00;
            color: #000;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            }


            @import url(https://fonts.googleapis.com/css?family=Lato);

            @font-face {
            font-family: 'Lato'
            }

            .footer {
            position: absolute;
            color:grey;
            font-family: Lato;
            text-align:right;
            font-size:8px;
            right: 30px;
            bottom: 15px;
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
                               <form method="POST" id="user_profile_update_form" action="{{ route('profile_update') }}">     
                                <div id="container">
                                    <span class="input">
                                      <input type="text" name="name" value="{{ Auth::user()->name }}" class="input__field" id="user_name" />
                                      <label for="input-1" class="input__label">
                                        <span class="input__label-content"> Name</span>
                                    </label>
                                    </span>
  
                                  
                                    <span class="input">
                                      <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="input__field" id="user_phone" />
                                      <label for="input-3" class="input__label">
                                        <span class="input__label-content">Phone Number</span>
                                      </label>
                                    </span>
                                  
                                    <span class="input">
                                      <input type="text" name="email" value="{{ Auth::user()->email }}" class="input__field" id="user_email" />
                                      <label for="input-4" class="input__label">
                                        <span class="input__label-content">Email Address</span>
                                      </label>
                                    </span>

                                     @php
                                         $cities = App\Models\City::where('status',1)->orderBy('name')->get();
                                     @endphp
                                    <span class="input">
                                        <label for="input-4" class="input__label">
                                        <select style="border:none;" class="form-control input__field" name="city_id" id="user_city" >
                                            @foreach ($cities as $item)
                                               <option @if(Auth::user()->city_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                       
                                          <span class="input__label-content">City</span>
                                        </label>
                                      </span>
                                    
                                  
                                    <span class="input message">
                                      <textarea class="input__field" name="address" id="user_address">
                                         {!!  Auth::user()->address  !!}
                                      </textarea>
                                      <label for="input-5" class="input__label">
                                        <span class="input__label-content">Address</span>
                                      </label>
                                    </span>
                                  
                                    <button onclick="goBack()" id="send-button" type="button">Back</button>
                                    <button  id="send-button" type="submit">Change</button>
                                  
          
                                  </div>
                             </form>

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
            
            var $input;

            function onInputFocus(event) {
            var $target = $(event.target);
            var $parent = $target.parent();
            $parent.addClass('input--filled');
            };

            function onInputBlur(event) {
            var $target = $(event.target);
            var $parent = $target.parent();

            if (event.target.value.trim() === '') {
                $parent.removeClass('input--filled');
            }
            };

            $(document).ready(function() {
            $input = $('.input__field');
            
            // in case there is any value already
            $input.each(function(){
                if ($input.val().trim() !== '') {
                var $parent = $input.parent();
                $parent.addClass('input--filled');
                }
            });
            
            $input.on('focus', onInputFocus);
            $input.on('blur', onInputBlur);
            });


</script>

@endpush
