@php use Illuminate\Support\Carbon; @endphp
@extends('layouts.app')

@section('content')
<!-- إضافة أكواد CSS و JavaScript لمكتبة Fancybox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
    padding-top: 60px;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100vh;
}

.card-container {
    max-width: 600px;
    margin: auto;
    margin-top: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.card-title {
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.card-text {
    margin-bottom: 10px;
    font-family: 'Open Sans', sans-serif;
}
.card-text strong {
    font-weight: bold;
    font-family: 'Roboto', sans-serif;
}

.card-text:last-child {
    margin-bottom: 0;
}

.section-title {
    font-size: 1.25rem;
    margin-bottom: 15px;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
}

.card-img-top {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.gallery img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.gallery-item {
    flex: 1 1 calc(50% - 10px);
    margin-bottom: 10px;
}
</style>

<div class="container mt-5">
    <div class="card-container">
        <div class="card-body">
            <h1 class="card-title">{{ $ad->title }}</h1>

            <!-- عرض الصور المرفقة -->
            <div class="gallery">
                @foreach($ad->images as $image)
                <div class="gallery-item">
                    <a data-fancybox="gallery" href="{{ asset($image->image_path) }}">
                        <img src="{{ asset($image->image_path) }}" alt="Ad Image">
                    </a>
                </div>
                @endforeach
            </div>

            <h2 class="section-title">General Information</h2>
            <p class="card-text"><strong>Budget:</strong> <span>${{ $ad->budget }}</span></p>
            <p class="card-text"><strong>Ad Type:</strong> <span>{{ $ad->ad_type }}</span></p>
            <p class="card-text"><strong>Residence Type:</strong> <span>{{ $ad->residence_type }}</span></p>
            <p class="card-text">
                <strong>Posted by:</strong>
                <a href="{{ route('users.viewprofile', $ad->user->id) }}">
                    {{ $ad->user->first_name }} {{ $ad->user->last_name }}
                </a>
            </p>
            <p class="card-text"><strong>Availability Date:</strong>
                {{ $ad->availability_date ? Carbon::parse($ad->availability_date)->format('Y-m-d') : 'Not available' }}
            </p>
            <p class="card-text"><strong>Country:</strong> {{ $ad->country->name }}</p>
            <p class="card-text"><strong>City:</strong> {{ $ad->city->name }}</p>
            <p class="card-text"><strong>Contact Phone:</strong> {{ $ad->contact_phone }}</p>

            <h2 class="section-title">Detailed Information</h2>
            @if($ad->partner_gender)
            <p class="card-text"><strong>Partner Gender:</strong> {{ ucfirst($ad->partner_gender) }}</p>
            @endif

            @if($ad->room_size)
            <p class="card-text"><strong>Room Size:</strong> {{ $ad->room_size ?? 'Not specified' }}</p>
            @endif

            @if($ad->number_of_rooms)
            <p class="card-text"><strong>Number of Rooms:</strong> {{ $ad->number_of_rooms ?? 'Not specified' }}</p>
            @endif

            @if($ad->number_of_bathrooms)
            <p class="card-text"><strong>Number of Bathrooms:</strong> {{ $ad->number_of_bathrooms ?? 'Not specified' }}</p>
            @endif

            @if($ad->furnished !== null)
            <p class="card-text"><strong>Furnished:</strong> {{ $ad->furnished ? 'Yes' : 'No' }}</p>
            @endif

            @if($ad->smoking_allowed !== null)
            <p class="card-text"><strong>Smoking Allowed:</strong> {{ $ad->smoking_allowed ? 'Yes' : 'No' }}</p>
            @endif

            @if($ad->pets_allowed !== null)
            <p class="card-text"><strong>Pets Allowed:</strong> {{ $ad->pets_allowed ? 'Yes' : 'No' }}</p>
            @endif

            @if($ad->location_description)
            <p class="card-text"><strong>Location Description:</strong> {{ $ad->location_description ?? 'Not specified' }}</p>
            @endif

            @if($ad->preferences)
            <p class="card-text"><strong>Preferences:</strong> {{ $ad->preferences ?? 'Not specified' }}</p>
            @endif

            @if($ad->contact_email)
            <p class="card-text"><strong>Contact Email:</strong> {{ $ad->contact_email ?? 'Not specified' }}</p>
            @endif

            @if($ad->partner_age_min)
            <p class="card-text"><strong>Partner Age Min:</strong> {{ $ad->partner_age_min ?? 'Not specified' }}</p>
            @endif

            @if($ad->partner_age_max)
            <p class="card-text"><strong>Partner Age Max:</strong> {{ $ad->partner_age_max ?? 'Not specified' }}</p>
            @endif

            @if($ad->notes)
            <p class="card-text"><strong>Notes:</strong> {{ $ad->notes ?? 'Not specified' }}</p>
            @endif
        </div>
    </div>
</div>

<!-- تفعيل Fancybox -->
<script>
  Fancybox.bind("[data-fancybox='gallery']", {});
</script>
@endsection
