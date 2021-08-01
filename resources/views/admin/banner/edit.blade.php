<form action="{{route('banner.update',$banner->id)}}" method="post" enctype="multipart/form-data"  id="submit_form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="url">url</label>
        <input class="form-control" type="text" name="url" value="{{ $banner->url }}">
    </div>
  
    <div class="form-group">
        <img id="previewBanner" src="{{ asset('storage/'.$banner->image) }}" class="preview_banner"  />
    </div>

    <div class="form-group">
        <label for="image">Banner (size : 505px*150px )</label>
          <input  type="file"  id="banner_upload" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"   id="submit_btn"   class="btn btn-primary">Submit</button>
    
</form>



<style>
    .preview_banner {
        width:505px;
        height:150px;
    }


    @media only screen and (max-width: 425px){
        .preview_banner {
            width:250;
            height:75px;
        }

      
}

    
</style>
    