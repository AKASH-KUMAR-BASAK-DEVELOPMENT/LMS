@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit user</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Role</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="icofont icofont-users-alt-3 text-light"></i></span></div>
                                            <select class="form-control" name="role_id" required>
                                                @foreach($roles as $role)
                                                    @if($user->role->id == $role->id)
                                                        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                    @else
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Name</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="icofont icofont-user-alt-7 text-light"></i></span></div>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Ex. Romanaf Scarlet">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Email</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="icofont icofont-envelope text-light"></i></span></div>
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Ex. romanaf@gmail.com" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label class="col-sm-4 col-lg-2 col-form-label">Password</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="icofont icofont-key text-light"></i></span></div>
                                            <input type="password" value="********" name="password" class="form-control" placeholder="">
                                        </div>
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
