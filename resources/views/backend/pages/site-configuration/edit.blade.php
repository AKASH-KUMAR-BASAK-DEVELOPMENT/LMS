@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Update company information</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('site-configuration.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Companies Basic Info</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <strong>Logo</strong> &nbsp; &nbsp; &nbsp;<input type="file" name="logo"><img src="{{ asset($siteConfiguration->logo) }}" height="80" width="80">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Name</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" value="{{ $siteConfiguration->name }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Title</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control" value="{{ $siteConfiguration->title }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">URL</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="url" class="form-control" value="{{ $siteConfiguration->url }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Address</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="address" class="form-control" value="{{ $siteConfiguration->address }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Email</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="email" class="form-control"  value="{{ $siteConfiguration->email }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Primary Contact</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="phone_primary" class="form-control"  value="{{ $siteConfiguration->phone_primary }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Short Description</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="short_description" rows="2" cols="5" class="form-control" placeholder=""> {{ $siteConfiguration->short_description }}</textarea>
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
                                        <textarea name="description" id="tinyTextarea" rows="5" cols="5" class="form-control" placeholder=""> {{ $siteConfiguration->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <h4 class="sub-title">Companies Additional Info</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <strong>Favicon</strong> &nbsp; &nbsp; &nbsp;<input type="file" name="favicon"><img src="{{ asset($siteConfiguration->favicon) }}" height="80" width="80">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Phone Secondary</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="phone_secondary" class="form-control"  value="{{ $siteConfiguration->phone_secondary }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Facebook Page Link</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="facebook_page_link" class="form-control"  value="{{ $siteConfiguration->facebook_page_link }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Instagram Link</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="instagram_link" class="form-control" value="{{ $siteConfiguration->instagram_link }}" placeholder="">                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Twitter Link</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="twitter_link" class="form-control" value="{{ $siteConfiguration->twitter_link }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Linkedin Link</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="linkedin_link" class="form-control" value="{{ $siteConfiguration->linkedin_link }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Google Map</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="google_map_link" class="form-control"  value="{{ $siteConfiguration->google_map_link }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Meta Title</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="meta_title" class="form-control" value="{{ $siteConfiguration->meta_title }}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Meta Description</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="meta_description" rows="5" cols="5" class="form-control" placeholder=""> {{ $siteConfiguration->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" class="block">Copyright</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="copyright" class="form-control" value="{{ $siteConfiguration->copyright }}" placeholder="">
                                    </div>
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
