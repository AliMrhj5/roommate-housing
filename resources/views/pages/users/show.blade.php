<!-- resources/views/users/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    <p>First Name: {{ $user->first_name }}</p>
    <p>Last Name: {{ $user->last_name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Phone Number: {{ $user->phone_number }}</p>
    <p>Birthday: {{ $user->birthday }}</p>
    <p>Gender: {{ $user->gender }}</p>
    <p>Nationality: {{ $user->nationality }}</p>
    <p>Country: {{ $user->country->name }}</p>
    <p>City: {{ $user->city->name }}</p>
    <p>Account Type: {{ $user->accountType->name }}</p>
    <p>Job: {{ $user->job }}</p>
    <p>Marital Status: {{ $user->marital_status }}</p>
</body>
</html>
