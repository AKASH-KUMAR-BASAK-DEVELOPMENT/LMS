@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Website Banner</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('banners.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <h4 class="sub-title">Update banner Information</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <strong>Image</strong> &nbsp; &nbsp; &nbsp;<input type="file" name="image"><img src="{{ asset($banner->image) }}" height="80" width="80">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Title</span>
                                    </span>
                                    </div>
                                    <input type="text" name="title" class="form-control" value="{{ $banner->title }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Short Description</span>
                                    </span>
                                    </div>
                                    <textarea name="short_description" rows="2" cols="5" class="form-control" placeholder=""> {{ $banner->short_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Description</span>
                                    </span>
                                    </div>
                                    <textarea name="description" rows="5" cols="5" class="form-control" placeholder=""> {{ $banner->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Notification</span>
                                    </span>
                                    </div>
                                    <input type="text" name="notification" class="form-control" value="{{ $banner->notification }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Button</span>
                                    </span>
                                    </div>
                                    <input type="text" name="button" class="form-control" value="{{ $banner->button }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Link</span>
                                    </span>
                                    </div>
                                    <input type="text" name="link" class="form-control"  value="{{ $banner->link }}" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 text-center">
                        <button type="submit" class="btn hor-grd btn-grd-success rounded">&nbsp;Update&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
