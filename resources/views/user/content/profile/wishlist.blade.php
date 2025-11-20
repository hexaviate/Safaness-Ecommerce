@extends('user.content.profile.wishlist')
@section('wishlist')
    <div class="tab-header">
        <h2>Wishlist</h2>
    </div>
    <div class="wishlist-items">
        <div class="row">
            <!-- Wishlist Item 1 -->
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="wishlist-item">
                    <div class="wishlist-image">
                        <img src="{{ asset('assets/dist/assets/img/product/product-1.webp') }}" alt="Product" loading="lazy">
                        <button class="remove-wishlist" type="button">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="wishlist-content">
                        <h5>Lorem ipsum dolor sit amet</h5>
                        <div class="product-price">$129.99</div>
                        <button class="btn btn-add-cart">Add to cart</button>
                    </div>
                </div>
            </div><!-- End Wishlist Item -->
        </div>
    </div>
@endsection
