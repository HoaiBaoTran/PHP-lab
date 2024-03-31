<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>PHP Exercises</title>
    <style>
        .content-response {
            color: forestgreen;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-5 my-5 mx-2 mx-sm-auto border rounded px-3 py-3">
                <h5 class="text-center mb-3 content-response">Confirm Information</h5>

                <?php
                if (isset($_POST['name'])) {
                    $name = $_POST['name'];
                    $response = "<div class='form-group'>
                            <label for='name'>Your name</label>
                            <div class='content-response'>$name</div>
                        </div>";
                    echo $response;
                }

                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $response = "<div class='form-group'>
                        <label for='email'>Your email</label>
                        <div class='content-response'>$email</div>
                    </div>";
                    echo $response;
                }

                if (isset($_POST['gender'])) {
                    $gender = $_POST['gender'];
                    $response = "<div class='form-group'>
                        <label for='email'>Gender</label>
                        <div class='content-response'>$gender</div>
                    </div>";
                    echo $response;
                }

                if (isset($_POST['web-browsers'])) {
                    $web_browsers = $_POST['web-browsers'];
                    $list = "<ul>";
                    foreach ($web_browsers as $browser) {
                        $list .= "<li class='content-response'>$browser</li>";
                    }
                    $list .= "</ul>";
                    $response = "<div class='form-group'>
                        <legend class='col-form-label'>Favorite web browsers</legend>
                        $list
                        </div>";
                    echo $response;
                }

                if (isset($_POST['operation'])) {
                    $operation = $_POST['operation'];
                    $response = "<div class='form-group'>
                        <legend class='col-form-label'>Prefered Operating System</legend>
                        <div class='content-response'>$operation</div>
                        </div>";
                    echo $response;
                }

                ?>
                <button onclick="window.location.href='exercise4.html'" class="btn btn-success px-5 mr-2 text-white">Save</button>
                <button onclick="window.location.href='exercise4.html'" class="btn btn-outline-success px-5">Back</button>

            </div>
        </div>
    </div>
</body>

</html>