@extends('frontend-1.layout.app')
@section('content')

{{--    @include('frontend-1.partials.dashboard-header')--}}
    <section class="pt-0">
        <div class="container">
            <div class="row">
{{--                @include('frontend-1.partials.dashboard-sidebar')--}}
                <div class="col-xl-12">
                    <div class="" style="margin-left: 0 !important;">
                        <div class="page-content-wrapper ">
                            <div class="card bg-transparent">
                                <div class="row m-2">
                                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                                        <h1 class="h3 mb-2 mb-sm-0">{{ $assessment->title }}: Student Assignments</h1>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive border-0 rounded-3">
                                        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="border-0">Student</th>
                                                <th scope="col" class="border-0">File</th>
                                                <th scope="col" class="border-0">Mark</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($studentAssessments as $studentAssessment)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="w-60px">
                                                                <img src="{{ asset($studentAssessment->user->image) }}" class="rounded" alt="">
                                                            </div>
                                                            <h6 class="table-responsive-title mb-0 ms-2">
                                                                {{ $studentAssessment->user->name }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset($studentAssessment->link) }}" target="_blank" title="Click to open file">{{ $studentAssessment->title }}</a>
                                                    </td>
                                                    <td>
                                                        @if(!isset($studentAssessment->mark))
                                                            <button id="giveMarkButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#giveMarkModal" data-student-assessment-id="{{ $studentAssessment->id }}" data-student-name="{{ $studentAssessment->user->name }}" data-assessment-id="{{ $assessment->id }}" data-assessment-title="{{ $assessment->title }}">Give Mark</button>
                                                        @else
                                                            <button id="giveMarkButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#giveMarkModal" data-student-assessment-id="{{ $studentAssessment->id }}" data-student-name="{{ $studentAssessment->user->name }}" data-assessment-id="{{ $assessment->id }}" data-assessment-title="{{ $assessment->title }}">{{ $studentAssessment->mark }}</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">No courses available.</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent pt-0">
                                    <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                        <p class="mb-0 text-center text-sm-start">Showing {{ $studentAssessments->firstItem() }} to {{ $studentAssessments->lastItem() }} of {{ $studentAssessments->total() }} entries</p>
                                        <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                            <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                                @if ($studentAssessments->onFirstPage())
                                                    <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                @else
                                                    <li class="page-item mb-0"><a class="page-link" href="{{ $courses->previousPageUrl() }}" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                @endif
                                                @foreach ($studentAssessments->getUrlRange(1, $studentAssessments->lastPage()) as $page => $url)
                                                    <li class="page-item mb-0 {{ $page == $studentAssessments->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                @endforeach
                                                @if ($studentAssessments->hasMorePages())
                                                    <li class="page-item mb-0"><a class="page-link" href="{{ $studentAssessments->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
                                                @else
                                                    <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="giveMarkModal" tabindex="-1" aria-labelledby="giveMarkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="giveMarkModalLabel">Give Mark</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="giveMarkForm" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Hidden inputs to store the IDs -->
                        <input type="hidden" id="studentAssessmentIdInput" name="student_assessment_id">
                        <input type="hidden" id="assessmentIdInput" name="assessment_id">

                        <!-- Your form inputs go here -->
                        <div class="mb-3">
                            <label for="marksInput" class="form-label" id="marksInput">Marks</label>
                            <input type="number" class="form-control" id="marksInput" name="mark" placeholder="Enter marks">
                        </div>
                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var giveMarkModal = document.getElementById('giveMarkModal');
            giveMarkModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var studentAssessmentId = button.getAttribute('data-student-assessment-id');
                var assessmentId = button.getAttribute('data-assessment-id');
                var assessmentTitle = button.getAttribute('data-assessment-title');
                var studentName = button.getAttribute('data-student-name');
                var modal = this;
                modal.querySelector('.modal-body #studentAssessmentIdInput').value = studentAssessmentId;
                modal.querySelector('.modal-body #assessmentIdInput').value = assessmentId;
                document.getElementById('giveMarkModalLabel').innerText = 'Mark for '+assessmentTitle;
                document.getElementById('marksInput').innerText = 'Give mark to '+studentName;
                var form = modal.querySelector('#giveMarkForm');
                form.action = `{{ route('student-assessment.update', '') }}/${studentAssessmentId}`;
            });
        });
    </script>
@endsection
