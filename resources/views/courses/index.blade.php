@extends('layouts.user.app')

@section('page-title',env('APP_NAME'))

@section('style')
    <style>

        .card-img, .card-img-top {
            height: 11em;
            border-top-left-radius: calc(.25rem - 0);
            border-top-right-radius: calc(.25rem - 0);
        }
        .card-first-row {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 13em;
        }
    </style>
@endsection

@section('title','Home Page')

@section('sub-title','')

@section('content')
    <div class="col-md-12">
        @if(request('s'))
            <div class="alert alert-secondary" role="alert">
                Search Word: (<strong class="alert-link">{{ request('s') }}</strong>)
            </div>
        @endif

        <div class="card-deck-wrapper">
            <div class="card-deck">
                @foreach($courses as $item)
                    @break($loop->index == 3)

                    <div class="card mb-4">
                        <a href="{{ route('course.details',$item->slug) }}">

                            <div class="card-first-row" style="background-image: url('{{ $item->getPhoto() }}')"></div>
                            <div class="card-body">
                                <h4 class="card-title mt-0">
                                    {{ $item->title }}
                                </h4>
                                <p class="card-text text-muted">{{ Str::words($item->brief,10) }}</p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                    <span class="badge badge-pill badge-soft-secondary fa-1x float-right">{{ $item->category->name }}</span>
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            @foreach($courses as $item)
                @continue($loop->index < 3)
                <div class="col-lg-6 p-1">
                    <div class="card">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-4">
                                <a class="image-popup-no-margins" href="{{ $item->getPhoto() }}">
                                    <img class="card-img img-fluid" src="{{ $item->getPhoto() }}" alt="{{ $item->title }}">
                                </a>

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ Str::words($item->brief,5) }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                        <span class="badge badge-pill badge-soft-secondary fa-1x float-right">{{ $item->category->name }}</span>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')@endsection
