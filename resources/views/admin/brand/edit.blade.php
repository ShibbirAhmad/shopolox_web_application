<form action="{{ route('brand.update', $brand->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">brand Name</label>
        <input class="form-control" type="text" value="{{ $brand->name }}" name="name" required>
    </div>
    
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input type="file" name="image" class="form-control" >
    </div>
  
  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


