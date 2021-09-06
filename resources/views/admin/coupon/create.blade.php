

<form action="{{route('coupon.store')}}" method="post"  id="submit_form" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6 col-sm-6">
        <div class="form-group">
        <label> Coupon Code  </label>
        <input
          type="text"
          name="code"
          id="coupon_code"
          class="form-control"
        />
      </div>
         </div>
        <div class="col-md-6 col-sm-6"> 
             <br>
               <a onclick="codeGenerator()" class="btn btn-info " style="margin-top:5px"  > Generate Code </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="date">Start Date </label>
             <input type="date" class="form-control" name="start_date">
          </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
            <label for="date">Expire Date </label>
              <input type="date" name="expire_date" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <label>Discount Type</label>
          <div style="margin-top:5px;" class="form-group">
            <select name="discount_type" class="form-control">
              <option value="select discount type" disabled>select discount type</option>
              <option value="percentage"> percentage </option>
              <option value="decimal"> Decimal</option>
            </select>
        
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Discount Amount</label>
            <input
              type="number"
              name="discount_amount"
              class="form-control"
            />
          </div>
        </div>
      </div>
    
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>



<style>
    b {
        color: red;
    }
</style>


<script>

function codeGenerator(){
   return document.getElementById('coupon_code').value = Math.floor(100000 + Math.random() * 900000);
  }

</script>