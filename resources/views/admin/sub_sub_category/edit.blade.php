
<form action="{{ route('sub_category.update', $sub_category->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Select Category <b>*</b> </label>
        <select name="category_id"  class="form-control" >
            <option disabled>selecet one</option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}" @if($item->id==$sub_category->category_id) selected @endif >{{$item->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="name">Name  <b>*</b></label>
        <input class="form-control" type="text" value="{{ $sub_category->name }}" name="name" placeholder="EX:clock">
    </div>
  
    <div class="form-group">
        <label for="image">Image/Icon</label>
          <input type="file" name="image" class="form-control" >
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>



<style> 
 b {
     color: red;
 }
</style>