@extends('user.layout.app')
@section('main')
<!-- Product List Section -->
    <section id="product-list" class="product-list section">

      <div class="container isotope-layout" data-aos="fade-up" data-aos-delay="100" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <div class="row">
          <div class="col-12">
            <div class="product-filters isotope-filters mb-5 d-flex justify-content-center" data-aos="fade-up">
              <ul class="d-flex flex-wrap gap-2 list-unstyled">
                <li class="filter-active" data-filter="*">All</li>
                <li data-filter=".filter-clothing">Clothing</li>
                <li data-filter=".filter-accessories">Accessories</li>
                <li data-filter=".filter-electronics">Electronics</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row product-container isotope-container" data-aos="fade-up" data-aos-delay="200">

          <!-- Product Item 1 -->
          <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
            <div class="product-card">
              <div class="product-image">
                <span class="badge">Sale</span>
                <img src="{{asset("assets/dist/assets/img/product/product-1.webp")}}" alt="Product" class="img-fluid main-img">
                <img src="{{asset("assets/dist/assets/img/product/product-1-variant.webp")}}" alt="Product Hover" class="img-fluid hover-img">
                <div class="product-overlay">
                  <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                  <div class="product-actions">
                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-cart3"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-info">
                <h5 class="product-title"><a href="product-details.html">Lorem ipsum dolor sit amet</a></h5>
                <div class="product-price">
                  <span class="current-price">$89.99</span>
                  <span class="old-price">$129.99</span>
                </div>
                <div class="product-rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <span>(24)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Item -->

          <!-- Product Item 2 -->
          <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics">
            <div class="product-card">
              <div class="product-image">
                <img src="{{asset("assets/dist/assets/img/product/product-2.webp")}}" alt="Product" class="img-fluid main-img">
                <img src="{{asset("assets/dist/assets/img/product/product-2-variant.webp")}}" alt="Product Hover" class="img-fluid hover-img">
                <div class="product-overlay">
                  <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                  <div class="product-actions">
                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-cart3"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-info">
                <h5 class="product-title"><a href="product-details.html">Consectetur adipiscing elit</a></h5>
                <div class="product-price">
                  <span class="current-price">$249.99</span>
                </div>
                <div class="product-rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                  <span>(18)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Item -->

          <!-- Product Item 3 -->
          <div class="col-md-6 col-lg-3 product-item isotope-item filter-accessories">
            <div class="product-card">
              <div class="product-image">
                <span class="badge">New</span>
                <img src="{{asset("assets/dist/assets/img/product/product-3.webp")}}" alt="Product" class="img-fluid main-img">
                <img src="{{asset("assets/dist/assets/img/product/product-3-variant.webp")}}" alt="Product Hover" class="img-fluid hover-img">
                <div class="product-overlay">
                  <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                  <div class="product-actions">
                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-cart3"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-info">
                <h5 class="product-title"><a href="product-details.html">Sed do eiusmod tempor</a></h5>
                <div class="product-price">
                  <span class="current-price">$59.99</span>
                </div>
                <div class="product-rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <span>(7)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Item -->

          <!-- Product Item 8 -->
          <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics">
            <div class="product-card">
              <div class="product-image">
                <img src="{{asset("assets/dist/assets/img/product/product-8.webp")}}" alt="Product" class="img-fluid main-img">
                <img src="{{asset("assets/dist/assets/img/product/product-8-variant.webp")}}" alt="Product Hover" class="img-fluid hover-img">
                <div class="product-overlay">
                  <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                  <div class="product-actions">
                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                    <a href="#" class="action-btn"><i class="bi bi-cart3"></i></a>
                  </div>
                </div>
              </div>
              <div class="product-info">
                <h5 class="product-title"><a href="product-details.html">Ex ea commodo consequat</a></h5>
                <div class="product-price">
                  <span class="current-price">$159.99</span>
                </div>
                <div class="product-rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <span>(29)</span>
                </div>
              </div>
            </div>
          </div><!-- End Product Item -->

        </div>

        <div class="text-center mt-5" data-aos="fade-up">
          <a href="category.html" class="view-all-btn">View All Products <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </section><!-- /Product List Section -->
@endsection
