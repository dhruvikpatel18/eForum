<?php
include 'partials/_dbconnect.php';
if(isset($_GET['email'])&& isset($_GET['v_code'])){
    $query = "SELECT * FROM `users` WHERE `user_email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $result = mysqli_query($conn,$query);
    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['is_verified'] == 0){
                $update = "UPDATE `users` SET `is_verified`='1' WHERE `user_email`='$_GET[email]'";
                if(mysqli_query($conn,$update)){
                    echo "
                    <script>
                    alert('Email verification successful!!');
                    window.location.href='index.php';
                    </script>
                    ";
                }else{
                    echo "
                    <script>
                    alert('can not run your query');
                    window.location.href='index.php';
                    </script>
                    ";
                }
            }
        }
    }
}
?>