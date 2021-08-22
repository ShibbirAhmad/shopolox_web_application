<div class="sidebar_user_profile">
    <div class="s_profile_container">
        <i class="fa fa-user-secret customer_profile"></i>
    </div>
    <h4 class="customer_name">{{ Auth::user()->name ? Auth::user()->name : 'Customer' }}</h4>
</div>
<ul class="sidebar_menu_container">
    <li> <a  href="{{ route('orders') }}">   <i class="fa fa-list-ul mr-2 ml-4"></i> Orders</a> </li>
    <li> <a  href=" ">  <i class="fa fa-user mr-2 ml-4"></i>Profile</a> </li>
    <li> <a  href=" "> <i class="fa fa-key mr-2 ml-4"></i>Set New Password</a> </li>
    <li> <a  href=" "> <i class="fa fa-key mr-2 ml-4"></i>Password Change</a> </li>
    <li> <a  href=" "> <i class="fa fa-power-off mr-2 ml-4"></i>Logout</a> </li>
    <li> <a  href="{{ url('/') }}"> <i class="fa fa-arrow-left mr-2 ml-4"></i>Back To Home</a> </li>
</ul>