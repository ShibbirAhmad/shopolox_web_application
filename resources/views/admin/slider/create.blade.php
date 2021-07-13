<form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="url">url</label>
        <input class="form-control" type="text" name="name" placeholder="Ex:https://mysite.com/xyz">
    </div>
  
    <div class="form-group">
        <img id="previewImage" src="{{ asset('storage/images/slide_no_image.jpg') }}" alt="slider"  style="width:100%;height:300px;" />
    </div>

    <div class="form-group">
        <label for="image">Slide</label>
          <input required type="file"  id="slider_upload" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  id="submit_btn"   class="btn btn-primary">Submit</button>
    
</form>


