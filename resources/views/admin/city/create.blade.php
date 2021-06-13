<form action="{{route('city.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">City Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:Size">
    </div>
  
    <div class="form-group">
        <label for="">Delivery Charge</label>
        <input class="form-control" type="number" name="delivery_charge" placeholder="EX:70">
    </div>
  
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

