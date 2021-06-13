

<form action="{{route('sub_city.store')}}" method="post"  id="submit_form" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">Select City <b>*</b> </label>
        <select name="city_id"  required class="form-control" >
            <option selected disabled>selecet one</option>
            @foreach ($cities as $item)
            <option value="{{ $item->id }}">{{$item->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="name">Name  <b>*</b></label>
        <input class="form-control" type="text" required name="name" placeholder="EX:Chhatak">
    </div>
  

    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>



<style>
    b {
        color: red;
    }
</style>