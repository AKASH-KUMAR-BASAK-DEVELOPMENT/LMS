@extends('frontend-1.layout.app')
@section('content')

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0" style="background:url({{ asset('frontend-1/assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
            <!-- Main banner background image -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Title -->
                        <h1 class="text-white">Submit a new Category</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Steps START -->
        <section>
            <div class="container">
                <div class="card bg-transparent border rounded-3 mb-5">
                    <div id="stepper" class="bs-stepper stepper-outline">
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Step content START -->
                            <div class="bs-stepper-content">
                                <form action="{{ route('course-category.store') }}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Category name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" placeholder="Ex. Advance" required>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary next-btn mb-0">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Steps END -->
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@endsection
