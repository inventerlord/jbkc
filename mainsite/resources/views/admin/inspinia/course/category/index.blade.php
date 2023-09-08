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
                        extend: 'copy',
                        title: 'Categories',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Categories',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Categories',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'pdf',
                        title: 'Categories',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },

                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1]
                        },
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
            <h2>Categories</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Course Category</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                {{-- <a href="{{ route('admin.usermanagement.role.create') }}" class="btn btn-primary">Add Category</a> --}}
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">

        @can('role_read')
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>New Category Form</h5>

                    </div>
                    <div class="ibox-content">
                        <form accept="{{ route('admin.course.category') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Category</label>
                                        <input type="name" placeholder="Category" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Parent</label>
                                        <select class="form-control" name="parent">
                                            <option value="0" selected>Root</option>
                                            @foreach (App\Models\CourseCategory::all() as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>





                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-sm btn-white" type="submit">Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Roles Table</h5>

                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>parent</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($courseCategories as $courseCategory)
                                        <tr>
                                            <td>{{ $courseCategory->name }}</td>
                                            <td>
                                                @if ($courseCategory->parent == 0)
                                                    Root
                                                @else
                                                    {{ $courseCategory->parentCate->name }}
                                                @endif
                                            </td>

                                            <td style="display: flex;gap:10px">
                                                <a href="{{ route('admin.course.category.edit', ['courseCategory' => $courseCategory->id]) }}"
                                                    class="btn btn-info">Edit</a>
                                                <form
                                                    action="{{ route('admin.course.category.delete', ['courseCategory' => $courseCategory->id]) }}"
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
                                        <th>Name</th>
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
