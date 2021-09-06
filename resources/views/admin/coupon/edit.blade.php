
<form action="{{ route('coupon.update', $coupon->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-md-6 col-sm-6">
        <div class="form-group">
        <label> Coupon Code  </label>
        <input
          type="text"
          name="code"
          value="{{ $coupon->code }}"
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
             <input type="date"  value="{{ $coupon->start_date }}" class="form-control" name="start_date">
          </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
            <label for="date">Expire Date </label>
              <input type="date"   value="{{ $coupon->expire_date }}" name="expire_date" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <label>Discount Type</label>
          <div style="margin-top:5px;" class="form-group">
            <select name="discount_type" class="form-control">
              <option value="select discount type" disabled>select discount type</option>
              <option value="percentage" 
              @if ($coupon->discount_type=='percentage')
                  selected
              @endif
              > percentage </option>
              <option value="decimal"
              @if ($coupon->discount_type=='decimal')
              selected
              @endif
             > Decimal</option>
            </select>
        
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Discount Amount</label>
            <input
              type="number"
              value="{{ $coupon->discount_amount }}"
              name="discount_amount"
              class="form-control"
            />
          </div>
        </div>
      </div>
  
    <button type="submit" class="btn btn-primary">Save</button>

</form>



<style> 
 b {
     color: red;
 }
</style>