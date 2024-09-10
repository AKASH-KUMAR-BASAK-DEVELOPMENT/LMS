@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Slider</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">title</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="title" name="title" type="text" value="{{ $slider->title }}" class=" form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Description</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea id="review" name="description" value="{{ $slider->description }}" type="text" class=" form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Link</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="name" name="link" type="text" value="{{ $slider->link }}" class=" form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Image</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="file" name="image">
                                        <img src="{{ asset($slider->image) }}" width="100px" height="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 text-center">
                        <button type="submit" class="btn hor-grd btn-grd-success rounded">&nbsp;Save&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
