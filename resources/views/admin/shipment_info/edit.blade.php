<form action="{{ route('shipment_info.update', $shipment_info->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="">shipment info hints Name</label>
        <input class="form-control" type="text" value="{{ $shipment_info->name }}" name="name" placeholder="EX:blogs">
    </div>
    <div class="form-group">
        <label for="">shipment description</label>
        <textarea name="description" id="demo1" placeholder="shipment_info description" class="form-control">

            {!! $shipment_info->description !!}
        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<script>
    new SimpleMDE({
        element: document.getElementById("demo1"),
        spellChecker: false,
    });

</script>
