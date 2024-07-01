@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Course Enrollments</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>User</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentEnrollments as $studentEnrollment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $studentEnrollment->user->name }} <span style="font-style: italic; color: #0a966c;">({{ $studentEnrollment->user->role->name }})</span></td>
                            <td>{{ $studentEnrollment->course->title }}</td>
                            <td>
                                @if($studentEnrollment->status == 1)
                                    <span class="badge bg-success bg-opacity-15 text-light">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-15 text-light">Inactive</span>
                                @endif
                            </td>

                            <td style="overflow: hidden;">

                                    <a class="btn btn-success text-light" href="/course-enrollment-confirm/{{ $studentEnrollment->id }}" style="width: 40px">
                                        <i class="icofont icofont-check"></i>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
