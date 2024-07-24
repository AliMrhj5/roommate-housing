<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Registration Form | CodingLab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <style>
        .header {
            display: flex;
            align-items: center;
            padding: 0px 20px;
            position: absolute; /* لتثبيت الشعار في أعلى يسار الصفحة */
            top: 0;
            left: 0;
        }
        .header .logo {
            max-width: 77px;
            height: auto;
        }
        body {
            background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
        }

        .container {
            margin-top: 60px; /* ترك مساحة أعلى الصفحة للهيدر */
        }
        .error-message {
            color: red;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="logo">
        </a>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="title">Registration</div>
        <div class="content">
            <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-account"></i> First Name</span>
                        <input type="text" name="first_name" id="first_name" required>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-account"></i> Last Name</span>
                        <input type="text" name="last_name" id="last_name" required>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-email"></i> Email</span>
                        <input type="email" name="email" id="email" required>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-lock"></i> Password</span>
                        <input type="password" name="password" id="password" required>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-phone"></i> Phone Number</span>
                        <input type="text" name="phone_number" id="phone_number" required>
                        @error('phone_number')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-flag"></i> Nationality</span>
                        <input type="text" name="nationality" id="nationality" required>
                        @error('nationality')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-briefcase"></i> Job</span>
                        <input type="text" name="job" id="job" required>
                        @error('job')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-calendar"></i> Birthday</span>
                        <input type="date" name="birthday" id="birthday" required>
                        @error('birthday')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-earth"></i> Country</span>
                        <select name="country_id" id="country" onchange="fetchCities()" required>
                            <option value="" disabled selected>Select your country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-city"></i> City</span>
                        <select name="city_id" id="city" required>
                            <option value="" disabled selected>Select your City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-account-box"></i> Account Type</span>
                        <select class="form-control" id="account_type" name="account_type" required>
                            <option value="Search for Residence" {{ old('account_type') == 'Search for Residence' ? 'selected' : '' }}>Search for Residence</option>
                            <option value="Search for Roommate" {{ old('account_type') == 'Search for Roommate' ? 'selected' : '' }}>Search for Roommate</option>
                        </select>
                        @error('account_type')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-heart"></i> Marital Status</span>
                        <select name="marital_status" id="marital_status" required>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        @error('marital_status')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="Male" required>
                        <input type="radio" name="gender" id="dot-2" value="Female" required>
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                        @error('gender')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="button">
                    <input type="submit" value="Register">
                    <input type="reset" value="Reset">
                </div>
                <div class="category">
                    <a href="{{ route('login') }}">Do you have account ?</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function fetchCities() {
            var country_id = document.getElementById('country').value;
            var citySelect = document.getElementById('city');

            // Clear previous options
            citySelect.innerHTML = '<option value="" disabled selected>Loading cities...</option>';

            // Fetch cities for the selected country
            fetch(`/cities/${country_id}`)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = `<option value="" disabled selected>Select your City</option>`;
                    data.forEach(city => {
                        citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Error fetching cities:', error);
                    citySelect.innerHTML = `<option value="" disabled selected>Error loading cities</option>`;
                });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
