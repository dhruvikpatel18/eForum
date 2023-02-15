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
                echo "loggedin" . $email;
                header("Location: /eForum/index.php");
            }else{
                echo "<script>
                alert('Incorrect Password');
                window.location.href='index.php';
                </script>";
            }  
        }else{
            echo "
            <script>
            alert('Invalid email!!');
                window.location.href='index.php';
            </script>";
        }
        
    }
    header("Location: /eForum/index.php");
}   
?>