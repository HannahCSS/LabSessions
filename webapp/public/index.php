<?php 
session_start();

// Check if the session is active (user is logged in). If not, redirect to login page.
if(!isset($_SESSION['Active']) || $_SESSION['Active'] == false) {
    // Redirect the user to the login page if they are not logged in
    header("location: login.php");
    exit; 
}
?>

<?php require_once '../template/header.php';?>
<title>Home page</title>
</head>

<body>

<h1>Status: You are logged in <?php echo $_SESSION['Username']; ?> </h1>


<div class="container">
  
  
  <div class="header clearfix">
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li> 
        <li><a href="about.php">About</a></li> 
        <li><a href="contacts.php">Contact</a></li>
      </ul>
    </nav>
  
    <h3 class="text-muted">PHP Login exercise - Home page</h3>
  </div>

  
  <div class="mainarea">
    <h1>Title </h1>  
    <p class="lead">This is where we will put the logout button</p>  

   
    <form action="logout.php" method="post">
      
      <button name="Submit" type="submit">Log out</button>
    </form>

  </div>

  
  <div class="row marketing">
    <div>
      <h4>Home page</h4>
      
      <p>Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. </p>
    </div>
  </div>

</div>


<?php require_once '../template/footer.php';?>
