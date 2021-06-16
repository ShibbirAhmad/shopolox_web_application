@extends('admin.layouts.app')
@section('title', 'product add')
@section('content')
    <div class="layout-px-spacing">

        <div id="product_row" class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded " route="{{ route('product.index') }}"
                    ><i class="fa fa-arrow-left"></i></button>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
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
                        
                                <div class="form-group">
                                    <label for="">Select Brand  </label>
                                    <select  name="brand_id"  class="form-control" >
                                        <option selected disabled>selecet one</option>
                                        @foreach ($brands as $item)
                                        <option value="{{ $item->id }}">{{$item->name }}</option>
                                        @endforeach
                            
                                    </select>
                                </div>

                              <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>
                                          regular Price
                                          <b class="text-danger">*</b>
                                        </label>
                                        <input
                                          type="number"
                                          name="price"
                                          class="form-control"
                                          required
                                          placeholder="0"
                                        />
                              
                                      </div>
                                  </div>
                              
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group">
                                          <label>Sale Price <b class="text-danger">*</b> </label>
                                          <input
                                            type="number"
                                            name="sale_price"
                                            class="form-control"
                                            required
                                            placeholder="0"
                                  
                                          />
                                        </div>                        
                                  </div>

                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                      <label>profit margin</label>
                                      <input
                                        type="text"
                                        name="profit_margin"
                                        class="form-control"
                                        readonly
                                      />
                                    </div>                
                                  </div>
                              

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                      <label>unit type <b class="text-danger">*</b> </label>
                                      <select class="form-control" required name="unit_type" >
                                        <option disabled selected value="select">select</option>
                                        <option  value="piece">piece</option>
                                        <option  value="weight">weight</option>
                                        <option  value="liter">liter</option>
                                      </select>
                                    </div>                        
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="form-group">
                                      <label>cost per unit  <b class="text-danger">*</b> </label>
                                      <input type="number" placeholder="0" required class="form-control" name="cost" >
                                    </div>                        
                                </div>


                                

                     

                              </div>
                            
                              
                                

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Attributes,Variants & price </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
    
                              
                              <div class="row">
                               
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>
                                          attribute
                                          <b class="text-danger">*</b>
                                        </label>
                                        <select
                                          class="form-control"
                                          name="attributes[]"
                                          multiple
                                        >
                                          <option disabled >select attribute</option>
                                          @foreach ($attributes as $item)
                                          <option value="{{ $item->id }}" >{{$item->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>
                                          variant
                                          <b class="text-danger">*</b>
                                        </label>
                                        <select class="form-control" name="variants[]" multiple >
                                          <option value disabled>select variant</option>
                                        
                                        </select>
                                      </div>
                                  </div>

                     

                       
                   
                            </div>

            

                        </div>
                    </div>
                </div>
            </div>




            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing">
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










            </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 layout-spacing">
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
                                          <label for="">Page Content</label>
                                          <textarea name="content" id="demo1" placeholder="page content" class="form-control"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>










                        </div>

            

    </div>
@endsection



@push('extra_js')
<script>
  new SimpleMDE({
      element: document.getElementById("demo1"),
      spellChecker: false,
  });
  </script>
@endpush




@push('extra_css')
    
<style >
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
