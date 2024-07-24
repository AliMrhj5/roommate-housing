@extends('layouts.app')

@section('content')
<head>
    <title>Edit Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .btn-primary{
            background-color: #695aa6;
            border-color: #695aa6;
        }
        a {
            color: #08457E;
        }
         body {
            background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
            padding-top: 60px;
        }
        .container.form-container {
          background-color: #f9f9f9;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          margin: auto;
          margin-top: 20px;
          max-width: 600px;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
        }
        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        @media (max-width: 768px) {
            .container.form-container {
                margin-top: 90px;
            }
            .form-container {
                padding: 20px;
            }
        }
        .avatar-wrapper {
         position: relative;
         height: 200px;
         width: 200px;
         margin: 20px auto;
         border-radius: 50%;
         overflow: hidden;
         box-shadow: 1px 1px 15px -5px black;
         transition: all 0.3s ease;
        }
        .avatar-wrapper:hover {
        transform: scale(1.05);
        cursor: pointer;
        }
        .avatar-wrapper:hover .profile-pic {
        opacity: 0.5;
        }
        .avatar-wrapper .profile-pic {
        height: 100%;
        width: 100%;
        transition: all 0.3s ease;
        }
        .avatar-wrapper .profile-pic:after {
         font-family: FontAwesome;
         content: "";
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         position: absolute;
         font-size: 190px;
         background: #ecf0f1;
         color: #34495e;
         text-align: center;
         }
        .avatar-wrapper .upload-button {
         position: absolute;
         top: 0;
         left: 0;
          height: 100%;
          width: 100%;
          }
        .avatar-wrapper .upload-button .fa-arrow-circle-up {
         position: absolute;
           font-size: 234px;
          top: -17px;
          left: 0;
          text-align: center;
          opacity: 0;
         transition: all 0.3s ease;
          color: #34495e;
         }
         .avatar-wrapper .upload-button:hover .fa-arrow-circle-up {
          opacity: 0.9;
         }
         .form-group label {
         font-weight: bold;  /* يجعل النص غامق */
         font-size: 1.1rem;  /* يجعل النص عريض قليلاً */
         color: #695aa6
        }

    </style>
</head>

<div class="container form-container">
    <div class="form-header">
        <h2>Edit Profile</h2>
    </div>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="avatar-wrapper">
            @if(auth()->user()->profile_picture)
                <img class="profile-pic" src="{{ asset( auth()->user()->profile_picture) }}" />
            @else
                <img class="profile-pic" src="{{ asset('storage/profile_pictures/default.jpg') }}" />
            @endif
            <div class="upload-button">
                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
            </div>
            <input class="file-upload" type="file" name="profile_picture" accept="image/*"/>
            @error('profile_picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
        </div>

        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $user->nationality }}">
        </div>

        <div class="form-group">
            <label for="country_id">Country:</label>
            <select class="form-control" id="country_id" name="country_id" required>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">City:</label>
            <select class="form-control" id="city_id" name="city_id" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="account_type">Account Type:</label>
            <select class="form-control" id="account_type" name="account_type" required>
                <option value="Search for Residence" {{ $user->account_type == 'Search for Residence' ? 'selected' : '' }}>Search for Residence</option>
                <option value="Search for Roommate" {{ $user->account_type == 'Search for Roommate' ? 'selected' : '' }}>Search for Roommate</option>
            </select>
        </div>

        <div class="form-group">
            <label for="job">Job:</label>
            <input type="text" class="form-control" id="job" name="job" value="{{ $user->job }}">
        </div>

        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" id="marital_status" name="marital_status">
                <option value="single" {{ $user->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ $user->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ $user->marital_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ $user->marital_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-custom btn-block" style="background-color: #695aa6;border-color: #695aa6;">Update</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
@stop

