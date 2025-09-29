@extends('user.layout.app')

@section('main')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Register</li>
                </ol>
            </nav>
            <h1>Register</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="register section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="registration-form-wrapper" data-aos="zoom-in" data-aos-delay="200">

                        <div class="section-header mb-4 text-center">
                            <h2>Create Your Account</h2>
                            <p>Sign up to start shopping and enjoy exclusive offers</p>
                        </div>

                        <form action="#" method="POST">

                            <div class="form-grub mb-3">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                        required="" minlength="2" placeholder="John">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required=""
                                    placeholder="you@example.com">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="password-input">
                                    <input type="password" class="form-control" name="password" id="password"
                                        required="" minlength="8" placeholder="At least 8 characters">
                                    <i class="bi bi-eye toggle-password"></i>
                                </div>
                                <small class="password-requirements">
                                    Must be at least 8 characters long and include uppercase, lowercase, number, and special
                                    character
                                </small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="confirmPassword">Confirm Password</label>
                                <div class="password-input">
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                        required="" minlength="8" placeholder="Repeat your password">
                                    <i class="bi bi-eye toggle-password"></i>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                        required="">
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                            Policy</a>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-primary w-100">Create Account</button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Already have an account? <a href="#">Sign in</a></p>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /Register Section -->
@endsection
