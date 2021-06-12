
<form action="{{ route('variant.update', $variant->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Select Attribute <b>*</b> </label>
        <select name="attribute_id" required  class="form-control" >
            <option disabled>selecet one</option>
            @foreach ($attributes as $item)
            <option value="{{ $item->id }}" @if($item->id==$variant->attribute_id) selected @endif >{{$item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Name  <b>*</b></label>
        <input class="form-control" type="text" value="{{ $variant->name }}" required name="name" placeholder="EX:S">
    </div>

  
    <button type="submit" class="btn btn-primary">Submit</button>

</form>



<style> 
 b {
     color: red;
 }
</style>