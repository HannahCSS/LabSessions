<?php
class Session
{
    // Method to kill the session and log out the user
    public function killSession()
    {
        // Clear all session data by setting $_SESSION to an empty array
        $_SESSION = [];

        // Check if the session uses cookies
        if (ini_get("session.use_cookies")) {
            // Get the session cookie parameters (path, domain, etc.)
            $params = session_get_cookie_params();

            // Set the session cookie with an expiration time in the past to remove it
            setcookie(
                session_name(),           
                '',                        
                time() - 42000,            
                $params["path"],          
                $params["domain"],        
                $params["secure"],        
                $params["httponly"]       
            );
        }

        // Destroy the session on the server
        session_destroy();
    }

    // Method to forget the session and redirect the user to the login page
    public function forgetSession()
    {
        // Call the killSession() method to clear session data and destroy the session
        $this->killSession();

        // Redirect the user to the login page (login.php)
        header("location:login.php");

        // Exit the script to ensure no further code is executed after the redirect
        exit;
    }
}
?>

