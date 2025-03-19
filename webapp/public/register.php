<?php 
// Include the register.php file (this could be for any reusable header or elements)
include 'register.php';

// Start a session to manage user data during the registration process
session_start();

// Include the database connection file
require_once 'db.php'; 

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize the username and password from the form input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if both username and password fields are not empty
    if (!empty($username) && !empty($password)) {
        
        // Hash the password using the PASSWORD_DEFAULT algorithm
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert the new user's data into the 'users' table
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        
        // Bind the username and hashed password to the prepared statement
        $stmt->bind_param("ss", $username, $hashed_password);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            // If registration is successful, display a success message with a link to login page
            echo "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            // If the username already exists in the database, display an error message
            echo "Error: Username already exists.";
        }

        // Close the prepared statement after execution
        $stmt->close();
    } else {
        // If either the username or password is empty, show an error message
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php require_once '../template/header.php';?>
    <title>Register</title>
</head>
<body>


<h2>Register</h2>
<form method="post">
    
    <label>Username:</label>
    <input type="text" name="username" required>
    <br>
    
   
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    
    
    <button type="submit">Register</button>
</form>


<?php require_once '../template/footer.php';?>
