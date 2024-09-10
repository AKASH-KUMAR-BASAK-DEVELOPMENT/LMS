@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>List of Exams</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $exam)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->duration }}</td>
                            <td>{{ $exam->createdUser->name }}</td>
                            <td>
                                @if($exam->status == 1)
                                    <span class="badge bg-success bg-opacity-15 text-light">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-15 text-light">Inactive</span>
                                @endif
                            </td>

                            <td style="overflow: hidden;">
                                <a href="{{ route('exams.show', $exam->id) }}" class="btn btn-info" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-eye"></i></a>
                                <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-primary" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></a>
                                <form action="{{ route('exams.destroy', $exam->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
