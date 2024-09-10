@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Courses</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Level</th>
{{--                        <th>Price</th>--}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->courseLevel->name }}</td>
{{--                            <td>{{ $course->price }}</td>--}}
                            <td>
                                @if($course->status == 1)
                                    <span class="badge bg-success bg-opacity-15 text-light">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-15 text-light">Inactive</span>
                                @endif
                            </td>

                            <td style="overflow: hidden;">
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-info" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-eye"></i></a>
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></a>
                                <form action="{{ route('course.destroy', $course->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="width: 40px">
                                        <i class="icofont icofont-bin"></i>
                                    </button>
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
