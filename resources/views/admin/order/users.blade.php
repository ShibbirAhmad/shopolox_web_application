@extends('admin.layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <a class="btn btn-primary mb-2 mr-2 btn-rounded " href="{{ route('admin.home') }} " 
                  ><i class="fa fa-arrow-left"></i></a>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>  <a style="margin-right: 30px;" class="btn btn-success" target="_blank" href="{{ route('export_users') }}"> <i class="fa fa-download"></i>Exports </a> Users </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-busered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th >Name</th>
                                            <th >Phone</th>
                                            <th >Address </th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach ($users as $key => $user)
                                      <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td >{{  $user->name }}</td>
                                        <td >{{  $user->phone }}</td>
                                        <td >{{  $user->address ?  $user->address : 'None' }}</td>

                                    </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="pagination_container">
                                {{  $users->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>
@endsection

