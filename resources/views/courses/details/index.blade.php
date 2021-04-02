@extends('layouts.user.app')

@section('page-title'){{ $course->slug }}@endsection

@section('style')@endsection

@section('title'){{ $course->title }}@endsection

@section('sub-title','')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="card">
                <div class="card-body text-center">

                    <h5 class="card-title mb-3 font-size-18 font-weight-bolder">{{ $course->title }}</h5>
                    <p class="card-title-desc mb-3">{{ $course->brief }}</p>
                    <div class="mb-3 ">
                        <a class="image-popup-no-margins" href="{{ $course->getPhoto() }}">
                            <img src="{{ $course->getPhoto() }}" alt="" class="w-100 mx-auto img-thumbnail ">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <p class="font-size-12 text-muted mb-1">Duration</p>
                        <h6 class="">{{ $course->duration }}</h6>
                    </div>

                    <div class="mb-3">
                        <p class="font-size-12 text-muted mb-1">Location</p>
                        <h6 class="">{{ $course->location }}</h6>
                    </div>

                    <div class="mb-3">
                        <p class="font-size-12 text-muted mb-1">Category</p>
                        <h6 class=""><span class="badge badge-info">{{ $course->category->name }}</span></h6>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2">Tags</h5>
                    <p class="text-muted"></p>
                    <ul class="list-unstyled list-inline language-skill mb-0">
                        @foreach($course->tags as $item)
                            <li class="list-inline-item badge badge-soft-secondary"><span>{{ $item->name }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#experience" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Details</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="experience" role="tabpanel">
                            {!! $course->description !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')@endsection
