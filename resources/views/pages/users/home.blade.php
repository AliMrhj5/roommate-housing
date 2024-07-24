@php use Illuminate\Support\Carbon; @endphp
@extends('layouts.app')
<style>
    .info-block {
        background-color: #f9f9f9; /* خلفية خفيفة */
        border: 1px solid #ddd; /* إطار رمادي خفيف */
        border-radius: 10px; /* حواف مستديرة */
        padding: 20px; /* مساحة داخلية */
        margin-top: 20px; /* مسافة من الأعلى */
        text-align: left; /* محاذاة النص إلى اليسار */
    }
    .info-block .custom-label {
        font-weight: bold; /* جعل النص عريض */
        color: #333; /* لون النص */
    }
    .info-block .card-text {
        margin-bottom: 10px; /* مسافة بين الأسطر */
    }
    .info-block a {
        color: rgb(216, 213, 228); /* لون الرابط */
        text-decoration: none; /* إزالة الخط السفلي */
    }
    .info-block a:hover {
        text-decoration: underline; /* إضافة خط سفلي عند التمرير */
    }
    .card-title {
    margin-bottom: 15px; /* Space between title and content */
    font-size: 1.5rem; /* Larger font size for the title */
}
    .card-container {
    max-width: 450px; /* Adjust the width as per your design */
    margin: auto; /* Center the container horizontally */
    margin-top: 20px; /* Adjust the top margin to balance spacing */
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    padding: 20px; /* Ensure padding inside the card */
    overflow: hidden; /* منع تجاوز المحتوى */
    transition: transform 0.2s ease-in-out;
}
.card-container:hover {
        transform: scale(1.05); /* تكبير العنصر عند التمرير */
    }
    .card-img-top {
    width: 100%;
    height: 150px; /* يمكنك تعديل الارتفاع حسب الحاجة */
    object-fit: cover; /* لجعل الصورة تتناسب داخل الإطار مع الحفاظ على نسبة العرض إلى الارتفاع */
    border-radius: 8px; /* لتطابق الزوايا المستديرة للبطاقة */
}
    .custom-label {
    font-weight: bold; /* جعل النص غامقاً */
    font-size: 1.1rem; /* حجم أكبر للنص */

}
.btn-view-details {
    margin-top: 10px; /* Add some margin above the button */
    width: 100%; /* Make the button full width */
    background-color: #007bff; /* Primary button color */
    color: #fff; /* White text color */
    border: none; /* Remove border */
    border-radius: 4px; /* Rounded corners */
    padding: 10px; /* Padding for the button */
    text-align: center; /* Center text */
    text-decoration: none; /* Remove underline from link */
}

.btn-view-details:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
</style>
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<header id="home" class="header">
    <div class="overlay"></div>
    <div class="header-content container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="header-title">Find Your Perfect Roommate or Place to Stay</h1>
                <p class="header-subtitle">Discover the easiest way to find a roommate or a place to stay. Join our community now!</p>
                <a href="#contact" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
</header>
<!-- How It Works Section -->
<section class="section" id="how-it-works">

    <div class="container text-center">
        <h6 class="section-title mb-6">How It Works</h6>
        <div class="row">
            <div class="card-container">
                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="ti-search"></i>
                    </div>
                    <h6 class="title">Search</h6>
                    <p class="subtitle">Browse through thousands of listings to find the perfect roommate or place to stay.</p>
                </div>
            </div>
            <div class="card-container">
                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="ti-user"></i>
                    </div>
                    <h6 class="title">Connect</h6>
                    <p class="subtitle">Connect with potential roommates or landlords to discuss details and arrange viewings.</p>
                </div>
            </div>
            <div class="card-container">
                <div class="feature-card">
                    <div class="icon-wrapper">
                        <i class="ti-home"></i>
                    </div>
                    <h6 class="title">Move In</h6>
                    <p class="subtitle">Finalize your arrangements and move into your new home with ease and confidence.</p>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of How It Works section -->

<!-- Benefits Section -->
<section class="section bg-light" id="benefits">
    <div class="container text-center">
        <h6 class="section-title mb-6">Benefits</h6>
        <div class="row">
            <div class="card-container">
                <div class="benefit-card">
                    <div class="icon-wrapper">
                        <i class="ti-wallet"></i>
                    </div>
                    <h6 class="title">Affordable</h6>
                    <p class="subtitle">Find cost-effective housing options and save on rent by sharing with a roommate.</p>
                </div>
            </div>
            <div class="card-container">
                <div class="benefit-card">
                    <div class="icon-wrapper">
                        <i class="ti-time"></i>
                    </div>
                    <h6 class="title">Time-Saving</h6>
                    <p class="subtitle">Quickly find a match with our user-friendly search and filtering tools.</p>
                </div>
            </div>
            <div class="card-container">
                <div class="benefit-card">
                    <div class="icon-wrapper">
                        <i class="ti-heart"></i>
                    </div>
                    <h6 class="title">Reliable</h6>
                    <p class="subtitle">Connect with verified users and find trustworthy roommates or landlords.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of Benefits section -->


<!-- Services Section -->
<section class="section bg-light" id="services">
    <div class="container text-center">
        <h6 class="section-title mb-5">Services</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="card-container text-center">
                    <div class="icon-wrapper mb-4">
                        <img src="{{ asset('assets/imgs/department.jpg') }}" class="img-fluid service-icon" alt="Accommodation Icon">
                    </div>
                    <h6 class="title mb-3">Find Accommodation</h6>
                    <p class="subtitle">Browse through listings to find the perfect place to stay.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-container text-center">
                    <div class="icon-wrapper mb-4">
                        <img src="{{ asset('assets/imgs/partner.png') }}" class="img-fluid service-icon" alt="Roommate Icon">
                    </div>
                    <h6 class="title mb-3">Find Roommates</h6>
                    <p class="subtitle">Connect with potential roommates to share a place.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of Services section -->



<!-- Latest Ads Section -->
<section class="section" id="latest-ads">
    <div class="container text-center">
        <h6 class="section-title mb-5">Latest Ads</h6>
        <div class="row justify-content-center">
            @foreach ($ads as $ad)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card-container">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            @php
                            $firstImage = $ad->firstImage();
                            @endphp
                            @if ($firstImage)
                                @php
                                $imageUrl = asset($firstImage->image_path);
                                @endphp
                                <a data-fancybox="gallery-{{ $ad->id }}" href="{{ $imageUrl }}">
                                    <img src="{{ $imageUrl }}" class="card-img-top" alt="Ad Image">
                                </a>
                            @else
                                @php
                                $defaultImageUrl = asset('ads_images/default-image.png');
                                @endphp
                                <a data-fancybox="gallery-{{ $ad->id }}" href="{{ $defaultImageUrl }}">
                                    <img src="{{ $defaultImageUrl }}" class="card-img-top" alt="Default Image">
                                </a>
                            @endif
                            <div class="info-block">
                                <p class="card-text"><label class="custom-label">Budget:</label> <span>${{ $ad->budget }}</span></p>
                                <p class="card-text"><label class="custom-label">Ad Type:</label> <span>{{ $ad->ad_type }}</span></p>
                                <p class="card-text"><label class="custom-label">Residence Type:</label> <span>{{ $ad->residence_type }}</span></p>
                                <p class="card-text">
                                    <label class="custom-label">Posted by:</label>
                                    <a href="{{ route('users.viewprofile', $ad->user->id) }}" class="text-primary">
                                        {{ $ad->user->first_name }} {{ $ad->user->last_name }}
                                    </a>
                                </p>
                                <p class="card-text"><label class="custom-label">Availability Date:</label>
                                    {{ $ad->availability_date ? Carbon::parse($ad->availability_date)->format('Y-m-d') : 'Not available' }}
                                </p>
                            </div>

                            <!-- View Details Button -->
                            <a href="{{ route('ads.viewdetails', $ad->id) }}" class="btn-view-details" style="background-color: #695aa6; border-color: #695aa6;">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Button to create a new ad -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('ads.create') }}" class="btn btn-primary">Create New Ad</a>
        </div>
    </div>
</section><!-- end of latest-ads section -->

<!-- Contact Section -->
<section class="section bg-light" id="contact">
    <div class="container text-center">
        <p class="section-subtitle">Want to find a place or a roommate?</p>
        <h6 class="section-title mb-6">Contact Us</h6>
        <div class="row">
            <div class="col-md-8 mx-auto text-left">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" placeholder="Your Message" rows="4" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded w-lg">Send</button>
                </form>
            </div>
        </div>
    </div>
</section><!-- end of Contact section -->



<script>
    Fancybox.bind("[data-fancybox^='gallery']", {});
  </script>
@stop

