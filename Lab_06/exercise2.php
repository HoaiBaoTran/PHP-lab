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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-5 mx-auto border rounded px-3 py-3">
                <h4 class="text-center">Tính toán cơ bản</h4>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="num1">Số hạng 1</label>
                        <input type="text" class="form-control" id="num1" name='num1'>
                    </div>
                    <div class="form-group">
                        <label for="num2">Số hạng 2</label>
                        <input type="text" class="form-control" id="num2" name='num2'>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="add" name="expression" id="add" type="radio" class="custom-control-input">
                            <label for="add" type="radio" class="custom-control-label">Cộng</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="subtract" name="expression" id="subtract" type="radio" class="custom-control-input">
                            <label for="subtract" type="radio" class="custom-control-label">Trừ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="multiply" name="expression" id="multiply" type="radio" class="custom-control-input">
                            <label for="multiply" type="radio" class="custom-control-label">Nhân</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="divide" name="expression" id="divide" type="radio" class="custom-control-input">
                            <label for="divide" type="radio" class="custom-control-label">Chia</label>
                        </div>
                    </div>
                    <?php
                    if (
                        !isset($_POST['num1'])
                        || !isset($_POST['num2'])
                        || !isset($_POST['expression'])
                    ) {
                        $response = "<div class='form-group'>
                        <div class='col-md-6 text-center'>
                            <div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin</div>
                        </div>
                    </div>";
                        echo $response;
                    } else {
                        $result = -1;
                        $message = "";
                        $num_1 = $_POST['num1'];
                        $num_2 = $_POST['num2'];
                        $expression = $_POST['expression'];
                        switch ($expression) {
                            case "add":
                                $result = $num_1 + $num_2;
                                $message = "<strong>$num_1 + $num_2 = $result</strong>";
                                break;
                            case "subtract":
                                $result = $num_1 - $num_2;
                                $message = "<strong>$num_1 - $num_2 = $result</strong>";
                                break;
                            case "multiply":
                                $result = $num_1 * $num_2;
                                $message = "<strong>$num_1 x $num_2 = $result</strong>";
                                break;
                            case "divide":
                                $result = $num_1 / $num_2;
                                $message = "<strong>$num_1 / $num_2 = $result</strong>";
                                break;
                        }
                        $response = "<div class='row'>
                        <div class='col-md-6 mx-auto px-3 py-3 text-center'>
                            <div class='alert alert-success'>$message</div>
                        </div>
                    </div>";
                        echo $response;
                    }
                    ?>
                    <button class="btn btn-success">Xem kết quả</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>