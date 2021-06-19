@extends('admin.layouts.app')
@section('title', 'product add')
@section('content')
    <div class="layout-px-spacing">

        <div id="product_row" class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded " route="{{ route('product.index') }}"
                    ><i class="fa fa-arrow-left"></i></button>

            </div>


          {{-- start left section  --}}
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8  col-xs-12 col-8 layout-spacing">
               
                <div id="tableHover" class="col-lg-12 col-sm-12 col-xs-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Products Basic Info. </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                          
                            <div class="form-group">
                                <label>
                                  Name
                                  <b class="text-danger">*</b>
                                </label>
                                <input
                                  type="text"
                                  name="name"
                                  class="form-control"
                                  required
                                  placeholder="Ex:jean's pents"
                                />
                              </div>
                        
                            
                              <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label>
                                           Price
                                          <b class="text-danger">*</b>
                                        </label>
                                        <input
                                          type="number"
                                          name="regular_price"
                                          class="form-control"
                                          required
                                          placeholder="0"
                                        />
                              
                                      </div>
                                  </div>
                              
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                      <div class="form-group">
                                          <label> Discount </label>
                                          <input
                                            type="number"
                                            name="discount"
                                            class="form-control"
                                            placeholder="0"
                                          />
                                        </div>                        
                                  </div>

                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label>
                                          Sale Price
                                          <b class="text-danger">*</b>
                                        </label>
                                        <input
                                          type="number"
                                          name="sale_price"
                                          class="form-control"
                                          readonly
                                        />
                              
                                      </div>
                                  </div>
                              


                              

                                </div>

                            </div>
                          </div>
                </div>



                  <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>product Images </h4>
                                  </div>
                              </div>
                          </div>
                          <div class="widget-content widget-content-area">
      
                                
                            <div
                            class="uploader"
                          
                          >
                            <div class="upload-control" v-show="form.files.length">
                              <label for="file" class="label">Select a file</label>
                            </div>
                            <div v-show="!form.files.length">
                              <i class="fa fa-cloud-upload"></i>
                              <p>Drag your file here</p>
                              <div>or</div>
                              <div class="file-input">
                                <label for="file" class="label">select a file</label>
                                <input type="file" name="image" id="file"  multiple />
                              </div>
                            </div>
                            <div class="images-preview" v-show="form.files.length">
                              <div class="img-wrapper" >
                                <img src="" />
                                <div class="cancel" >
                                  <span>X</span>
                                </div>
                              </div>
                            </div>
      
                          </div>
                       </div>
                     </div>
                  </div>


                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>product Description </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
    
                          <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="details" required id="demo1" placeholder="write details" class="form-control"></textarea>
                        </div>
                        </div>
                      </div>
                </div>


                
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                     <div class="card">
                       <div class="card-header"> <h5> Search Engine Optimize  <a class="seo_meta_btn" onclick="toggleSEOMeta()"> Edit SEO Meta <i class="fa fa-angle-down seo_angle_icon"></i> </a> </h5>  </div>
                       <div id="seo_meta" class="card-body seo_meta_container">
                        <div class="form-group">
                          <label for="seo title">seo title</label>
                          <input type="text" name="seo_title" placeholder="seo friendly title" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="seo description">seo description</label>
                          <textarea name="seo_description" rows="5"  placeholder="write seo friendly description" class="form-control"></textarea>
                      </div>
                       </div>
                     </div>
                </div>
           


            
           </div>
          {{-- end left section  --}}


           {{-- start right section  --}}
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-8  layout-spacing">
            
            <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
              <div class="card">
                <div class="card-header"> <h6>Publish</h6> </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                           <select class="form-control " required name="status" >
                             <option selected disabled>status <b class="text-danger">*</b> </option>
                             <option value="1">active</option>
                             <option value="0">de-active</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 col-xs-12">
                       <div class="form-group text-center">
                         <button type="submit" class="btn btn-success save_btn"><i class="fa fa-save save_icon"></i>Submit</button>
                       </div>
                     </div>
                   </div>
                </div>
              </div>
           
            </div>


            <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
              <div class="card">
                <div class="card-header"> <h6>Is Featured?</h6> </div>
                <div class="card-body">
                  <div class="onoffswitch">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" class="onoffswitch-checkbox" id="is_featured" value="1">
                    <label class="onoffswitch-label" for="is_featured">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                    </label>
                    </div>
                </div>
              </div>
           
            </div>


              <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                 <div class="card-header"> <h6>Categories & Sub-categories </h6> </div>
                 <div class="card-body">
                  <div class="multi_item_container">
                  <ul>
                    @foreach ($categories as $category)
                     <li> 
                     <label for="categories">
                       <input type="checkbox" name="categories[]" value="{{ $category->id }}" id=""> {{ $category->name }}
                     </label>
                     @if (count($category->sub_categories) > 0)
                     <ul>
                       <li>
                          @foreach ($category->sub_categories as $sub_category)
                          <label for="sub_categories">
                            <input type="checkbox" name="sub_categories[]" value="{{ $sub_category->id }}" id=""> {{ $sub_category->name }}
                          </label> 
                          @if (count($sub_category->sub_sub_categories) > 0)
                          <ul>
                           <li>
                              @foreach ($sub_category->sub_sub_categories as $sub_sub_category)
                              <label for="sub_sub_categories">
                                <input type="checkbox" name="sub_sub_categories[]" value="{{ $sub_sub_category->id }}" id=""> {{ $sub_sub_category->name }}
                              </label>  
                              @endforeach
                           </li>
                      </ul>
                          @endif 
                          @endforeach
                       </li>
                     </ul> 
                     @endif  
                   </li>  
                    @endforeach
                 </ul>

                 </div>
                </div>
                </div>
              </div>
             

                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                  <div class="card">
                    <div class="card-header"> <h6>Attributes & Variants</h6> </div>
                    <div class="card-body">
                     <div class="multi_item_container">
                      <ul>
                        @foreach ($attributes as $attribute)
                         <li> 
                         <label for="attributes">
                           <input type="checkbox" name="attributes[]" value="{{ $attribute->id }}" id=""> {{ $attribute->name }}
                         </label>
                         @if (count($attribute->variants) > 0)
                         <ul>
                           <li>
                              @foreach ($attribute->variants as $variant)
                              <label for="variants">
                                <input type="checkbox" name="variants[]" value="{{ $variant->id }}" id=""> {{ $variant->name }}
                              </label> 
                              @endforeach
                           </li>
                         </ul> 
                         @endif  
                       </li>  
                        @endforeach
                       </ul>
                     </div>
                    </div>
                  </div>
                 
               </div>

               <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                  <div class="card-header"> <h6>Product Collection</h6> </div>
                  <div class="card-body">
                   <div class="multi_item_container">
                    <ul>
                      <li> 
                      <label for="product_collection">
                        <input type="checkbox" name="product_collection[]" value=" new_arrival" id="">  New Arrival
                      </label>
                      </li>
                      <li> 
                        <label for="product_collection">
                          <input type="checkbox" name="product_collection[]" value="best_ellers" id="">   Best Sellers
                        </label>
                        </li>
                        <li> 
                          <label for="product_collection">
                            <input type="checkbox" name="product_collection[]" value="special_offer" id=""> Special Offer
                          </label>
                          </li>
                  </ul> 


                   </div>
                  </div>
                </div>
            
              </div>

               
               <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                 <div class="card">
                   <div class="card-header"> <h6>Labels</h6> </div>
                   <div class="card-body">
                    <div class="multi_item_container">
                      <ul>
                          <li> 
                          <label for="product_label">
                            <input type="checkbox" name="product_label[]" value="hot" id=""> Hot
                          </label>
                          </li>
                          <li> 
                            <label for="product_label">
                              <input type="checkbox" name="product_label[]" value="new" > New
                            </label>
                            </li>
                            <li> 
                              <label for="product_label">
                                <input type="checkbox" name="product_label[]" value="sale" id=""> Sale
                              </label>
                              </li>
                      </ul> 

                    </div>
                   </div>
                 </div>
              
               </div>



              <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                  <div class="card-header"> <h6>Shipment Information</h6> </div>
                  <div class="card-body">
                     <select class="form-control " name="shipment_info_id" >
                           <option selected disabled >select</option>
                           <option value="">china</option>
                     </select>
                  </div>
                </div>
             
              </div>


              <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                  <div class="card-header"> <h6>Hash Tag</h6> </div>
                  <div class="card-body">
                     <textarea class="form-control" name="" rows="2"></textarea>
                  </div>
                </div>
             
              </div>



            </div>
  {{-- start right section  --}}
    
           

          
    </div>
@endsection



@push('extra_js')
<script>
  new SimpleMDE({
      element: document.getElementById("demo1"),
      spellChecker: false,
  });

  function toggleSEOMeta() {
        document.getElementById('seo_meta').classList.toggle('seo_meta_display');
  }

  </script>
@endpush




@push('extra_css')
    
<style >

 .seo_meta_btn {
    font-size: 16px;
    cursor: pointer;
    margin-left: 45%;
    color: #445ede;
 }

 .seo_angle_icon{
    font-size: 26px;
    position: absolute;
    margin: 2px 10px;
 }

  .seo_meta_container {
    display: none;
  }

  .seo_meta_display{
    display: block;
  }


.onoffswitch {
    position: relative;
    width: 45px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

.onoffswitch-checkbox {
    display: none;
}


.onoffswitch-label {
    height: 20px;
    width: 60px;
    font-weight: 400;
    display: block;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #e6e6e6;
    border-radius: 20px!important;
    -webkit-border-radius: 20px!important;
    -moz-border-radius: 20px!important;
}

.onoffswitch-inner {
    width: 200%;
    margin-left: -100%;
    transition: .3s ease-in 0s;
}
.onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}


.onoffswitch-switch {
    width: 20px;
    height: 20px;
    margin: 0;
    background: #a1a1a1;
    border: 2px solid #e6e6e6;
    border-radius: 50%!important;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 26px;
    transition: all .3s ease-in 0s;
    
}

.save_btn {
  font-size: 20px;
  background: #445ede;
}

.save_icon {
  margin:0px 5px;
}
.card-header {
    padding: .4rem 1.25rem !important;
}

.card-body {
  padding : .5rem !important ;
}

input[type=checkbox] {
    position: relative;
    top: 0;
    margin: 0 .5rem 0 0;
    cursor: pointer;
    width: 16px;
    height:16px;
}

input[type=checkbox]:::after {
  border-radius:3px ;
}

.multi_item_container ul  {
     list-style-type: none;
     padding: 0 0 0 5px;
     overflow-y: auto;
  }

  .multi_item_container ul li {
    display: block;
    padding: 0px 5px;
    
  }

  .multi_item_container ul li ul {
     padding-left: 26px;
  }

  .multi_item_container ul li ul li {
     display: block;
     padding: 5px 20px;
  }


  .mb-2 {
    margin-bottom: 5px !important;
  }
  
  .height {
    height: 360px !important;
  }
  
  .uploader {
    width: 100%;
    background: #222d32;
    color: #fff;
    padding: 40px 15px;
    text-align: center;
    border-radius: 10px;
    border: 3px dashed;
    font-size: 20px;
    position: relative;
  }
  
  .draging {
    background: #fff;
    color: #222d32;
    border: 3px dashed #222d32;
  }
  
  .file-input label {
    background: #222d32;
    color: #fff;
  }
  
  i.fa.fa-cloud-upload {
    font-size: 85px;
  }
  
  #file {
    opacity: 0;
    z-index: -1;
  }
  
  .file-input {
    width: 280px;
    margin: auto;
    position: relative;
    height: 86px;
  }
  
  .images-preview {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
  }
  
  .img-wrapper {
    width: 110px;
    display: flex;
    flex-direction: column;
    margin: 10px;
    height: 105px;
    justify-content: space-between;
    background: #fff;
    box-shadow: 5px 5px 20px #3e3737;
    margin-bottom: 32px;
  }
  
  img {
    max-height: 105px;
  }
  
  .files {
    font-size: 12px;
    background: #fff;
    color: red;
    display: flex;
    flex-direction: column;
    align-items: self-start;
    padding: 3px 6px;
  }
  
  .name {
    overflow: hidden;
    height: 18px;
  }
  
  .upload-control {
    position: absolute;
    width: 100%;
    background: #fff;
    top: 0;
    left: 0;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    padding: 10px;
    padding-bottom: 4px;
    text-align: right;
  }
  
  .label {
    padding: 2px 5px;
    margin-right: 10px;
    border: 2px solid #222d32;
    border-radius: 3px;
  
    font-size: 15px;
    cursor: pointer;
    color: #222d32;
  }
  
  .file-input label {
    background: #fff;
    color: #222d32;
    padding: 10px 40px;
  }
  .cancel {
    background: #fff;
  
    cursor: pointer;
    color: red;
    width: 110px;
  }
  </style>
  
@endpush
