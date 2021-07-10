@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('debit.create') }}"
                    modal-title="Create Debit">Add</button>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Debits Table</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Purpose</th>
                                            <th>Comments</th>
                                            <th>Admin</th>
                                            <th>Debit By </th>
                                            <th>Amount </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($debits as $key=>$debit)

                                            <tr>
                                                <td>{{ $key + 1 }}</td>                                         
                                                <td>{{ $debit->created_at->format('d-m-Y') }}</td>                                         
                                                <td>{{ $debit->purpose }}</td>                                         
                                                <td>{{ $debit->comment }}</td>                                         
                                                <td>{{ $debit->admin ? $debit->admin->name : 'none'}}</td>                                         
                                                <td>{{ $debit->balance->name }}</td>                                         
                                                <td>{{ $debit->amount }}</td>                                         
                                                <td>

                                                    <a href="#" route="{{ route('debit.edit', $debit->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit- Debit">
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
