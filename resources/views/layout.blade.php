<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Student Management</title>
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #1e3a56;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            display: block;
            color: #ffffff;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #2e5d87;
            color: white;
            border-left: 5px solid #f4b400;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .navbar {
            background-color: #1e3a56 !important;
        }
        .navbar-brand {
            color: white !important;
            font-size: 24px;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #2e5d87;
            color: white;
        }
        .btn-custom:hover {
            background-color: #1e3a56;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management</a>
        </div>
    </nav>
    
    <div class="sidebar">
        <a class="active" href="#home">Home</a>
        <a href="{{ url('/students') }}">Students</a>
        <a href="{{ url('/teachers') }}">Teachers</a>
        <a href="{{ url('/courses') }}">Courses</a>
        <a href="{{ url('/batches') }}">Batches</a>
        <a href="{{ url('/enrollments') }}">Enrollment</a>
        {{-- <a href="{{ url('/payments') }}">Payments</a> --}}
        <hr>
        <a href="#settings">Settings</a>
        <a href="#logout">Logout</a>
    </div>
    
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
