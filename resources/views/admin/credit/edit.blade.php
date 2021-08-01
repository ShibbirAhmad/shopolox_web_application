<form action="{{ route('balance.update', $balance->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">Balance Name</label>
        <input class="form-control" type="text" value="{{ $balance->name }}" name="name" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>

</form>


