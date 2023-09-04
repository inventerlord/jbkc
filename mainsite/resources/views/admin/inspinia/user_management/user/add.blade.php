@extends('layouts.backend.inspinia.layout')
@section('title', $title)
{{-- assets/backend/inspinia/ --}}
@section('pgStyles')

@endsection

@section('pgScripts')

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
                    <strong>New User</strong>
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
                    <h5>{{ $title }} Form <small>Can Create New User</small></h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ route('admin.usermanagement.user.create') }}">
                                @csrf

                                <fieldset>
                                    <legend>User Account</legend>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Username</label>
                                                <input type="text" placeholder="Username" name="username"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Email</label>
                                                <input type="text" placeholder="Email" name="email"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Password</label>
                                                <input type="password" placeholder="Password" name="password"
                                                    class="form-control" autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Confirm Password</label>
                                                <input type="password" placeholder="Confirm Password"
                                                    name="password_confirmation" class="form-control"
                                                    autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Role</label>
                                                <select name="role" class="form-control">
                                                    @foreach (App\Models\Role::latest()->get() as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>User Details</legend>
                                    <div class="row">


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">First Name</label>
                                                <input type="text" placeholder="First Name" name="first_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Last Name</label>
                                                <input type="text" placeholder="Last Name" name="last_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Display Name</label>
                                                <input type="text" placeholder="Display Name" name="display_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Mobile</label>
                                                <input type="text" placeholder="Mobile" name="phone"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="">About Me</label>
                                                <textarea class="form-control" rows="4" style="resize: none;" placeholder="About Me" name="about_me"></textarea>

                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <button type="submit" class="btn btn-primary btn-sm">Add User</button>
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
