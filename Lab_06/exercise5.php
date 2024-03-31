<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .color-code {
            background-color: gray;
            color: white;
            padding: 20px;
            text-align: center;
            width: 640px;
            height: auto;
            margin: auto;
            margin-bottom: 30px;
            font-size: 32px;
            border-radius: 20px;
        }

        .panel {
            width: 336px;
            height: 336px;
            border: 2px solid black;
            display: block;
            text-align: center;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .cell {
            width: 40px;
            height: 40px;
            border: 1px solid black;
            display: flex;
            float: left;
        }

        .message {
            background-color: green;
            color: white;
            text-align: center;
            width: 640px;
            height: auto;
            margin: auto;
            padding: 12px;
            margin-top: 30px;
            font-size: 24px;
            display: none;
        }
    </style>
</head>
ß

<body>
    <div class="color-code">
        Hover a cell
    </div>

    <div class="panel">
        <?php
        for ($i = 0; $i < 8; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $color = getRandomColor();
                $cell = "<div class='cell' style='background-color:$color'></div>";
                echo $cell;
            }
        }
        ?>
    </div>

    <div class="message">
        This is a message
    </div>
</body>
<?php
$previousColor = "rgb(255, 255, 255)";
function getRandomColor()
{
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);

    $color = "rgb($red, $green, $blue)";
    return $color;
}

?>
<script>
    $(".color-code").click(function() {
        const colorCode = $(this).html()
        navigator.clipboard.writeText(colorCode);
        $('.message').html('Color has been copied to the clipboard')
        $('.message').show('slow')
        const myTimeout = setTimeout(() => {
            $('.message').hide('slow')
        }, 2000)
    })

    $(".cell").click(function() {
        const color = $(this).css("background-color")
        $('.color-code').html(color)
        $('body').css('background-color', color)
        previousColor = color
        $('.message').html('Background color has been changed')
        $('.message').show('slow')
        const myTimeout = setTimeout(() => {
            $('.message').hide('slow')
        }, 2000)
    })

    $(".cell").hover(function() {
        const color = $(this).css("background-color")
        $('.color-code').html(color)
        $('body').css('background-color', color)
    }, function() {
        $('body').css('background-color', previousColor)
        $('.color-code').html(previousColor)
    })
</script>

</html>