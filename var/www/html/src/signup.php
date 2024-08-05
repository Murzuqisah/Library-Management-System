<?php 
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "library-system";

// Create a database connection

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($input) {
    global $conn;
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = $conn->real_escape_string($input);
    return $input;
}

// Function to validate and sanitize user input
function validateInput($input) {
    // Perform input validation here
    // Example: check if input meets certain criteria
    // Return true if input is valid, false otherwise
}

// Function to create a new user
function createUser($username, $password, $email) {
    global $conn;
    $username = sanitizeInput($username);
    $password = sanitizeInput($password);
    $email = sanitizeInput($email);

    // Perform additional validation if needed
    if (!validateInput($username) || !validateInput($password) || !validateInput($email)) {
        return false;
    }

    // Create a new user in the database
    // Example: insert user details into users table

    // Return true if user creation is successful, false otherwise
}

// Close the database connection
$conn->close();

    include('inc/header4.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>The Archives Library</title>
    <!-- Add the viewport meta tag for responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <!-- Link to Bootstrap Theme CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
    <!-- Link to Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <!-- Link to PureCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/purecss@3.0.0/build/base-min.css,npm/purecss@3.0.0/build/grids-min.css,npm/purecss@3.0.0/build/forms-min.css">
    <!-- Your custom stylesheet -->
    <link rel="stylesheet" href="css/styles.css">

</head>

<body> 

	<header>
		<h2 class="logo">The Archives Library</h2>
		<nav class="navigation">

			<a href="dashboard.php">Home</a>
			<a href="about.php">About</a>
			<a href="welcome.php">Services</a>
			<a href="contacts.php">Contact</a>
			<button class="btnLogin-popup" href="index.php">Login</button>
		</nav>
	</header><br></br>
	<div class="container-fluid">
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
		
		<div class="wrapper">

			<div class="form-box login">
				<h2>Signup</h2>
				<form action="/login_check.php" method="POST" class="login_form">	
					<div class="input-box">
						<span class="icon">
							<ion-icon name="person"></ion-icon>
						</span>
						<input type="text" name="first_name">
						<label class="label">First Name</label>
					</div>
					<div class="input-box">
						<span class="icon">
							<ion-icon name="person"></ion-icon>
						</span>
						<input type="text" name="last_name">
						<label class="label">Last Name</label>
					</div>
					<div class="input-box">
						<span class="icon">
							<ion-icon name="mail"></ion-icon>
						</span>
						<input type="text" name="Email">
						<label class="label">Email</label>
					</div>
					<div class="input-box">
						<span class="icon"><ion-icon name="lock"></ion-icon>
						</span>
						<input type="password" name="password">
						<label class="label">Password</label>
					</div>
					<div class="input-box">
						<span class="icon"><ion-icon name="lock"></ion-icon>
						</span>
						<input type="password" name="confirm-password"> 
						
						<label class="label">Re-type Password</label>
					</div>
					<div class="terms-conditions">
						<label><input type="checkbox">I accept the terms and conditions</label>
					</div>
					<div>
						<button type="submit" class="btn" name="submit" value="Signup">Signup</button>
					</div>
					<div class="login-register">
						<p>Already a member? <a href="index.php" class="login-link">Login</a></p>
				</div>
			</form>
		</div>
	</div>

	<script src="script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
