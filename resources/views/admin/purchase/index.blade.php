@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('purchase.create') }}"
                    modal-title="Create purchase">Add</button>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Purchase Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier</th>
                                            <th>invoice</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $key=>$purchase)
                                            <tr>
                                                <td>{{ $key+1 }} </td>
                                                <td>{{ $purchase->supplier->company_name }} </td>
                                                <td>{{ $purchase->invoice_no }} </td>
                                                <td>{{ $purchase->total }} </td>
                                                <td>  <span class="badge badge-success"> &#2547; {{ $purchase->paid }} </span> </td>
                                                <td> <span class="badge badge-warning"> &#2547; {{ $purchase->total - $purchase->paid }}</span> </td>
                                                <td>
                                                     <a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>
                                                     <a href="#" route="{{ route('purchase.edit', $purchase->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit purchase of {{ $purchase->supplier->company_name }} ">
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
