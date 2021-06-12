<form action="{{route('attribute.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Attribute Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:Size">
    </div>
  
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

