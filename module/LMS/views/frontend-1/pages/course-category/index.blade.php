@extends('frontend-1.layout.app')
@section('content')

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
{{--        @include('frontend-1.partials.dashboard-header')--}}
        <section class="pt-0">
            <div class="container">
                <div class="row">
{{--                    @include('frontend-1.partials.dashboard-sidebar')--}}
                    <div class="col-xl-12">
                        <div style="margin-left: 0 !important;">


                            <!-- Page main content START -->
                            <div class="page-content-wrapper">

                                <!-- Title -->
                                <div class="row m-2">
                                    <div class="col-12 d-sm-flex justify-content-between align-items-center">
                                        <h1 class="h3 mb-2 mb-sm-0">Course Categories</h1>
                                        <a href="{{ route('course-category.create') }}" class="btn btn-sm btn-primary mb-0">Create a Category</a>
                                    </div>
                                </div>

                                <!-- Card START -->
                                <div class="card bg-transparent">
                                    <!-- Card body START -->
                                    <div class="card-body">
                                        <!-- Course table START -->
                                        <div class="table-responsive border-0 rounded-3">
                                            <!-- Table START -->
                                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                <!-- Table head -->
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 rounded-start">Categories</th>
                                                    <th scope="col" class="border-0">Added Date</th>
                                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                                </tr>
                                                </thead>

                                                <!-- Table body START -->
                                                <tbody>

                                                @foreach($courseCategories as $courseCategory)
                                                    <tr>
                                                        <!-- Table data -->
                                                        <td>
                                                            <div class="d-flex align-items-center position-relative">
                                                                <!-- Image -->
                                                                <div class="w-60px">
                                                                    <img src="{{ asset('frontend-1/assets/images/courses/4by3/08.jpg') }}" class="rounded" alt="">
                                                                </div>
                                                                <!-- Title -->
                                                                <h6 class="table-responsive-title mb-0 ms-2">
                                                                    {{ $courseCategory->name }}
                                                                </h6>
                                                            </div>
                                                        </td>

                                                        <!-- Table data -->
                                                        <td>{{ $courseCategory->created_at->toDateString() }}</td>


                                                        <td>
                                                            <a href="#" class="btn btn-sm btn-success-soft me-1 mb-1 mb-md-0"><i class="fa fa-edit"></i></a>
                                                            <button type="button" onclick="confirmAndSubmit({{ $courseCategory->id }})" class="btn btn-sm btn-danger-soft mb-0">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <!-- Table body END -->
                                            </table>
                                            <!-- Table END -->
                                        </div>
                                        <!-- Course table END -->
                                    </div>
                                    <!-- Card body END -->

                                    <!-- Card footer START -->
                                    <div class="card-footer bg-transparent pt-0">
                                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                                            <p class="mb-0 text-center text-sm-start">Showing {{ $courseCategories->firstItem() }} to {{ $courseCategories->lastItem() }} of {{ $courseCategories->total() }} entries</p>
                                            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                                                <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                                    @if ($courseCategories->onFirstPage())
                                                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                    @else
                                                        <li class="page-item mb-0"><a class="page-link" href="{{ $courseCategories->previousPageUrl() }}" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                                                    @endif
                                                    @foreach ($courseCategories->getUrlRange(1, $courseCategories->lastPage()) as $page => $url)
                                                        <li class="page-item mb-0 {{ $page == $courseCategories->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                    @endforeach
                                                    @if ($courseCategories->hasMorePages())
                                                        <li class="page-item mb-0"><a class="page-link" href="{{ $courseCategories->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
                                                    @else
                                                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <!-- Card footer END -->
                                </div>
                                <!-- Card END -->
                            </div>
                            <!-- Page main content END -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <script>
        function confirmAndSubmit(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                const form = document.createElement('form');
                form.setAttribute('id', 'deleteForm');
                form.setAttribute('action', `{{ route('course-category.destroy', '') }}/${id}`);
                form.setAttribute('method', 'POST');
                const csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                const methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
