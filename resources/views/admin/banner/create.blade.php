<form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="url">url</label>
        <input class="form-control" type="text" name="url" placeholder="Ex:https://mysite.com/xyz">
    </div>
  
    <div class="form-group">
        <img id="previewBanner" src="{{ asset('storage/images/slide_no_image.jpg') }}" class="preview_banner"  />
    </div>

    <div class="form-group">
        <label for="image">Banner (size : 730px*150px )</label>
          <input required type="file"  id="banner_upload" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  disabled id="submit_btn"   class="btn btn-primary">Submit</button>
    
</form>



<style>
    .preview_banner {
        width:730px;
        height:150px;
    }


    @media only screen and (max-width: 425px){
        .preview_banner {
            width:250;
            height:75px;
        }

      
}

    
</style>
    