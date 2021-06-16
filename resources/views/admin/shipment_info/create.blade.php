<form action="{{route('shipment_info.store')}}" method="post"  id="submit_form">
    @csrf

    <div class="form-group">
        <label for="">shipment info hints name</label>
        <input class="form-control" type="text" name="name" placeholder="EX:china shipment">
    </div>
    <div class="form-group">
        <label for="">shipment Description</label>
        <textarea name="description" id="demo1" placeholder="shipment description" class="form-control"></textarea>
    </div>
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

<script>
new SimpleMDE({
    element: document.getElementById("demo1"),
    spellChecker: false,
});
</script>