@extends('layouts.admin.app')
@if( isset($course) )
    @section('page-title','Edit Course | '.$course->title)
@section('title','Edit Course - '.$course->title)
@else
    @section('title','Add New Course')
@section('page-title','Add New Course')
@endif
@section('style')@endsection


@section('sub-title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0 text-capitalize">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">Courses</a></li>

            @if( isset($course) )
                <li class="breadcrumb-item active">Edit Course</li>
            @else
                <li class="breadcrumb-item active">add new Course</li>
            @endif

        </ol>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if( isset($course) )
                        <h4 class="card-title mb-4">Edit Course</h4>
                    @else
                        <h4 class="card-title mb-4">Add New Course</h4>
                    @endif
                    <form class="outer-repeater"
                          @if( isset($course) )
                          action="{{ route('admin.courses.update',$course->id) }}"
                          @else
                          action="{{ route('admin.courses.store') }}"
                          @endif
                          method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        @if( isset($course) )
                            @method('PUT')
                        @endif
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Course Title</label>
                                    <div class="col-lg-10">
                                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Course title..."
                                               @if( isset($course) )
                                               value="{{ $course->title }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="about" class="col-form-label col-lg-2">About Course</label>
                                    <div class="col-lg-10">
                                        <input id="about" name="about" type="text" class="form-control" placeholder="Enter About Course..."
                                               @if( isset($course) )
                                               value="{{ $course->brief }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="category" class="col-form-label col-lg-2">Category</label>
                                    <div class="col-lg-10">

                                        <select class="form-control select2" id="category" name="category">
                                            <option selected disabled>Select</option>
                                            @foreach($data['categories'] as $item)
                                                <option
                                                    value="{{ $item->id }}"
                                                    @if( isset($course) && $course->category_id == $item->id)selected='selected'@endif
                                                >
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="tag" class="col-form-label col-lg-2">Tags</label>
                                    <div class="col-lg-10">

                                        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." id="tags" name="tags[]">
                                            @foreach($data['tags'] as $item)
                                                <option
                                                    value="{{ $item->id }}"
                                                    @if( isset($course) && $course->hasTag($item->id) )selected='selected'@endif
                                                >
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="level" class="col-form-label col-lg-2">Level</label>
                                    <div class="col-lg-10">

                                        <select class="select2 form-control" data-placeholder="Choose ..." id="level" name="level">
                                            <option selected disabled>Select</option>
                                            @foreach($data['levels'] as $item)
                                                <option
                                                    @if( isset($course) && $course->level_id == $item->id)selected='selected'@endif
                                                value="{{ $item->id }}"
                                                >
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="duration" class="col-form-label col-lg-2">Duration</label>
                                    <div class="col-lg-10">
                                        <input id="duration" name="duration" type="text" class="form-control" placeholder="Duration"
                                               @if( isset($course) )
                                               value="{{ $course->duration }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="location" class="col-form-label col-lg-2">location</label>
                                    <div class="col-lg-10">
                                        <input id="location" name="location" type="text" class="form-control" placeholder="location"
                                               @if( isset($course) )
                                               value="{{ $course->location }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="photo" class="col-form-label col-lg-2">photo</label>
                                    <div class="col-lg-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" >
                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="col-10">
                            @if( isset($course) )
                                <div class="col-12">Old photo</div>
                                <div class="col-12"><img src="{{ $course->getPhoto() }}" class="img-fluid rounded-top" alt="{{ $course->name }}" style="max-width: 10em;max-height: 10em;display: block;margin: auto"></div>
                            @endif
                            <hr class="col-10">
                            <div class="col-12">
                                <div class="form-group row  mb-4">
                                    <label for="description" class="col-form-label col-lg-12">Content</label>
                                    <div class="col-lg-12">
                                        <textarea id="description" name="description" class="summernote">@if( isset($course) ){{ $course->description }}@endif</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-11">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
