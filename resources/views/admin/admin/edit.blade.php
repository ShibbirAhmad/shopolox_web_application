<form action="{{ route('supplier.update', $supplier->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

   
    <div class="form-group">
        <label for=""> Name</label>
        <input class="form-control" required type="text" name="name" value="{{ $supplier->name }}">
    </div>
    <div class="form-group">
        <label for="">Company Name</label>
        <input class="form-control" required type="text" name="company_name" value="{{ $supplier->company_name }}">
    </div>

    <div class="form-group">
        <label for="">Phone</label>
        <input class="form-control" required type="text" name="phone" value="{{ $supplier->phone }}">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" required type="text" name="email" value="{{ $supplier->email }}">
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


