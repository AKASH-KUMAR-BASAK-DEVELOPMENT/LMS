@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Partner</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('partners.update', $partner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <label for="name" class="block">Name</label>
                                </div>
                                <div class="col-sm-12">
                                <input id="name" name="name" type="text" value="{{ $partner->name }}" class=" form-control" required>
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
                                <textarea id="review" name="description" value="{{ $partner->description }}" type="text" class=" form-control" required></textarea>
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
                                    <input id="name" name="link" type="text" value="{{ $partner->link }}" class=" form-control">
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
                                            <img src="{{ asset($partner->image) }}" width="100px" height="100px">
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
