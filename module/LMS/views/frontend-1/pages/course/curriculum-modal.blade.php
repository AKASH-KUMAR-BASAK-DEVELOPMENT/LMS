<div class="modal fade" id="addLessons" tabindex="-1" aria-labelledby="addLessonsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/insert-curriculum" method="post" onsubmit="return false" id="course_curriculum_form">
            @csrf
            <input name="course_id" value="{{ $course->id }}" hidden>
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addLessonsLabel">Add Topic</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                            aria-label="Close">
                        <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Course name -->
                        <div class="col-12">
                            <label class="form-label">Topic name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="curriculum_name"
                                   placeholder="Enter topic name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal"
                            onclick="closeModal()">Close
                    </button>
                    <button type="button" class="btn btn-success my-0" onclick="addLesson()">Add Topic</button>
                </div>
            </div>
        </form>
    </div>
</div>
