@extends('user.layout.app')

@section('main')
    <!-- Page Title -->
    <div class="page-title light-background position-relative">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Login</li>
                </ol>
            </nav>
            <h1>Login</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="login section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8" data-aos="zoom-in" data-aos-delay="200">
                    <div class="login-form-wrapper">
                        <div class="login-header text-center">
                            <h2>Login</h2>
                            <p>Welcome back! Please enter your details</p>
                        </div>

                        <form>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                    required="" autocomplete="email">
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">Password</label>
                                    <a href="#" class="forgot-link">Forgot password?</a>
                                </div>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                                    required="" autocomplete="current-password">
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>

                            <div class="signup-link text-center">
                                <span>Don't have an account?</span>
                                <a href="">Sign up here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Login Section -->
@endsection
