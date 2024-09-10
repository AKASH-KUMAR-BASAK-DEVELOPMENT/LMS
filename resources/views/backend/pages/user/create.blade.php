@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create new user</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Role</span>
                                    </span>
                                    </div>
                                    <select class="form-control" name="role_id" required>
                                        <option selected disabled>-Choose One-</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Name</span>
                                    </span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Ex. Romanaf Scarlet">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Email</span>
                                    </span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Ex. romanaf@gmail.com">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">Password</span>
                                    </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="">
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
