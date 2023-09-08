@extends('layouts.frontend.upltz.layout')

@section('title', $title)
@section('pg-styles')
    <style>
        .course {
            border: 1px solid #555
        }

        .course__img {}

        .course__title {}
    </style>
@endsection
@section('breadcrumb')
    <div class="container-lg">
        <div class="row" style="background-color: #201d3c;padding-top:20px;padding-bottom: 20px; margin:0;">
            <div class="col-md-12">
                <h2 class="text-center" style="color: white;font-weight: 900">{{ $title }}</h2>
            </div>
        </div>
    </div>
@endsection
@section('pg-content')


    <div class="container" style="margin-top: 20px;margin-bottom: 100px">
        <div class="row justify-content-center">
            @foreach ($courses as $course)
                <div class="course">
                    <div class="course__img">
                        @if ($course->image)
                            <img src="{{ asset('assets/storage/images/course/thumb/' . $course->image) }}">
                        @else
                            <img src="{{ asset('assets/storage/images/common/noimage.jpg') }}">
                        @endif

                    </div>
                    <div class="course__title">
                        <h3>{{ $course->name }}</h3>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.frontend.upltz.footer')
@endsection
