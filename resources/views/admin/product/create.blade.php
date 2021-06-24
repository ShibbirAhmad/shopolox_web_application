@extends('admin.layouts.app')
@section('title', 'product add')
@section('content')
    <div id="product_container" class="layout-px-spacing">
     <form action="{{ route('product.store') }}" method="post" id="submit_form" enctype="multipart/form-data">
        @csrf
        <div id="product_row" class="row ">
            
            <div class="col-lg-12">
                <a  class="btn btn-primary mb-2 mr-2 btn-rounded mt-2" href="{{ route('product.index') }}"
                    ><i class="fa fa-arrow-left mr-1"></i>back</a>

            </div>

      
          {{-- start left section  --}}
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8  col-xs-12  layout-spacing">
               
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
                                          id="r_price"
                                          type="number"
                                          name="regular_price"
                                          class="form-control"
                                          
                                          placeholder="0"
                                        />
                              
                                      </div>
                                  </div>
                              
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                      <div class="form-group">
                                          <label> Discount </label>
                                          <input
                                           id="p_discount"
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
                                          id="s_price"
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
      
                            <div class="custom-file-container" data-upload-id="mySecondImage">
                              <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                              <label class="custom-file-container__custom-file" >
                                  <input type="file"  id="image" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                  <span class="custom-file-container__custom-file__custom-file-control"></span>
                              </label>+
                              <div class="custom-file-container__image-preview"></div>
                          </div>
                       </div>
                     </div>
                  </div>


                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Product Description </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
    
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="details"   id="demo1" placeholder="write details" class="form-control"></textarea>
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
                          <textarea name="seo_description" rows="9"  placeholder="write seo friendly description" class="form-control"></textarea>
                      </div>
                       </div>
                     </div>
                </div>
           


            
           </div>
          {{-- end left section  --}}


           {{-- start right section  --}}
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12   layout-spacing">
            
            <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
              <div class="card">
                <div class="card-header"> <h6>Publish</h6> </div>
                <div class="card-body">
                   <div class="row">
                     <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                           <select class="form-control"  name="status" >
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
                  <label class="switch s-success  mb-4 mr-2">
                    <input type="checkbox" name="is_featured" checked>
                    <span class="slider round"></span>
                </label>
                </div>
              </div>
           
            </div>


            <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
              <div class="card">
                <div class="card-header"> <h6>Brands</h6> </div>
                <div class="card-body">
                   <select class="form-control " name="brand_id" >
                         <option selected disabled >select</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                   </select>
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
                      <div class="n-chk">
                        <label class="new-control new-checkbox checkbox-primary">
                          <input name="categories[]" value="{{ $category->id }}"  type="checkbox" class="new-control-input" >
                          <span class="new-control-indicator"></span>{{ $category->name }}
                        </label>
                      </div>
                     @if (count($category->sub_categories) > 0)
                     <ul>
                       <li>
                          @foreach ($category->sub_categories as $sub_category)
                          <div class="n-chk">
                          <label class="new-control new-checkbox checkbox-success">
                            <input type="checkbox" name="sub_categories[]" class="new-control-input" value="{{ $sub_category->id }}" > 
                                <span class="new-control-indicator"></span> {{ $sub_category->name }}
                          </label> 
                          </div>
                          @if (count($sub_category->sub_sub_categories) > 0)
                          <ul>
                           <li>
                              @foreach ($sub_category->sub_sub_categories as $sub_sub_category)
                              <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-info">
                                <input type="checkbox" name="sub_sub_categories[]" class="new-control-input" value="{{ $sub_sub_category->id }}"> 
                                <span class="new-control-indicator"></span> {{ $sub_sub_category->name }}
                              </label> 
                              </div> 
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
                          <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-outline-secondary">
                              <input type="checkbox" name="product_attributes[]" value="{{ $attribute->id }}"  class="new-control-input">
                              <span class="new-control-indicator"></span> {{ $attribute->name }}
                            </label>
                          </div>
                         @if (count($attribute->variants) > 0)
                         <ul>
                           <li>
                              @foreach ($attribute->variants as $variant)
                              <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-outline-warning">    
                                <input type="checkbox" name="variants[]" value="{{ $variant->id }}"  class="new-control-input" > 
                                  <span class="new-control-indicator"></span> {{ $variant->name }}
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
                       <div class="n-chk">
                        <label class="new-control new-radio square-radio radio-primary">
                          <input type="radio" name="collection" value="new arrival" checked class="new-control-input" >
                          <span class="new-control-indicator"></span> New Arrival
                        </label>
                       </div>
                      </li>
                      <li> 
                        <div class="n-chk">
                         <label class="new-control new-radio square-radio radio-success">
                           <input type="radio" name="collection" value="best seller" class="new-control-input" >
                           <span class="new-control-indicator"></span> Best Sellers
                         </label>
                        </div>
                       </li>

                       <li> 
                        <div class="n-chk">
                         <label class="new-control new-radio square-radio radio-danger">
                           <input type="radio" name="collection" value="special offer" class="new-control-input" >
                           <span class="new-control-indicator"></span> Special Offer
                         </label>
                        </div>
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
                                <div class="n-chk">
                                  <label class="new-control new-radio radio-primary">
                                    <input type="radio" value="new" class="new-control-input" name="labels" checked>
                                    <span class="new-control-indicator"></span>New
                                  </label>
                                </div>
                              </li>

                              <li> 
                                <div class="n-chk">
                                  <label class="new-control new-radio radio-danger">
                                    <input type="radio" class="new-control-input" value="hot" name="labels" >
                                    <span class="new-control-indicator"></span>Hot
                                  </label>
                                </div>
                             </li>
                             <li> 
                              <div class="n-chk">
                                <label class="new-control new-radio radio-success">
                                  <input type="radio" class="new-control-input" value="sale" name="labels" >
                                  <span class="new-control-indicator"></span>Sale
                                </label>
                              </div>
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
                     <select class="form-control " name="shiping_info_id" >
                           <option selected disabled >select</option>
                          @foreach ($shipment_infos as $shipment)
                          <option value="{{ $shipment->id }}">{{ $shipment->name }}</option>
                          @endforeach
                     </select>
                  </div>
                </div>
             
              </div>


              <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                  <div class="card-header"> <h6>Hash Tag</h6> </div>
                  <div class="card-body">
                      <select name="tags" class="form-control tagging" id="seo_tags" multiple="multiple">
                         <option value="men fashion">men fashion</option>
                         <option value=" women fashion">women fashion</option>
                         <option value="t-shirt">t-shirt</option>
                         <option value="shirt">shirt</option>
                         <option value="pant">pant</option>
                         <option value="dress">dress</option>
                         <option value="cosmatics">cosmatics</option>
                      </select>
                  
                  </div>
                </div>
             
              </div>



            </div>
          {{-- start right section  --}}
  
          
    </div>
  </form>
@endsection



@push('extra_js')

<script src="{{ asset('admin/plugins/select2/select2.min.js ') }}"></script>
<script src="{{ asset('admin/plugins/select2/custom-select2.js ') }}"></script>
<script src="{{ asset('admin/plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
<script>

  //Second upload
var secondUpload = new FileUploadWithPreview('mySecondImage')

  new SimpleMDE({
      element: document.getElementById("demo1"),
      spellChecker: false,
  });

  var ss = $("#seo_tags").select2({
    tags: true,
   });

  function toggleSEOMeta() {
        document.getElementById('seo_meta').classList.toggle('seo_meta_display');
  }

  </script>
@endpush




@push('extra_css')

<link href="{{ asset('admin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/plugins.css ') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/switches.css ') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/select2.min.css ') }}">
<link href="{{ asset('admin/assets/css/plugins.css ') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/forms/theme-checkbox-radio.css') }}">
<link href="{{ asset('admin/assets/css/scrollspyNav.css ') }}" rel="stylesheet" type="text/css" />
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

 input[type=number]{
   border-radius: 20px !important;
 }

  .seo_meta_container {
    display: none;
  }

  .seo_meta_display{
    display: block;
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



   @media screen and (max-width:768px){
     #product_row {
       margin-top: 10px;
       width: 130%;
       overflow: hidden;
     }

   }

  </style>
  
@endpush
