<form action="{{route('brand.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Brand Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:Daraz">
    </div>
  
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input required type="file" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

