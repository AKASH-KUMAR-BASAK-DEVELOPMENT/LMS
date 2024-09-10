@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create new Slider</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Title</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="title" name="title" type="text" class=" form-control" required>
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
                                        <textarea id="review" name="description" type="text" class=" form-control"></textarea>
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
                                        <input id="name" name="link" type="text" class=" form-control">
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
