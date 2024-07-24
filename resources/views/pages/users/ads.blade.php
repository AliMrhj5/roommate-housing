@php use Illuminate\Support\Carbon; @endphp
@extends('layouts.app')

@section('content')
<!-- إضافة أكواد CSS و JavaScript لمكتبة Fancybox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

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
        font-family: 'Open Sans', sans-serif;
    }
    .info-block a {
        color: rgb(216, 213, 228); /* لون الرابط */
        text-decoration: none; /* إزالة الخط السفلي */
    }
    .info-block a:hover {
        text-decoration: underline; /* إضافة خط سفلي عند التمرير */
    }
body {
    background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
    padding-top: 60px;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
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
.card-title {
    margin-bottom: 15px; /* Space between title and content */
    font-size: 1.5rem; /* Larger font size for the title */
}

.card-text {
    margin-bottom: 10px; /* Space between text elements */
    font-family: 'Open Sans', sans-serif;
}
.card-text strong {
        font-weight: bold;
        font-family: 'Roboto', sans-serif;
    }

.card-text:last-child {
    margin-bottom: 0; /* Remove bottom margin from last text element */
}


.section-title {
    font-family: 'Roboto', sans-serif;
    font-size: 1.25rem;
    margin-bottom: 15px;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
}

.card-img-top {
    width: 100%;
    height: 150px; /* يمكنك تعديل الارتفاع حسب الحاجة */
    object-fit: cover; /* لجعل الصورة تتناسب داخل الإطار مع الحفاظ على نسبة العرض إلى الارتفاع */
    border-radius: 8px; /* لتطابق الزوايا المستديرة للبطاقة */
}

.btn-view-details {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        background-color: #695aa6;
        border-color: #695aa6;
    }

    .btn-view-details:hover {
        background-color: #574a8a;
    }

    @media (max-width: 768px) {
        .card-container {
            margin-bottom: 20px;
        }
    }

.custom-label {
    font-weight: bold; /* جعل النص غامقاً */
    font-size: 1.1rem; /* حجم أكبر للنص */

}
</style>

<div class="container mt-5">
    <h1 class="mb-4 text-center text-white">Available Ads</h1>
    <div class="row justify-content-center">
        @foreach ($ads as $ad)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card-container">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>

                        <!-- General Information -->
                        <h2 class="section-title">General Information</h2>
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

                            <!-- View Details Button -->
                            <a href="{{ route('ads.viewdetails', $ad->id) }}" class="btn-view-details" style="background-color: #695aa6;border-color: #695aa6;">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    <!-- Button to create a new ad -->
    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('ads.create') }}" class="btn btn-primary">Create New Ad</a>
    </div>
</div>

<!-- تفعيل Fancybox -->
<script>
  Fancybox.bind("[data-fancybox^='gallery']", {});
</script>
@endsection
