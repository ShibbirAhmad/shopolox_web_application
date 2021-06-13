<form action="{{ route('city.update', $city->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">City Name</label>
        <input class="form-control" type="text" value="{{ $city->name }}"  name="name" >
    </div>
  
    <div class="form-group">
        <label for="">Delivery Charge</label>
        <input class="form-control" type="number" value="{{ $city->delivery_charge }}" name="delivery_charge" >
    </div>
  
    <button type="submit"  class="btn btn-primary">Submit</button>
</form>


