@extends('layouts.admin.app')
@section('page-title','All Tags')

@section('style')@endsection

@section('title','Tags')

@section('sub-title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0 text-capitalize">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">home</a></li>
            <li class="breadcrumb-item active">Tags</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">All Tags</h3>
                    <button type="button" class="btn btn-primary waves-effect waves-light float-right " data-toggle="modal" data-target=".bs-add-modal">
                        <i class="fa fa-plus-circle font-size-16 align-middle mr-2"></i> Add New
                    </button>
                    <!-- .add-modal -->
                    <div class="modal fade bs-add-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form class="needs-validation" novalidate method="post" action="{{ route('admin.tags.store') }}" autocomplete="off">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0"><i class="fa fa-plus-circle font-size-16 align-middle mr-2"></i> Add New</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="tag-name" class="col-md-12 col-form-label">tag Name</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" id="tag-name" required name="name">
                                                <div class="invalid-tooltip" >
                                                    This field is Required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </form>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.add-modal -->
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
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>No. Of Courses</th>
                            <th>Controllers</th>
                        </tr>
                        </thead>

                        <tbody class="text-capitalize">
                        @forelse($tags as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td><span class="badge badge-pill badge-soft-info fa-1x">{{ $item->no_courses }} Courses</span></td>
                                <td>
                                    <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-delete-modal{{ $loop->index + 1 }}"><i class="fas fa-trash-alt"></i></button>
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-edit-modal{{ $loop->index + 1 }}"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- .delete-modal -->
                            <div class="modal fade bs-delete-modal{{ $loop->index + 1 }} text-left" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="needs-validation" novalidate method="post" action="{{ route('admin.tags.destroy',$item->id) }}">
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
                                                <h3 class="text-center">Are you Sure to delete <br />({{ $item->name }})?</h3>
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
                            <!-- .edit-modal -->
                            <div class="modal fade bs-edit-modal{{ $loop->index + 1 }} text-left" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="needs-validation" novalidate method="post" action="{{ route('admin.tags.update',$item->id) }}" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0"><i class="fas fa-edit font-size-16 mr-2"></i> Edit Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="tag-name-edit-{{ $loop->index + 1 }}" class="col-md-12 col-form-label">Tag Name</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" type="text" name="name" id="tag-name-edit-{{ $loop->index + 1 }}" required value="{{ $item->name }}" placeholder="{{ $item->name }}">
                                                        <div class="invalid-tooltip" >
                                                            This field is Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.edit-modal -->
                        @empty
                            <tr>
                                <td colspan="4">
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
