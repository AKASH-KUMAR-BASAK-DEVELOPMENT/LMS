@extends('frontend-1.layout.app')
@section('content')
    @include('frontend-1.partials.dashboard-header')
    <section class="pt-0">
        <div class="container">
            <div class="row">
                @include('frontend-1.partials.dashboard-sidebar')
                <div class="col-xl-9">
                    <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded"
                             style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="text-white">{{ $curriculum->name }}</h1>
                                    <p class="text-light">Dashboard/Courses/{{ $curriculum->course->title }}/Curriculum/{{ $curriculum->name }}@if($folder)/folder/{{ $folder->name }} @endif</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="container">
                            <form action="{{ route('scorm-package.store') }}" id="scorm_package_form" method="post" onsubmit="return false"  enctype="multipart/form-data">
                                @csrf
                                @if($folder)
                                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                                @endif
                                <input type="hidden" name="course_id" value="{{ $curriculum->course->id }}">
                                <div class="row g-4">
                            <div class="col-12">
                                <div class="bg-light border rounded p-4">
                                    <h5 class="mb-0">SCORM PACKAGE UPLOAD</h5>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-left">Note: File must be .zip extension and follow the SCORM format</span>
                                        <span class="text-right" onclick="addMoreScormInput()"  style="cursor: pointer;"><i class="fas fa-fw fa-plus-circle"></i> ADD MORE</span>
                                    </div>
                                    <!-- Comment -->
                                    <div class="mt-3">
                                        <div class="col-12" id="scormAddedDiv">
                                            {{--                    @foreach($course->courseScormPackages as $course->courseScormPackage)--}}
                                            {{--                        <span id="eixstingScormPackage-{{ $course->courseScormPackage->id }}">{{ $loop->iteration }}. <span>{{ $course->courseScormPackage->link }}</span> &nbsp;&nbsp;&nbsp; <a href="/scorm/{{ $course->courseScormPackage->link }}" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-box-open"></i> OPEN</a> <span class="btn btn-danger" onclick="scromPackageDelete({{ $course->courseScormPackage->id }})"><i class="fas fa-fw fa-times"></i></span> <br></span>--}}
                                            {{--                    @endforeach--}}
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="curriculum_id" value="{{ $curriculum->id }}">
                                                <input type="file" class="form-control" name="scorm_package[]">
                                                <label class="input-group-text text-success">SCORM File</label>
                                                <button class="btn" onclick=""><i class="fas fa-fw fa"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex justify-content-between align-items-start mt-4">
                            <button class="btn btn-secondary prev-btn mb-2 mb-md-0 invisible">Previous
                            </button>
                            <div class="text-md-end">
                                <button type="submit" class="btn btn-success mb-sm-0"
                                        onclick="submitForm()">Update Course
                                </button>
                            </div>
                        </div>
                            </form>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <div id="progress-modal" class="modal" style="display: none;">
        <div class="modal-content" style="background-color: rgba(12,12,12,0.7);">
            <div style="display: flex; align-items: center; justify-content: center; margin-top: 12%; ">
                <lottie-player id="progress-lottie" src="https://lottie.host/0b9b8d29-d7e8-47da-90ac-212fbe218032/H9trT3bcdK.json" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <h4 style="color: rgb(0,255,144);">Uploading Course...</h4>
            </div>
            <div id="progress-wrapper" style="display: flex; align-items: center; justify-content: center;">
                <div id="progress-bar-container" style="background-color: #e0e0e0; width: 30%; height: 30px;">
                    <div id="progress-bar" style="width: 0; height: 100%; background: linear-gradient(to right, rgb(106,203,161), rgb(0,201,113));
); text-align: center; line-height: 30px;">
                        <span id="progress-text">0%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="display: none;">
            <button onclick="closeModal()" class="modal-close-button">Close</button>
        </div>
    </div>


    <script>
        function submitForm() {
            var form = document.getElementById('scorm_package_form');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);

            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    var progressBar = document.getElementById('progress-bar');
                    var progressText = document.getElementById('progress-text');

                    progressBar.style.width = percentComplete + '%';
                    progressText.style.color = 'white';
                    progressText.innerHTML = Math.round(percentComplete) + '%';
                }
            }, false);

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    location.href = '{{ route('course.edit', $curriculum->course->id ) }}'
                } else {
                    alert('An error occurred while submitting the form. Please try again.');
                    location.reload();
                    closeModal();
                }
            });

            xhr.addEventListener('error', function() {
                alert('An error occurred while submitting the form. Please try again.');
                closeModal();
            });

            xhr.addEventListener('abort', function() {
                alert('Form submission was aborted.');
                closeModal();
            });

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    closeModal();
                }
            };

            openModal();
            xhr.send(formData);
        }

        function openModal() {
            document.getElementById('progress-modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('progress-modal').style.display = 'none';
        }

        function addMoreScormInput() {
            let scormInputDiv = `<div class="input-group mb-3">
                                                                    <input type="file" class="form-control" name="scorm_package[]">
                                                                    <label class="input-group-text text-success">SCORM File</label>
                                                                    <button class="btn minus-btn" onclick="removeScormInput(this)"><i class="fas fa-fw fa-minus-circle"></i></button>
                                                                </div>`;
            let existingDiv = document.getElementById('scormAddedDiv').innerHTML;
            document.getElementById('scormAddedDiv').innerHTML = existingDiv + scormInputDiv;
        }
        function removeScormInput(button) {
            let inputGroup = button.parentNode;
            inputGroup.parentNode.removeChild(inputGroup);
        }
    </script>
@endsection
