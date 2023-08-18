<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asientos de Cancha de Baloncesto</title>
    <style>
        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            display: inline-block;
            background-color: gray;
            border: 1px solid black;
        }
        .taken {
            background-color: red;
        }
    </style>
</head>
<body>
    <?php
    // Definir una matriz para representar los asientos
    $rows = 6;
    $seatsPerRow = 10;
    $takenSeats = [[2, 4], [3, 5], [5, 8]]; // Asientos ocupados

    echo "<h2>Asientos de la Cancha de Baloncesto</h2>";

    echo "<div>";
    for ($row = 1; $row <= $rows; $row++) {
        for ($seat = 1; $seat <= $seatsPerRow; $seat++) {
            $seatNumber = ($row - 1) * $seatsPerRow + $seat;
            $isTaken = in_array([$row, $seat], $takenSeats);
            $seatClass = $isTaken ? "taken" : "seat";
            echo "<div class='$seatClass'></div>";
        }
        echo "<br>";
    }
    echo "</div>";
    ?>
</body>
</html>
