<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_GET['search']?> | eDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="/eForum/photos/logo-2.svg" type="image/x-icon" />
    <style>
    .carousel-inner>.carousel-item>img {
        width: 1500px;
        height: 400px;
    }

    #container {
        min-height: 87.5vh;
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
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- search results -->
    <div class="container" id="container">
        <h1 class="my-3">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
        <?php
        $noResult = true;
        $query = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title,thread_desc) against('$query');";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=".$thread_id;
            $noResult = false;
            //Display search results
            echo '<div class="result">
            <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
            <p>'.$desc.'</p>
        </div>';
        }
        if($noResult){
            echo '<div class="container" id="ques">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">No Results Found!!</h1>
                  <p class="lead">Suggestions: <ul>
                  <li>Make sure that all words are spelled correctly.</li>
                  <li>Try different keywords.</li>
                  <li>Try more general keywords. </li></ul></p>
                </div>
              </div>    </div>';
        }
        ?>
    </div>
    <?php include 'partials/_footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
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