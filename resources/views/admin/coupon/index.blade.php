@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('coupon.create') }}"
                    modal-title="Create coupon">Add</button>

            </div>

            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-10 col-md-10 col-sm-12 col-12 text-center">
                                    <h4>  Coupon Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center  table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code </th>
                                            <th scope="col">Start Date </th>
                                            <th scope="col">End Date </th>
                                            <th scope="col">Discount Type</th>
                                            <th scope="col">Discount Amount</th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $key=>$coupon)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->start_date }}</td>
                                                <td>{{ $coupon->expire_date }}</td>
                                                <td>{{ $coupon->discount_type }}</td>
                                                <td>{{ $coupon->discount_type=='percentage'? $coupon->discount_amount.' %': $coupon->discount_amount.' BDT' }}</td>
                                                <td>
                                                    @if ($coupon->status==1)
                                                        <span class="bade badge-success"> Active </span>
                                                    @else
                                                    <span class="bade badge-warning"> Inactive </span>
                                                    @endif
                                                </td>
                                                <td>


                                                    @if ($coupon->status==1)
                                                    <a href="#" route="{{ route('coupon.destroy', $coupon->id) }}"
                                                        class="btn btn-sm btn-warning btn_status_change">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" route="{{ route('coupon.destroy', $coupon->id) }}"
                                                        class="btn btn-sm btn-success btn_status_change">
                                                        <i class="fa fa-check"></i>
                                                    </a>        
                                                    @endif

                                                    <a href="#" route="{{ route('coupon.edit', $coupon->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-Coupon">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="#" route="{{ route('coupon.show', $coupon->id) }}"
                                                        class="btn btn-sm btn-danger btn_delete "
                                                      >
                                                        <i class="fa fa-trash"></i>
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
