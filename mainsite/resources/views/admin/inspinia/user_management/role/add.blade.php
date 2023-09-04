@extends('layouts.backend.inspinia.layout')
@section('title', $title)
{{-- assets/backend/inspinia/ --}}
@section('pgStyles')
    <link href="{{ asset('assets/backend/inspinia/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection

@section('pgScripts')
    <script src="{{ asset('assets/backend/inspinia/js/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $('.permissions').select2();
        $('#select-all').click(function() {
            $('.permissions > option').prop('selected', 'selected');
            $('.permissions').trigger('change');
        });
        $('#de-select-all').click(function() {
            $('.permissions > option').prop('selected', '');
            $('.permissions').trigger('change');
        });
    </script>
@endsection

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Roles</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>New Role</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="" class="btn btn-primary">Add Role</a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>New Role Form <small>Can Create New Role</small></h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ route('admin.usermanagement.role.create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="">Role Name</label>
                                            <input type="text" placeholder="Role name" name="name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="">Permissions</label>
                                            <select class="permissions form-control" name="permissions[]" multiple>
                                                @foreach (App\Models\Permission::oldest('name')->get() as $permission)
                                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="margin-top: 5px;">
                                                <button id="select-all" type="button" class="btn btn-primary">Select
                                                    All</button>
                                                <button id="de-select-all" type="button" class="btn btn-danger">De-Select
                                                    All</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.backend.inspinia.footer')
@endsection
