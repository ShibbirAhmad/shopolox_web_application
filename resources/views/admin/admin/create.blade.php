<form action="{{route('supplier.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for=""> Name</label>
        <input class="form-control" required type="text" name="name" placeholder="EX:Mohammad">
    </div>
    <div class="form-group">
        <label for="">Company Name</label>
        <input class="form-control" required type="text" name="company_name" placeholder="EX:shopolox">
    </div>

    <div class="form-group">
        <label for="">Phone</label>
        <input class="form-control" required type="text" name="phone" placeholder="01xxxxxxxx">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" required type="text" name="email" placeholder="example@gamil.com">
    </div>


  
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

