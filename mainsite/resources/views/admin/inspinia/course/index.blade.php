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
            <h2>Courses</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Courses</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('admin.course.create') }}" class="btn btn-primary">Add Course</a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">

        @can('course_read')

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Courses Table</h5>

                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($courses as $course)
                                        <tr class="text-center">
                                            <td style="width: 100px">
                                                @if ($course->image)
                                                    <img style="width: 100%"
                                                        src="{{ asset('assets/storage/images/course/thumb/' . $course->image) }}">
                                                @else
                                                    <img style="width: 100%"
                                                        src="{{ asset('assets/storage/images/common/noimage.jpg') }}">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ $course->name }}</td>
                                            <td style="vertical-align: middle;">{{ $course->category->name }}</td>
                                            <td style="vertical-align: middle;">
                                                @if ($course->status == 1)
                                                    <span class="badge badge-info">Active</span>
                                                @else
                                                    <span class="badge badge-info">Disabled</span>
                                                @endif
                                            </td>


                                            <td style="vertical-align: middle">
                                                <div
                                                    style="display: flex;gap:10px;height:100%;justify-content: center;align-items: center">
                                                    <a href="{{ route('admin.course.category.edit', ['courseCategory' => $course->id]) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <form action="{{ route('admin.course.delete', ['coures' => $course->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
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
