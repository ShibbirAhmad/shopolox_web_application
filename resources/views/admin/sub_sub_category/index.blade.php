@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('sub_sub_category.create') }}"
                    modal-title="Create sub sub category">Add</button>

            </div>

            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4> sub sub Category Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center  table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_sub_categories as $sub_sub_category)


                                            <tr>
                                                <td>{{ $sub_sub_category->name }}</td>
                                                <td>
                                                    @if ($sub_sub_category->image)
                                                    <img class="small_image" src="{{ asset('storage/'.$sub_sub_category->image ) }}" alt="image"></td>
                                                    @else
                                                     <img class="small_image" src="{{ asset('storage/images/no_image.png') }}" alt="">  
                                                    @endif
                                                <td>{{ $sub_sub_category->category->name }}</td>
                                                <td>{{ $sub_sub_category->sub_category->name }}</td>
                                                <td>
                                                    @if ($sub_sub_category->status==1)
                                                        <span class="bade badge-success"> Active </span>
                                                    @else
                                                    <span class="bade badge-warning"> Inactive </span>
                                                    @endif
                                                </td>
                                                <td>

                                                    @if ($sub_sub_category->status==1)
                                                    <a href="#" route="{{ route('sub_sub_category.destroy', $sub_sub_category->id) }}"
                                                        class="btn btn-sm btn-warning btn_status_change">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" route="{{ route('sub_sub_category.destroy', $sub_sub_category->id) }}"
                                                        class="btn btn-sm btn-success btn_status_change">
                                                        <i class="fa fa-check"></i>
                                                    </a>        
                                                    @endif

                                                    <a href="#" route="{{ route('sub_sub_category.edit', $sub_sub_category->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-{{ $sub_sub_category->name }}">
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
