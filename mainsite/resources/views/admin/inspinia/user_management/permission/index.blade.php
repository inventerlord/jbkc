@extends('layouts.backend.inspinia.layout')
@section('title', $title)
{{-- assets/backend/inspinia/ --}}
@section('pgStyles')
    <link href="{{ asset('assets/backend/inspinia/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('pgScripts')
    <script src="{{ asset('assets/backend/inspinia/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
    </script>
@endsection

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Permissions</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Permissions</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                {{-- <a href="" class="btn btn-primary">This is action area</a> --}}
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        @can('permission_create')
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Horizontal form</h5>

                    </div>
                    <div class="ibox-content">
                        <form accept="{{ route('admin.usermanagement.permission') }}" method="post">
                            @csrf
                            <div class="form-group">


                                <div class="col-lg-12">
                                    <label class="col-form-label">Permission</label>
                                    <input type="name" placeholder="Permission" class="form-control" name="name">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-sm btn-white" type="submit">Add Permission</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('permission_read')
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Permissions Table</h5>
                        {{-- <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> --}}
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.usermanagement.permission.delete', ['permission' => $permission->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        @endcan

    </div>
@endsection

@section('footer')
    @include('layouts.backend.inspinia.footer')
@endsection
