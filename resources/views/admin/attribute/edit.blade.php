<form action="{{ route('attribute.update', $attribute->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Attribute Name</label>
        <input class="form-control" type="text" value="{{ $attribute->name }}" name="name" placeholder="EX:Size">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


