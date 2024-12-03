<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .dashboard-container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #007BFF;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background: #fff;
            overflow-y: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
        }
        .profile-card {
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card h3 {
            margin-bottom: 10px;
        }
        .profile-card p {
            margin-bottom: 5px;
        }
        .btn-edit {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>My Dashboard</h2>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Welcome,
                    @if (session('email'))
                    {{session('email')}}
                    @else
                    No user
                    @endif

                </h1>
                <a href="#edit" class="btn-edit">Edit Profile</a>
            </div>

            <!-- Profile Section -->
            <div id="profile" class="profile-card">
                <h3>Profile Information</h3>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Email:</strong> john.doe@example.com</p>
                <p><strong>Phone:</strong> +1234567890</p>
                <p><strong>Address:</strong> 123 Main St, City, Country</p>
            </div>
        </div>
    </div>
</body>
</html>
