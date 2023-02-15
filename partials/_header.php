<?php
include('\style.css');
include('\index.js');
session_start();
echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/eForum">eDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/eForum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
        </li>
        
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
    </div>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $email = $_SESSION['useremail'];
  $username = strstr($email,'@',true);
  echo '<form class="d-flex mx-2" role="search" method="get" action = "search.php">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
      <p class="text-light my-0 mx-4">Welcome ' . $username . '</p>
      <a href="partials/_logout.php"class="btn btn-outline-success ml-2">Logout</a>
    </form>';
} else {
  echo '<form class="d-flex mx-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    <div class="mx-2">
      
    <button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
      
      <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
    </div>';
}

echo '
</div>
</nav>';

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Please verify at your email..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($_GET['signupsuccess'] == "false") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Failed!</strong> do not matched credentials!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>