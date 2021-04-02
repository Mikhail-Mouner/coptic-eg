@extends('layouts.admin.app')
@section('page-title','All Courses')

@section('style')@endsection

@section('title','Courses')

@section('sub-title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0 text-capitalize">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">home</a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">All Courses</h3>
                    <a href="{{ route('admin.courses.create') }}" type="button" class="btn btn-primary waves-effect waves-light float-right">
                        <i class="fa fa-plus-circle font-size-16 align-middle mr-2"></i> Add New
                    </a>
                </div>
                <div class="card-body">

                    <h4 class="card-title"></h4>
                    <p class="card-title-desc"></p>

                    @if( session()->has('success') )
                        <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                            <i class="mdi mdi-check-all mr-2"></i> {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if( session()->has('error') )
                        <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                            <i class="mdi mdi-check-all mr-2"></i> {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>duration</th>
                            <th>location</th>
                            <th>category</th>
                            <th>Status</th>
                            <th>tags</th>
                            <th>Created at</th>
                            <th>Controllers</th>
                        </tr>
                        </thead>

                        <tbody class="text-capitalize">
                        @forelse($courses as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ $item->getPhoto() }}" class="img-fluid rounded-top" alt="{{ $item->title }}" style="width: 3em;height: 3em"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ $item->location }}</td>
                                <td><span class="badge badge-pill badge-soft-info fa-1x">{{ $item->category->name }}</span></td>
                                <td>
                                    @if( !$item->trashed() )
                                        <span class="badge badge-pill badge-soft-success fa-1x">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-soft-warning fa-1x">Not Active</span>
                                    @endif
                                </td>
                                <td>
                                    @forelse($item->tags as $tag)
                                        <span class="badge badge-pill badge-soft-info fa-1x">{{ $tag->name }}</span>
                                    @empty
                                        -
                                    @endforelse
                                </td>

                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-delete-modal{{ $loop->index + 1 }}"><i class="fas fa-trash-alt fa-fw"></i></button>
                                        <a  href="{{ route('admin.courses.edit',$item->id) }}" class="btn btn-success waves-effect waves-light"><i class="fas fa-edit fa-fw"></i></a>
                                        <a href="{{ route('course.details',$item->slug) }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-eye fa-fw"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <!-- .delete-modal -->
                            <div class="modal fade bs-delete-modal{{ $loop->index + 1 }} text-left" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="needs-validation" novalidate method="post" action="{{ route('admin.courses.destroy',$item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0"><i class="fas fa-trash font-size-16 mr-2"></i> Delete Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-center">Are you Sure to delete <br />({{ $item->title }})?</h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.delete-modal -->
                        @empty
                            <tr>
                                <td colspan="7">
                                    Empty Data
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
