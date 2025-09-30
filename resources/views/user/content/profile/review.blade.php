@extends('user.content.profile')
@section('review')
    <div class="tab-header">
        <h2>My Reviews</h2>
    </div>
    <div class="reviews-list">
        <!-- Review Item 1 -->
        <div class="review-item" data-aos="fade-up" data-aos-delay="100">
            <div class="review-header">
                <div class="review-product">
                    <img src="assets/img/product/product-4.webp" alt="Product" class="product-image" loading="lazy">
                    <div class="product-info">
                        <h5>Lorem ipsum dolor sit amet</h5>
                        <div class="review-date">Reviewed on 01/15/2025</div>
                    </div>
                </div>
                <div class="review-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                </div>
            </div>
            <div class="review-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget
                    ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.
                </p>
            </div>
            <div class="review-actions">
                <button class="btn btn-sm btn-edit-review" type="button">Edit</button>
                <button class="btn btn-sm btn-delete-review" type="button">Delete</button>
            </div>
        </div><!-- End Review Item -->

        <!-- Review Item 2 -->
        <div class="review-item" data-aos="fade-up" data-aos-delay="200">
            <div class="review-header">
                <div class="review-product">
                    <img src="assets/img/product/product-5.webp" alt="Product" class="product-image" loading="lazy">
                    <div class="product-info">
                        <h5>Consectetur adipiscing elit</h5>
                        <div class="review-date">Reviewed on 12/03/2024</div>
                    </div>
                </div>
                <div class="review-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
            </div>
            <div class="review-content">
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.</p>
            </div>
            <div class="review-actions">
                <button class="btn btn-sm btn-edit-review" type="button">Edit</button>
                <button class="btn btn-sm btn-delete-review" type="button">Delete</button>
            </div>
        </div><!-- End Review Item -->
    </div>
@endsection
