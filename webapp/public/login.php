<?php 
session_start();

require_once 'db.php'; 

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Trim any leading or trailing spaces from the username and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare an SQL query to check if the username exists in the database
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    
    // Bind the username to the prepared statement
    $stmt->bind_param("s", $username);
    
    // Execute the query
    $stmt->execute();
    
    // Store the result to check how many rows are returned
    $stmt->store_result();

    // Check if a user with the provided username was found
    if ($stmt->num_rows > 0) {
        // Bind the result to variables
        $stmt->bind_result($id, $hashed_password);
        
        // Fetch the result (only one user since usernames are unique)
        $stmt->fetch();

        // Verify if the provided password matches the hashed password from the database
        if (password_verify($password, $hashed_password)) {
            // If password is correct, set session variables
            $_SESSION['Active'] = true;
            $_SESSION['Username'] = $username;

            // Redirect the user to the home page (index.php)
            header("Location: index.php"); 
            exit();  // Exit to prevent further code execution
        } else {
            // If the password is incorrect, display an error message
            echo "Invalid password.";
        }
    } else {
        // If no user was found with the given username, display an error message
        echo "User not found.";
    }

    // Close the prepared statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<?php require_once '../template/header.php';?>
    <title>Login</title>
</head>
<body>


<h2>Login</h2>

<!-- The login form -->
<form method="post">
    <label>Username:</label>
    <input type="text" name="username" required>  
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>  
    <br>
    <button type="submit">Login</button>  
</form>


<?php require_once '../template/footer.php';?>
