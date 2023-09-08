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
                <h2 class="text-center" style="color: white;font-weight: 900">Forgot Passowrd</h2>
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
                        <form method="POST" action="{{ route('forgot.password.link') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="username" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
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
