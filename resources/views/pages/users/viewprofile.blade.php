@extends('layouts.app')

@section('content')
<head>
    <title>View Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .btn-primary{
            background-color: #695aa6;
            border-color: #695aa6;
        }
        body {
            background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
            padding-top: 60px;
        }
        .profile-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 20px;
            max-width: 800px;
        }
        .profile-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .avatar-wrapper {
            position: relative;
            height: 150px;
            width: 150px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .avatar-wrapper img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control-plaintext {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
        }
        .form-control-plaintext label {
            font-weight: bold;
        }
        .form-group label {
            font-weight: bold;  /* يجعل النص غامق */
            font-size: 1.1rem;  /* يجعل النص عريض قليلاً */
            color: #695aa6
        }
        a {
            color: #08457E
        }
    </style>
</head>

<div class="profile-container">
    <div class="profile-header">
        <h2>View Profile</h2>
    </div>

    <div class="avatar-wrapper" data-toggle="modal" data-target="#profilePictureModal">
        @if($user->profile_picture)
            <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" />
        @else
            <img src="{{ asset('storage/profile_pictures/default.jpg') }}" alt="Default Profile Picture" />
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilePictureModalLabel">Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if($user->profile_picture)
                        <img src="{{ asset($user->profile_picture) }}" class="img-fluid" alt="Profile Picture" />
                    @else
                        <img src="{{ asset('storage/profile_pictures/default.jpg') }}" class="img-fluid" alt="Default Profile Picture" />
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="first_name">First Name:</label>
        <p class="form-control-plaintext" id="first_name">{{ $user->first_name }}</p>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <p class="form-control-plaintext" id="last_name">{{ $user->last_name }}</p>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <p class="form-control-plaintext" id="email">{{ $user->email }}</p>
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <p class="form-control-plaintext" id="phone_number">{{ $user->phone_number }}</p>
    </div>

    <div class="form-group">
        <label for="birthday">Birthday:</label>
        <p class="form-control-plaintext" id="birthday">{{ $user->birthday }}</p>
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <p class="form-control-plaintext" id="gender">{{ $user->gender }}</p>
    </div>

    <div class="form-group">
        <label for="nationality">Nationality:</label>
        <p class="form-control-plaintext" id="nationality">{{ $user->nationality }}</p>
    </div>

    <div class="form-group">
        <label for="country_id">Country:</label>
        <p class="form-control-plaintext" id="country_id">{{ $user->country->name }}</p>
    </div>

    <div class="form-group">
        <label for="city_id">City:</label>
        <p class="form-control-plaintext" id="city_id">{{ $user->city->name }}</p>
    </div>

    <div class="form-group">
        <label for="account_type">Account Type:</label>
        <p class="form-control-plaintext" id="account_type">{{ $user->account_type }}</p>
    </div>

    <div class="form-group">
        <label for="job">Job:</label>
        <p class="form-control-plaintext" id="job">{{ $user->job }}</p>
    </div>

    <div class="form-group">
        <label for="marital_status">Marital Status:</label>
        <p class="form-control-plaintext" id="marital_status">{{ $user->marital_status }}</p>
    </div>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop
