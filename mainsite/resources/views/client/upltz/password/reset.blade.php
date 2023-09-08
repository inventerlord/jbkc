@extends('layouts.frontend.upltz.layout')

@section('title', $title)
@section('pg-styles')
    <style>
        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="container-lg">
        <div class="row" style="background-color: #201d3c;padding-top:20px;padding-bottom: 20px; margin:0;">
            <div class="col-md-12">
                <h2 class="text-center" style="color: white;font-weight: 900">Reset Password</h2>
            </div>
        </div>
    </div>
@endsection
@section('pg-content')


    <div class="container" style="margin-top: 20px;margin-bottom: 100px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="card-body">
                        <form method="POST" action="{{ route('reset.password.form') }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="email" value="{{ request()->email }}">
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="text"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" required autocomplete="new_password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="passwordc"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="passwordc" type="text"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}" required
                                        autocomplete="new_password" autofocus>

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.frontend.upltz.footer')
@endsection
