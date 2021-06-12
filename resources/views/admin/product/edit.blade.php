<form action="{{ route('category.update', $category->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" type="text" value="{{ $category->name }}" name="name" placeholder="EX:blogs">
    </div>
    
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input type="file" name="image" class="form-control" >
    </div>
  
  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


