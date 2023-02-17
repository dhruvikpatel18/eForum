<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if($row['is_verified'] == 1){
            if (password_verify($pass, $row['user_password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                    $_SESSION['sno'] = $row['sno'];
                $_SESSION['useremail'] = $email;
                // echo "loggedin" . $email;
                // $showAlert = true;
                header("Location: /eForum/index.php?loginsuccess=true");
            }else{
                $showError = "Your passwords do no matched!!";
                
            }
            // header("Location: /eForum/index.php?loginsuccess=false&error=$showError");
        }else{
            $showError = "Your verification is pending, please signup or go to your email";
            header("Location: /eForum/index.php?loginsuccess=false&error=$showError");
        }
        
    }else{
        $showError="Invalid email!";
        header("Location: /eForum/index.php?loginsuccess=false&error=$showError");
    }
    
}   
?>