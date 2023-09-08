@extends('layouts.backend.inspinia.layout')
@section('title', $title)
{{-- assets/backend/inspinia/ --}}
@section('pgStyles')

@endsection

@section('pgScripts')
    <script src="{{ asset('assets/common/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace("content", {
            toolbarGroups: [{
                    name: "document",
                    groups: ["mode", "document", "doctools"]
                },
                {
                    name: "clipboard",
                    groups: ["clipboard", "undo"]
                },
                {
                    name: "editing",
                    groups: ["find", "selection", "spellchecker", "editing"],
                },
                {
                    name: "forms",
                    groups: ["forms"]
                },
                "/",
                {
                    name: "basicstyles",
                    groups: ["basicstyles", "cleanup"]
                },
                {
                    name: "paragraph",
                    groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
                },
                {
                    name: "links",
                    groups: ["links"]
                },
                {
                    name: "insert",
                    groups: ["insert"]
                },
                "/",
                {
                    name: "styles",
                    groups: ["styles"]
                },
                {
                    name: "colors",
                    groups: ["colors"]
                },
                {
                    name: "tools",
                    groups: ["tools"]
                },
                {
                    name: "others",
                    groups: ["others"]
                },
                {
                    name: "about",
                    groups: ["about"]
                },
            ],
            removeButtons: "Save,NewPage,ExportPdf,Preview,Templates,Scayt,Language,Image,Flash,Anchor",
        });
        CKEDITOR.replace("services", {
            toolbarGroups: [{
                    name: "document",
                    groups: ["mode", "document", "doctools"]
                },
                {
                    name: "clipboard",
                    groups: ["clipboard", "undo"]
                },
                {
                    name: "editing",
                    groups: ["find", "selection", "spellchecker", "editing"],
                },
                {
                    name: "forms",
                    groups: ["forms"]
                },
                "/",
                {
                    name: "basicstyles",
                    groups: ["basicstyles", "cleanup"]
                },
                {
                    name: "paragraph",
                    groups: ["list", "indent", "blocks", "align", "bidi", "paragraph"],
                },
                {
                    name: "links",
                    groups: ["links"]
                },
                {
                    name: "insert",
                    groups: ["insert"]
                },
                "/",
                {
                    name: "styles",
                    groups: ["styles"]
                },
                {
                    name: "colors",
                    groups: ["colors"]
                },
                {
                    name: "tools",
                    groups: ["tools"]
                },
                {
                    name: "others",
                    groups: ["others"]
                },
                {
                    name: "about",
                    groups: ["about"]
                },
            ],
            removeButtons: "Save,NewPage,ExportPdf,Preview,Templates,Scayt,Language,Image,Flash,Anchor",
        });
        const loadImg = (source, target) => {
            if (source.files && source.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(target).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(source.files[0]);
            }
        }
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
                    <strong>New Course</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('admin.course') }}" class="btn btn-primary">Back To Courses</a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{ $title }} Form <small>Can Create New Course</small></h5>

                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ route('admin.course.create') }}" enctype="multipart/form-data">
                                @csrf

                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="ldimg"
                                                    style="border:1px solid #ddd;width:200px;height: 200px;">
                                                    <img id="shimg" style="width: 100%;height:100%" />
                                                </label>
                                                <input name="img" onchange="loadImg(this,'shimg')" type="file"
                                                    id="ldimg" style="visibility: hidden;display: block">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Course Name</label>
                                                <input type="text" placeholder="Course Name" name="name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Course Category</label>
                                                <select class="form-control" name="category">
                                                    @foreach (App\Models\CourseCategory::latest('name')->get() as $courseCate)
                                                        <option value="{{ $courseCate->id }}">{{ $courseCate->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="">Description</label>
                                                <textarea class="form-control" name="description" rows="5" style="resize: none"
                                                    placeholder="Description Here ..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="">Content</label>
                                                <textarea id="content" class="form-control" name="content" rows="5" style="resize: none"
                                                    placeholder="Content Here ..."></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="">Services</label>
                                                <textarea id="services" class="form-control" name="services" rows="5" style="resize: none"
                                                    placeholder="Content Here ..."></textarea>
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
