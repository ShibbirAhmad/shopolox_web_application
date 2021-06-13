
<form action="{{ route('sub_city.update', $sub_city->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Select Attribute <b>*</b> </label>
        <select name="city_id" required  class="form-control" >
            <option disabled>selecet one</option>
            @foreach ($cities as $item)
            <option value="{{ $item->id }}" @if($item->id==$sub_city->city_id) selected @endif >{{$item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Name  <b>*</b></label>
        <input class="form-control" type="text" value="{{ $sub_city->name }}" required name="name" placeholder="EX:S">
    </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>



<style> 
 b {
     color: red;
 }
</style>