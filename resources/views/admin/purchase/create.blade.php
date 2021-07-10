<form action="{{route('purchase.store')}}" method="post" enctype="multipart/form-data" id="submit_form">
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
                <option value="{{ $supplier->id }}"> {{ $supplier->company_name }}   </option>
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
              />
            </div>
          </div>
          
         <div class="col-lg-4 col-sm-12">
            <div class="form-group">
                <select class="form-control" name="balance_id" required>
                    <option disabled selected >paid by</option>
                    <option value="1">cash</option>
                </select>
            </div>
         </div>
       
        </div>

  
    <button type="submit"  class="btn btn-primary">Submit</button>
    
</form>

