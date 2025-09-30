@extends('user.content.profile')
@section('payment')
    <div class="tab-header">
        <h2>Payment Methods</h2>
        <button class="btn btn-add-payment" type="button">
            <i class="bi bi-plus-lg"></i> Add payment method
        </button>
    </div>
    <div class="payment-methods">
        <!-- Payment Method 1 -->
        <div class="payment-method-item" data-aos="fade-up" data-aos-delay="100">
            <div class="payment-card">
                <div class="card-type">
                    <i class="bi bi-credit-card"></i>
                </div>
                <div class="card-info">
                    <div class="card-number">**** **** **** 4589</div>
                    <div class="card-expiry">Expires 09/2026</div>
                </div>
                <div class="card-actions">
                    <button class="btn-edit-card" type="button">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn-delete-card" type="button">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            <div class="default-badge">Default</div>
        </div><!-- End Payment Method -->

        <!-- Payment Method 2 -->
        <div class="payment-method-item" data-aos="fade-up" data-aos-delay="200">
            <div class="payment-card">
                <div class="card-type">
                    <i class="bi bi-credit-card"></i>
                </div>
                <div class="card-info">
                    <div class="card-number">**** **** **** 7821</div>
                    <div class="card-expiry">Expires 05/2025</div>
                </div>
                <div class="card-actions">
                    <button class="btn-edit-card" type="button">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn-delete-card" type="button">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            <button class="btn btn-sm btn-make-default" type="button">Make default</button>
        </div><!-- End Payment Method -->
    </div>
@endsection
