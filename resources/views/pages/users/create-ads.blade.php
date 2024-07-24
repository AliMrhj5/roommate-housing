@extends('layouts.app')

<style>
    body {
        background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
    }

    .container1 {
        max-width: 450px; /* Adjust the width as per your design */
        margin: auto; /* Center the container horizontally */
        margin-top: 70px;
        padding: 20px;
        background-color: #f8f9fa; /* Light gray background */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .card {
        border: none; /* Remove card border */
    }

    .card-body {
        padding: 30px; /* Increase padding for better spacing */
    }

    .form-group {
        margin-bottom: 20px; /* Space between form groups */
    }

    .btn-primary {
        width: 100%; /* Full width button */
    }

    .section-title {
        font-size: 1.25rem;
        margin-bottom: 15px;
        border-bottom: 2px solid #9b59b6;
        padding-bottom: 5px;
    }
    .uploaded_file_view {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }
    .uploaded_img {
        position: relative;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
    }
    .uploaded_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .file_remove {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #aaa;
        color: #fff;
        font-size: 16px;
        line-height: 24px;
        text-align: center;
        cursor: pointer;
    }
    .file_remove:hover {
        background: #222;
    }
</style>

@section('content')

<div class="container1">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Create a New Ad</h1>

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- General Information -->
                <h2 class="section-title">General Information</h2>

                <!-- Title Field -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <!-- Budget Field -->
                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input type="number" name="budget" id="budget" class="form-control" step="0.01" required>
                </div>

                <!-- Ad Type Field -->
                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <select name="ad_type" id="ad_type" class="form-control" required>
                        @foreach ($ad_type as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Residence Type Field -->
                <div class="form-group">
                    <label for="residence_type">Residence Type</label>
                    <select name="residence_type" id="residence_type" class="form-control" required>
                        @foreach ($residence_type as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Availability Date Field -->
                <div class="form-group">
                    <label for="availability_date">Availability Date</label>
                    <input type="date" name="availability_date" id="availability_date" class="form-control" required>
                </div>

                <!-- Contact Phone Field -->
                <div class="form-group">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" name="contact_phone" id="contact_phone" class="form-control" maxlength="15" required>
                </div>

                <!-- Partner Gender Field -->
                <div class="form-group">
                    <label for="partner_gender">Partner Gender</label>
                    <select name="partner_gender" id="partner_gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Country Field -->
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country_id" id="country" class="form-control" required onchange="fetchCities()">
                        <option value="">Select</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ (old('country_id', auth()->user()->country_id) == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City Field -->
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city_id" id="city" class="form-control" required>
                        <option value="disabled selected">Select</option>

                    </select>
                </div>

                <!-- Detailed Information -->
                <h2 class="section-title">Detailed Information</h2>

                <!-- Room Size Field -->
                <div class="form-group">
                    <label for="room_size">Room Size (optional)</label>
                    <input type="number" name="room_size" id="room_size" class="form-control" min="0">
                </div>

                <!-- Number of Rooms Field -->
                <div class="form-group">
                    <label for="number_of_rooms">Number of Rooms (optional)</label>
                    <input type="number" name="number_of_rooms" id="number_of_rooms" class="form-control" min="0">
                </div>

                <!-- Number of Bathrooms Field -->
                <div class="form-group">
                    <label for="number_of_bathrooms">Number of Bathrooms (optional)</label>
                    <input type="number" name="number_of_bathrooms" id="number_of_bathrooms" class="form-control" min="0">
                </div>

                <!-- Furnished Field -->
                <div class="form-group">
                    <label for="furnished">Furnished (optional)</label>
                    <select name="furnished" id="furnished" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Smoking Allowed Field -->
                <div class="form-group">
                    <label for="smoking_allowed">Smoking Allowed (optional)</label>
                    <select name="smoking_allowed" id="smoking_allowed" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Pets Allowed Field -->
                <div class="form-group">
                    <label for="pets_allowed">Pets Allowed (optional)</label>
                    <select name="pets_allowed" id="pets_allowed" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Location Description Field -->
                <div class="form-group">
                    <label for="location_description">Location Description (optional)</label>
                    <input type="text" name="location_description" id="location_description" class="form-control">
                </div>

                <!-- Preferences Field -->
                <div class="form-group">
                    <label for="preferences">Preferences (optional)</label>
                    <textarea name="preferences" id="preferences" class="form-control" rows="3"></textarea>
                </div>

                <!-- Contact Email Field -->
                <div class="form-group">
                    <label for="contact_email">Contact Email (optional)</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control">
                </div>

                <!-- Notes Field -->
                <div class="form-group">
                    <label for="notes">Notes (optional)</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                </div>

                <!-- Partner Age Min Field -->
                <div class="form-group">
                    <label for="partner_age_min">Partner Age Min (optional)</label>
                    <input type="number" name="partner_age_min" id="partner_age_min" class="form-control" min="0">
                </div>

                <!-- Partner Age Max Field -->
                <div class="form-group">
                    <label for="partner_age_max">Partner Age Max (optional)</label>
                    <input type="number" name="partner_age_max" id="partner_age_max" class="form-control" min="0">
                </div>
                @if(auth()->user()->account_type == 'Search for Roommate')
                            <div class="form-group">
                                <label for="images">{{ __('Images') }}</label>
                                <input type="file" id="upload_file" name="images[]" multiple accept="image/*">
                                <div class="uploaded_file_view" id="uploaded_view">
                                    <!-- Existing images preview here -->
                                </div>
                            </div>
                            @endif
                <!-- Create Ad Button -->
                <button type="submit" class="btn btn-primary">Create Ad</button>
            </form>

        </div>
    </div>
</div>
<!-- Modal for image preview -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">{{ __('Image Preview') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
            </div>
        </div>
    </div>
</div>

<script>

    function fetchCities() {
        var country_id = document.getElementById('country').value;
        var citySelect = document.getElementById('city');

        // Clear previous options
        citySelect.innerHTML = '<option value="" disabled selected>{{ __('Loading cities...') }}</option>';

        // Fetch cities for the selected country
        fetch(`/cities/${country_id}`)
            .then(response => response.json())
            .then(data => {
                citySelect.innerHTML = '<option value="" disabled selected>{{ __('Select your City') }}</option>';
                data.forEach(city => {
                    var option = document.createElement('option');
                    option.value = city.id;
                    option.text = city.name;
                    option.selected = city.id == {{ old('city_id', auth()->user()->city_id) }}; // Set default city
                    citySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching cities:', error);
            });
    }

    // Load cities for the default country when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        fetchCities();
    });


    document.getElementById('upload_file').addEventListener('change', function() {
    var files = this.files;
    var previewContainer = document.getElementById('uploaded_view');

    // Clear the existing previews
    previewContainer.innerHTML = '';

    Array.from(files).forEach(file => {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgElement = document.createElement('div');
            imgElement.className = 'uploaded_img';
            imgElement.innerHTML = `
                <img src="${event.target.result}" alt="Uploaded Image" onclick="showImage('${event.target.result}')">
                <span class="file_remove" onclick="removeImage(this)">&times;</span>
            `;
            previewContainer.appendChild(imgElement);
        }
        reader.readAsDataURL(file);
    });
});

    function removeImage(element) {
        element.parentElement.remove();
    }

    function showImage(src) {
        var modalImage = document.getElementById('modalImage');
        modalImage.src = src;
        $('#imageModal').modal('show');
    }
</script>
@endsection

