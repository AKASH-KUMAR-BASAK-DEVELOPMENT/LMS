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
                                    <h1 class="text-white">{{ $topic->name }}</h1>
                                    <p class="text-light">Dashboard/Courses//Curriculum/{{ $topic->name }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="container">
                            <form action="{{ route('topic.store') }}" onsubmit="return false" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center border rounded p-2">
                                    <div class="position-relative">
                                        <span class="btn btn-info-soft btn-round btn-sm mb-0 position-static"><i class="fas fa-file"></i></span>
                                        <span class="ms-2 mb-0 h6 fw-light">{{ $topic->name }}</span>
                                        <br><br>
                                        <p style="font-size: 12px;">{{ $topic->description }}</p>
                                        <br>
                                        <div class="d-flex flex-wrap">
                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'image')->get() as $learningResource)
                                                @if($learningResource->link)
                                                    <div class="text-center">
                                                        <button class="btn btn-info" onclick="openImageModal('{{ asset($learningResource->link) }}')">View Image <i class="fa fa-image"></i> </button>
                                                    </div>
                                                @endif
                                            @endforeach
                                            &nbsp;&nbsp;
                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'video')->get() as $learningResource)
                                                @if(file_exists($learningResource->link))
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-info" onclick="openVideoModal('{{ asset($learningResource->link) }}')">View Video <i class="fa fa-play"></i></button>
                                                    </div>
                                                @endif
                                            @endforeach
                                            &nbsp;&nbsp;
                                            @foreach(\Module\LMS\Models\LearningResourceModel::where('course_curriculum_topic_id', $topic->id)->where('type', 'document')->get() as $learningResource)
                                                @if(file_exists($learningResource->link))
                                                    <button class="btn btn-info" onclick="openIframeModal('{{ asset($learningResource->link) }}')">View PDF <i class="fa fa-file-pdf"></i></button>
                                                @endif
                                            @endforeach
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
                    location.reload();
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
    </script>


    <script>
        function openImageModal(imageSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var image = document.createElement('img');
            image.src = imageSrc;
            image.style.maxWidth = '80%';
            image.style.maxHeight = '80%';
            modal.appendChild(closeButton);
            modal.appendChild(image);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>

    <script>
        function openVideoModal(videoSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var video = document.createElement('video');
            video.style.maxWidth = '80%';
            video.style.maxHeight = '80%';
            video.controls = true;
            var source = document.createElement('source');
            source.src = videoSrc;
            source.type = 'video/mp4';
            video.appendChild(source);
            modal.appendChild(closeButton);
            modal.appendChild(video);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>

    <script>
        function openIframeModal(iframeSrc) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '9999';
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;'; // The "×" character
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.backgroundColor = 'transparent';
            closeButton.style.border = 'none';
            closeButton.style.color = '#fff';
            closeButton.style.fontSize = '24px';
            closeButton.style.cursor = 'pointer';
            closeButton.style.outline = 'none';
            closeButton.style.padding = '0';
            closeButton.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
            var iframe = document.createElement('iframe');
            iframe.src = iframeSrc;
            iframe.style.width = '80%';
            iframe.style.height = '80%';
            iframe.style.border = 'none';
            modal.appendChild(closeButton);
            modal.appendChild(iframe);
            document.body.appendChild(modal);
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        }
    </script>
@endsection
