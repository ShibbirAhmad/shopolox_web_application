

<form action="{{route('sub_sub_category.store')}}" method="post"  id="submit_form" enctype="multipart/form-data">
    @csrf

   <div class="row">
       <div class="col-md-6"> 
        <div class="form-group">
            <label for="">Select Category <b>*</b> </label>
            <select  name="category_id"  class="form-control" >
                <option selected disabled>selecet one</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{$item->name }}</option>
                @endforeach
    
            </select>
        </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
            <label for="">Select Sub Category <b>*</b> </label>
            <select name="category_id"  class="form-control" >
                <option selected disabled>selecet one</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{$item->name }}</option>
                @endforeach
    
            </select>
        </div>
       </div>
   </div>

    <div class="form-group">
        <label for="name">Name  <b>*</b></label>
        <input class="form-control" type="text" name="name" placeholder="EX:clock">
    </div>
  
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input type="file" name="image" class="form-control" >
    </div>
  
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>



<style>
    b {
        color: red;
    }
</style>