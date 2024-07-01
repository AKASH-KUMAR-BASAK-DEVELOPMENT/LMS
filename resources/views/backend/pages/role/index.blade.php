@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Roles</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td style="overflow: hidden;">
                                <a href="{{ route('role-permission.edit', $role->id) }}" class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-key"></i></a>
{{--                                <button class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></button>--}}
                                <form action="{{ route('role.destroy', $role->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
{{--                                    <button type="submit" class="btn btn-danger" style="width: 40px">--}}
{{--                                        <i class="icofont icofont-bin"></i>--}}
{{--                                    </button>--}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
