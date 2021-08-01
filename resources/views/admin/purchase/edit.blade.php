<form action="{{ route('purchase.update', $purchase->id) }}" method="POST" id="submit_form">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label>Supplier</label>
            <select
              class="form-control"
              required
              name="supplier_id"
            >
              <option selected disabled >Select Supplier</option>
               @foreach ($suppliers as $supplier)
                <option @if ($purchase->supplier_id==$supplier->id) selected @endif value="{{ $supplier->id }}"> {{ $supplier->company_name }}   </option>
               @endforeach
             
            </select>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
              <label>Invoice Number</label>
              <input
                class="form-control"
                placeholder="invoice"
                name="invoice_no"
                required
                value="{{ $purchase->invoice_no }}"
              />
            </div>
          </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label>Document/Memo</label>
            <input class="form-control" type="file" name="memo">
          </div>
        </div>
      
     
          <div class="col-lg-4">
            <div class="form-group">
              <label>Product Code</label>
              <input
                class="form-control"
                name="product_code"
                required
                value="{{ $purchase->purchase_item->product->code }}"
                placeholder="type product code"
                maxlength="4"
              />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Purchase Price</label>
              <input
                type="number"
                id="purchase_price"
                name="price"
                class="form-control"
                placeholder="purchase price"
                required
                value="{{ $purchase->purchase_item->price }}" 
              />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Quantity</label>
              <input
                type="number"
                id="purchase_quantity"
                name="quantity"
                class="form-control"
                placeholder="qty"
                value="{{ $purchase->purchase_item->quantity }}" 
                required
              />
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label>Total</label>
              <input
               id="purchase_total"
                type="number"
                name="total"
                class="form-control"
                placeholder="total"
                readonly
                value="{{ $purchase->total }}" 
              />
            </div>
          </div>


          <div class="col-lg-4">
            <div class="form-group">
              <label>paid</label>
              <input
                type="number"
                name="paid"
                class="form-control"
                placeholder="paid"
                id="purchase_paid"
                value="{{ $purchase->paid }}" 
              />
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label>Due</label>
              <input
                type="number"
                id="purchase_due"
                name="due"
                class="form-control"
                placeholder="due"
                readonly
                value="{{ $purchase->total - $purchase->paid }}" 
              />
            </div>
          </div>
          
         <div class="col-lg-6 col-sm-12">
            <div class="form-group">
              <label for="balance">Paid By  (select one) <b class="text-danger">*</b> </label>
                <select class="form-control" name="balance_id" required>   
                   @foreach ($balances as $balance)    
                     <option value="{{ $balance->id }}">{{ $balance->name }}</option>         
                   @endforeach
                </select>
            </div>
         </div>
         <div class="col-lg-6 col-sm-12 col-md-6 text-center"> 
                <img src="{{ asset('storage/'.$purchase->memo) }}"  class="purchase_memo" />
                <a href="{{ asset('storage/'.$purchase->memo)  }}" download> <i class="fa fa-download purchase_download"> </i> </a> 
         </div>
       
        </div>

  
    <button type="submit"  class="btn btn-primary">Submit</button>

</form>


<style>
.purchase_memo{
    width:300px;
    height: 200px;

}

.purchase_download {
    font-size: 24px;
    color: green ;
    
}
</style>