@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('slider.create') }}"
                    modal-title="Create Slider">Add</button>

            </div>

            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Slider Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Slide</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $key=>$slider)
                                            <tr>
                                                <td>{{ $key+1 }}</td>                                         
                                                <td>
                                                @if ($slider->image)
                                                <img class="small_banner" src="{{ asset('storage/'.$slider->image ) }}" alt="image"></td>
                                                @else
                                                    <img class="small_banner" src="{{ asset('storage/images/no_image.png') }}" alt="no image">  
                                                @endif 
                                                </td>
                                                <td>
                                                    @if ($slider->status==1)
                                                        <span class="bade badge-success"> Active </span>
                                                    @else
                                                    <span class="bade badge-warning"> Inactive </span>
                                                    @endif
                                                </td>
                                                <td>

                                                 @if ($slider->status==1)
                                                    <a href="#" route="{{ route('slider.destroy', $slider->id) }}"
                                                        class="btn btn-sm btn-warning btn_status_change">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" route="{{ route('slider.destroy', $slider->id) }}"
                                                        class="btn btn-sm btn-success btn_status_change">
                                                        <i class="fa fa-check"></i>
                                                    </a>        
                                                    @endif

                                                    <a href="#" route="{{ route('slider.edit', $slider->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-Slider">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>

                                            </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>













        </div>

    </div>
@endsection


