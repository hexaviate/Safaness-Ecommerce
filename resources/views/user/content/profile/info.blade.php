@extends('user.content.profile')

@section('info')
    <div class="tab-header">
        <h2>Personal Information</h2>
    </div>
    <div class="personal-info-form" data-aos="fade-up" data-aos-delay="100">
        <form class="php-email-form">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="Lorem" required="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="Ipsum" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="lorem@example.com"
                        required="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="+1 (555) 123-4567">
                </div>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="1990-01-01">
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male"
                        checked="">
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other">
                    <label class="form-check-label" for="genderOther">Other</label>
                </div>
            </div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your information has been updated. Thank you!</div>
            <div class="text-end">
                <button type="submit" class="btn btn-save">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
