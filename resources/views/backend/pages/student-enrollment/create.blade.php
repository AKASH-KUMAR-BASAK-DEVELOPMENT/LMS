@extends('backend.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create a enrollment</h5>
        </div>
        <div class="card-block">
            <form action="{{ route('dashboard-student-enrollments.store') }}" method="post">
                @csrf
                <div class="row m-b-20">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-button">
                                    <div class="input-group-prepend">
                                    <span class="btn btn-secondary" id="basic-addon9">
                                    <span class="">User</span>
                                    </span>
                                    </div>
                                    <select class="form-control" name="user_id" required>
                                        <option selected disabled>-Choose One-</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }}) &#10070; {{ $user->role->name }}</option>
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
                                    <span class="">Course</span>
                                    </span>
                                    </div>
                                    <select class="form-control" name="course_id" required>
                                        <option selected disabled>-Choose One-</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }} &#10070; by {{ $course->createdBy->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 text-center">
                        <button type="submit" class="btn hor-grd btn-grd-success rounded">&nbsp;Submit&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        {!! session('success') ? 'showToast("Status Changed!", 5000, "rgba(13, 179, 13, 0.77)", "#fff");' : (session('error') ? 'showToast("Enrollment Already Exist!", 5000, "rgba(255, 68, 68, 0.77)", "#fff");' : '') !!}
        function showToast(message, duration, bgColor, textColor) {
            var toastContainer = document.createElement("div");
            toastContainer.textContent = message;
            toastContainer.style.position = "fixed";
            toastContainer.style.bottom = "90%";
            toastContainer.style.right = "2%";
            toastContainer.style.transform = "translateX(-50%)";
            toastContainer.style.backgroundColor = bgColor;
            toastContainer.style.color = textColor;
            toastContainer.style.padding = "10px 20px";
            toastContainer.style.fontSize = "16px";
            toastContainer.style.borderRadius = "5px";
            toastContainer.style.zIndex = 9999;
            toastContainer.style.textShadow = "2px 2px 4px rgba(0, 0, 0, 0.5)";
            toastContainer.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.3)";
            document.body.appendChild(toastContainer);
            setTimeout(function () {
                document.body.removeChild(toastContainer);
            }, duration);
        }
    </script>
@endsection
