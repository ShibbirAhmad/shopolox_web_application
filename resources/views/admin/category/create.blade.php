<form action="{{route('category.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:blogs">
    </div>
  
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input type="file" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

