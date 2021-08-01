<form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="url">url</label>
        <input class="form-control" type="text" name="url" placeholder="Ex:https://mysite.com/xyz">
    </div>
  
    <div class="form-group">
        <img id="previewImage" src="{{ asset('storage/images/slide_no_image.jpg') }}" class="preview_mage"  />
    </div>

    <div class="form-group">
        <label for="image">Slide (size : 120px*360px )</label>
          <input required type="file"  id="slider_upload" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  disabled id="submit_btn"   class="btn btn-primary">Submit</button>
    
</form>



<style>
    .preview_mage {
        width:100%;
        height:300px;
    }


    @media only screen and (max-width: 425px){
        .preview_mage {
            width:100%;
            height:150px;
        }

      
}

    
</style>
    