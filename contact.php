<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact us | eDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="/eForum/photos/logo-2.svg" type="image/x-icon" />

    <style>
    /* .container {
        min-height: 76.5vh;
    } */

    h2 {
        text-align: center;
        text-decoration: underline;
    }

    html,
    body {
        width: 100%;
        height: 100%;
    }

    body {
        background: linear-gradient(45deg, #7393B3, #424552, #B2BEB5, #C0C0C0);
        background-size: 400% 400%;
        animation: gradient 30s ease infinite;
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

    h1 {
        font-family: 'Poppins', sans-serif, 'arial';
        font-weight: 600;
        font-size: 72px;
        color: white;
        text-align: center;
    }

    h4 {
        font-family: 'Roboto', sans-serif, 'arial';
        font-weight: 400;
        font-size: 20px;
        color: #9b9b9b;
        line-height: 1.5;
    }

    /* ///// inputs /////*/

    input:focus~label,
    textarea:focus~label,
    input:valid~label,
    textarea:valid~label {
        font-size: 0.75em;
        color: black;
        top: -5px;
        -webkit-transition: all 0.225s ease;
        transition: all 0.225s ease;
    }

    .styled-input {
        float: left;
        width: 293px;
        margin: 1rem 0;
        position: relative;
        border-radius: 4px;
    }

    @media only screen and (max-width: 768px) {
        .styled-input {
            width: 100%;
        }
    }

    .styled-input label {
        color: gray;
        padding: 1.3rem 30px 1rem 30px;
        position: absolute;
        top: 2px;
        left: 0;
        -webkit-transition: all 0.25s ease;
        transition: all 0.25s ease;
        pointer-events: none;
    }

    .styled-input.wide {
        width: 650px;
        max-width: 100%;
    }

    input,
    textarea {
        padding: 20px;
        border: 0;
        width: 100%;
        font-size: 1rem;
        background-color: lightgray;
        color: white;
        border-radius: 4px;
    }

    input:focus,
    textarea:focus {
        outline: 0;
    }

    input:focus~span,
    textarea:focus~span {
        width: 100%;
        -webkit-transition: all 0.075s ease;
        transition: all 0.075s ease;
    }

    textarea {
        width: 100%;
        min-height: 15em;
    }

    .input-container {
        width: 650px;
        max-width: 100%;
        margin: 20px auto 25px auto;
    }

    .submit-btn {
        float: right;
        padding: 7px 35px;
        border-radius: 60px;
        display: inline-block;
        background-color: #4b8cfb;
        color: white;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.06),
            0 2px 10px 0 rgba(0, 0, 0, 0.07);
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .submit-btn:hover {
        transform: translateY(1px);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.10),
            0 1px 1px 0 rgba(0, 0, 0, 0.09);
    }

    @media (max-width: 768px) {
        .submit-btn {
            width: 100%;
            float: none;
            text-align: center;
        }
    }

    input[type=checkbox]+label {
        color: black;
        font-style: italic;
    }

    input[type=checkbox]:checked+label {
        color: #f00;
        font-style: normal;
    }

    h2,
    h5,
    label {
        color: #21232b;
    }

    .inp_lable {
        color: #21232b;
    }
    </style>

</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <div class="container my-3">
        <div class="row">
            <h2>contact us</h2>
        </div>
        <div class="row">
            <h5 style="text-align:center">We'd love to hear from you!</h5>
        </div>
        <div class="row input-container">
            <div class="col-xs-12">
                <div class="styled-input wide inp_lable">
                    <input type="text" required />
                    <label>Name</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="text" required />
                    <label>Email</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="text" required />
                    <label>Phone Number</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <textarea required></textarea>
                    <label>Message</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="btn-lrg submit-btn">Send Message</div>
            </div>
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
</body>

</html>