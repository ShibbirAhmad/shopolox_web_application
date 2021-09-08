<form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data"  id="submit_form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="url">url</label>
        <input class="form-control" type="text" name="url"  value="{{ $slider->url }}">
    </div>
  
    <div class="form-group">
        <img id="previewImage" src="{{ asset('storage/'.$slider->image) }}" class="preview_mage"  />
    </div>

    <div class="form-group">
        <label for="image">Slider Size ( 1460px*360px )</label>
          <input  type="file"  id="slider_upload" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"   id="submit_btn"   class="btn btn-primary">Submit</button>
    
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
    