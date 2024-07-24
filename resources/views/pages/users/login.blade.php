<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form | CodingLab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">

    <style>
        /* Additional or modified styles can be added here */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: linear-gradient(to top, #71b7e6 0%, rgba(105, 90, 166, 0.35) 99%, rgba(105, 90, 166, 0.5) 100%);
            height: 100vh;
        }
        .container {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            margin-bottom: 20px;
        }
        .container .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        .content form .user-details {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }
        form .user-details .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 0px 20px;
            background-color: transparent; /* خلفية شفافة */
            position: absolute; /* لتثبيت الشعار في أعلى يسار الصفحة */
            top: 0;
            left: 0;
        }
        .header .logo {
            max-width: 77px;
            height: auto;
        }
        .container {
            margin-top: 60px; /* ترك مساحة أعلى الصفحة للهيدر */
        }
        .error-message {
            color: red;
            font-size: 0.8em;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
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

            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $errors->first('email') }}
            </div>
        @endif
        @if ($errors->has('password'))
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $errors->first('password') }}
            </div>
        @endif

        <div class="title">Login</div>
        <div class="content">
            <form method="POST" action="{{ route('login') }}" class="login-form" id="login-form">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-email"></i> Email</span>
                        <input type="email" placeholder="Enter Your Email" name="email" id="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details"><i class="mdi mdi-lock"></i> Password</span>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Login">
                    <a href="{{ route('register') }}">Create Account</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
