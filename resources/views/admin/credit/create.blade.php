<form action="{{route('balance.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">Balance Name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:Daraz">
    </div>
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

