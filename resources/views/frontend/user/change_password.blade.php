@extends('frontend.layouts.app')

@section('title', 'customer order details')

@push('extra_css')
<style>
  
.password_form_container {
    width:40%;
    margin:10% 25% ;
    box-shadow: 0 1pt 12pt rgb(150 165 237);
    padding: 20px;
}

.password_heading {
    text-align:center ;
}

</style>
@endpush

@section('content')
    @parent

    <div class="ps-vendor-dashboard">
        <div class="container-fluid">
       
            <div class="ps-section__content">
           
                 <div class="row mt-5">
                     <div class="col-lg-2 col-md-2"> 
                         @include('frontend.user.sidebar')
                     </div>
                     <div class="col-lg-10 col-md-10">
                      
                          <div class="password_form_container"> 
                                 <form method="POST" id="change_password_form"  action="{{ route('change_password') }}">
                                        <div class="form_inside">
                                          <h4 class="password_heading"> Change Password </h4>
                                            <div class="ps-form__content">
                                                <h5>current password</h5>
                                                <div class="form-group">
                                                    <input  class="form-control" name="old_password" required type="password" >
                                                </div>
                                                 <h5>new password </h5>
                                                <div class="form-group">
                                                    <input class="form-control" name="new_password" required type="password" >
                                                </div>
                                                <div class="form-group text-center submtit">
                                                    <button  class="ps-btn ">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                          </div> 
                        
                     </div>
                
                 </div>

            </div>
        </div>
    </div>

@endsection


