<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        table td {
            border: 1px solid black;
            text-align: center;
        }

        .title {
            background-color: lightgray;
        }

        .title td {
            padding: 4px;
            font-weight: bold;
        }

        td {
            padding: 4px;
        }

        .content:hover {
            background-color: lightblue;
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr class="title">
                <td colspan="10">BẢNG CỬU CHƯƠNG</td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr class='content'>";
                for ($j = 1; $j <= 10; $j++) {
                    $result = $i * $j;
                    echo "<td>$j x $i = $result</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>