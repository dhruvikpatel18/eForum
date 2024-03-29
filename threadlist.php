<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Forum | eDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="/eForum/photos/logo-2.svg" type="image/x-icon" />
    <style>
    #ques {
        min-height: 280px;
    }

    html,
    body {
        width: 100%;
        height: 100%;
    }

    body {
        /* background: linear-gradient(45deg, #ee7752, #23d5ab, #23a6d5, #23d5ab); */
        background: linear-gradient(45deg, #7393B3, #D3D3D3, #B2BEB5, #C0C0C0);
        background-size: 400% 400%;
        animation: gradient 10s ease infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
    </style>

</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `ediscuss` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>
    <!-- fetch data from form -->
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if($method == 'POST') {
        //insert thread into threds database
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`,`timestamp`) VALUES ('$th_title' , '$th_desc' , '$id' , '$sno' , current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Added!</strong> Your Query has been added! please wait for response.  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
    }
    ?>

    <!-- threadlist page intro -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to
                <?php echo $catname; ?> forums
            </h1>
            <p class="lead">
                <?php echo $catdesc; ?>
            </p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo'<div class="container">
        <h1>Start a Discussion</h1>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Problem Title</label>
        <input required type="text" id="title" name="title" class="form-control" aria-describedby="emailHelp"
            placeholder="Enter Your Problem">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
            possible.</small>
    </div>
    <input type="hidden" name="sno" value="'. $_SESSION["sno"] .'">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Describe your problem</label>
        <textarea required class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success my-2">Submit</button>
    </form>
    </div>';
    }else{
        echo '
        <div class="container">
        <h1>Start a Discussion</h1>
        <p class="lead">You are not logged in. Please login to be able to start discussion..</p>
        </div>
        ';
    }
    ?>
    <!-- Browse questions section -->
    <div class="container" id="ques">
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
                
            echo '<div class="media my-3">
            <img class="mr-3" src="photos/user.png" width="40px" alt="Generic placeholder image">
            <div class="media-body">
                '.'<h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">'. $title . '</a></h5>' . $desc . '
            </div>'.'<div class="font-weight-bold my-0">'.$row2["user_email"].' modified at:'.$thread_time.'</div>'.'
        </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-6">No Questions Asked Till Now!!</h1>
              <p class="lead">Be the first persion to ask a question </p>
            </div>
          </div>';
        }
        ?>



    </div>


    <?php include 'partials/_footer.php'; ?>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>