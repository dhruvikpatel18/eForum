<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to eDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .carousel-inner>.carousel-item>img {
        width: 1500px;
        height: 400px;
    }

    .card {
        border-radius: 9px;
        /* background: #3c3c3c; */
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: 1s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        /* padding: 14px 80px 18px 36px; */
        cursor: pointer;
        background-color: #000000;
        border-style: solid;
        border-color: black;
    }

    .card:hover {
        transform: scale(1.1);
        /* box-shadow: 0 20px 20px rgba(1, 1, 1, .12), 0 4px 8px rgba(0, 0, 0, .06); */
        /* background-color: #AAA; */
        /* border: 1px solid; */
        /* padding: 10px; */
        box-shadow: 10px 15px 20px black;
    }

    #ques {
        min-height: 400px;
    }

    html,
    body {
        width: 100%;
        height: 100%;
    }

    body {
        background: linear-gradient(45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 8s ease infinite;
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

    .carousel-indicators [data-bs-target] {
        position: relative;
        width: 100px;
        height: 6px;
        border: none;
        border-radius: 24px;
    }

    .carousel-indicators [data-bs-target] span {
        content: ’’;
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: #7952b3;
        border-radius: inherit;
    }
    </style>
</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- slider start here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1">
                <span></span></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                <span></span></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                <span></span></button>
        </div>
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="photos/display-2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photos/display-1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photos/display-4.png" class="d-block w-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- category container start here -->

    <div class="container my-4" id="ques">

        <h2 class="text-center">eDiscuss -Browse Categories</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `ediscuss`";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];  
                
                echo '<div class="col-md-4 my-3">
                <div class="card " style="width:18rem; height:20rem;">
                    <img height="115px" src="photos/card-'.$id.'.png" class="card-img-top" alt="...">
                    <div class="card-body text-secondary">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                        <p class="card-text ">'.substr($desc,0,90).'... </p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-secondary">View Threads</a>
                    </div>
                </div>
            </div>';
            }

            ?>



        </div>
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
    <script>
    const myCarousel = document.getElementById("carouselExampleIndicators");
    const carouselIndicators = myCarousel.querySelectorAll(
        ".carousel-indicators button span"
    );
    let intervalID;

    const carousel = new bootstrap.Carousel(myCarousel);

    window.addEventListener("load", function() {
        fillCarouselIndicator(1);
    });

    myCarousel.addEventListener("slide.bs.carousel", function(e) {
        let index = e.to;
        fillCarouselIndicator(++index);
    });

    function fillCarouselIndicator(index) {
        let i = 0;
        for (const carouselIndicator of carouselIndicators) {
            carouselIndicator.style.width = 0;
        }
        clearInterval(intervalID);
        carousel.pause();

        intervalID = setInterval(function() {
            i++;

            myCarousel.querySelector(".carousel-indicators .active span").style.width =
                i + "%";

            if (i >= 100) {
                // i = 0; -> just in case
                carousel.next();
            }
        }, 50);
    }
    </script>

</body>

</html>