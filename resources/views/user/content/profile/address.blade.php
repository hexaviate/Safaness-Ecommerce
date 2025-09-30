@extends('user.content.profile')
@section('address')
    <div class="tab-header">
        <h2>My Addresses</h2>
        <button class="btn btn-add-address" type="button">
            <i class="bi bi-plus-lg"></i> Add new address
        </button>
    </div>
    <div class="addresses-list">
        <div class="row">
            <!-- Address Item 1 -->
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="address-item">
                    <div class="address-header">
                        <h5>Home Address</h5>
                        <div class="address-actions">
                            <button class="btn-edit-address" type="button">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn-delete-address" type="button">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="address-content">
                        <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
                    </div>
                    <div class="default-badge">Default</div>
                </div>
            </div><!-- End Address Item -->

            <!-- Address Item 2 -->
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="address-item">
                    <div class="address-header">
                        <h5>Work Address</h5>
                        <div class="address-actions">
                            <button class="btn-edit-address" type="button">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn-delete-address" type="button">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="address-content">
                        <p>456 Business Ave<br>Suite 200<br>San Francisco, CA 94107<br>United States
                        </p>
                    </div>
                    <button class="btn btn-sm btn-make-default" type="button">Make
                        default</button>
                </div>
            </div><!-- End Address Item -->
        </div>
    </div>
@endsection
