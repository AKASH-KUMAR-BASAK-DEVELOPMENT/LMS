@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create new company</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row m-b-20">
                <div class="col-sm-12 col-lg-6">
                    <h4 class="sub-title">Companies Basic Info</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <strong>Logo</strong> &nbsp; &nbsp; &nbsp;<input type="file" name="logo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Name</span>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">URL</span>
                                    </span>
                                </div>
                                <input type="text" name="url" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">ADDRESS</span>
                                    </span>
                                </div>
                                <input type="text" name="address" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Email</span>
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Primary Contact</span>
                                    </span>
                                </div>
                                <input type="text" name="phone_primary" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <h4 class="sub-title">Companies Additional Info</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <strong>Favicon</strong> &nbsp; &nbsp; &nbsp;<input type="file" name="favicon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Secondary Contact</span>
                                    </span>
                                </div>
                                <input type="text" name="phone_secondary" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Facebook Page</span>
                                    </span>
                                </div>
                                <input type="text" name="facebook_page_link" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Google Map</span>
                                    </span>
                                </div>
                                <input type="text" name="google_map_link" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Meta Description</span>
                                    </span>
                                </div>
                                <textarea name="meta_description" rows="5" cols="5" class="form-control" placeholder=""></textarea>
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
