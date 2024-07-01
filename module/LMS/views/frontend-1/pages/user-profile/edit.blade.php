@extends('frontend-1.layout.app')
@section('content')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="pt-5 pb-0" style="background-image:url({{ asset('frontend-1/assets/images/element/map.svg') }}); background-position: center left; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-6 text-center mx-auto">
                        <h1 class="mb-4">My Profile</h1>
                    </div>
                </div>

            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Image and contact form START -->
        <section>
            <div class="container">
                <div class="row">

                    <!-- Contact form START -->
                    <div class="col-md-12">
                        <!-- Title -->
                        <h4 class="mt-4 mt-md-0">Hello <span class="text-success">{{ $user->name }}!</span> You are a {{ $user->role->name }} of <span class="text-success">{{ company()->name }}</span></h4>
                        <form action="/user-profile-update" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <!-- Image -->
                            <div class="mb-4 bg-light-input">
                                <label for="yourName" class="form-label"><img src="{{ asset($user->image ?? 'frontend-1/assets/images/default-image.jpg') }}" height="100px" width="100px"></label>
                                <input type="file" class="form-control form-control-lg" id="yourImage" name="image">
                            </div>
                            <!-- Name -->
                            <div class="mb-4 bg-light-input">
                                <label for="yourName" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-lg" id="yourName" name="name" value="{{ $user->name }}">
                            </div>
                            <!-- Email -->
                            <div class="mb-4 bg-light-input">
                                <label for="emailInput" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-lg" id="emailInput" name="email" value="{{ $user->email }}" readonly>
                            </div>
                            <!-- Password -->
                            <div class="mb-4 bg-light-input">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg" id="emailInput" name="password" placeholder="********">
                            </div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary mb-0" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form END -->
                </div>
            </div>
        </section>
        <!-- =======================
        Image and contact form END -->


    </main>
@endsection
