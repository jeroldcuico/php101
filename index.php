<?php
function checkLength($word)
{
    if (strlen($word) > 5) {
        return "String <span class='badge bg-success'>$word</span> has more than 5 letters";
    }
    return "String <span class='badge bg-danger'>$word</span> does not have more than 5 letters";
}

function BestDeal($quantity1, $quantity2, $price1, $price2, &$bestDeal, &$totalBest)
{
    $total1 = ($price1 / $quantity1) * 100;
    $total2 = ($price2 / $quantity2) * 100;

    if ($total1 < $total2) {
        $bestDeal = "<span class='badge bg-info'>Option 1</span>";
        $totalBest = "<button class='btn btn-sm btn-primary'>" . round($total1, 2) . "%</button>";
    } else {
        $bestDeal = "<span class='badge bg-danger'>Option 2</span>";
        $totalBest = "<button class='btn btn-sm btn-primary'>" . round($total2, 2) . "%</button>";
    }

}

function getDaysinaMonth($monthName)
{
    $monthData = [
        'January' => 31,
        'February' => 28,
        'March' => 31,
        'April' => 30,
        'May' => 31,
        'June' => 30,
        'July' => 31,
        'August' => 31,
        'September' => 30,
        'October' => 31,
        'November' => 30,
        'December' => 31,
    ];

    $numDays = 'Month not found';

    foreach ($monthData as $month => $days) {
        if ($monthName === $month) {
            switch ($month) {
                case 'February':
                    $numDays = $days;
                    break;
                default:
                    $numDays = $days;
                    break;
            }
            break;
        }
    }
    return $numDays;
}


function displayStudents($students)
{
    $studentObj = json_decode($students, true);
    echo "<table class='table table-striped'>
    <tr><th>Name</th><th>Age</th><th>School</th></tr>";
    foreach ($studentObj as $student) {
        echo "<tr>";
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $student['age'] . "</td>";
        echo "<td>" . $student['school'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<title>PHP 101 Exercise</title>
</head>

<body class="text-bg-dark">

    <section class="my-5 py-5 text-center bg-secondary">
        <?php
        //! Logic 1
        $words = ['class', 'kodego', 'top'];
        foreach ($words as $item) {
            echo checkLength($item) . "<br/>";
        }
        ?>
    </section>
    <section class="my-5 py-5 text-center bg-success">
        <?php
        //! Logic 2
        
        $quantity1 = 70;
        $quantity2 = 100;
        $price1 = 30;
        $price2 = 50;

        $bestDeal = "";
        $bestTotalCost = 0;

        echo "Quantity 1 : " . $quantity1 . "<br/>";
        echo "Quantity 2 : " . $quantity2 . "<br/>";
        echo "Price 1 : " . $price1 . "<br/>";
        echo "Price 2 : " . $price2 . "<br/>";
        BestDeal($quantity1, $quantity2, $price1, $price2, $bestDeal, $bestTotalCost);
        echo $bestDeal . " is the best deal option. Total: " . $bestTotalCost;
        ?>
    </section>
    <section class="my-5 py-5 text-center bg-info">
        <?php
        //! Logic 3
        
        $monthName = 'March';
        $numDays = getDaysinaMonth($monthName);
        echo "Number of days in $monthName: $numDays";

        ?>
    </section>

    <section class="my-5 px-5 py-5 text-bg-light">
        <?php
        //! Logic 4
        $students = '[{"name":"John Garg","age":"15","school":"Ahlcon Public school"},
        {"name":"Smith Soy","age":"16","school":"St. Marie school"},
        {"name":"Charle Rena","age":"16","school":"St. Columba school"}]';

        displayStudents($students)
            ?>
    </section>

    <section class="my-5 px-5 py-5 text-bg-danger">
        <?php
        //! Logic 5
        $start = 1;
        $end = 10;
        echo "<table class='table table-dark table-striped'>";
            echo "<tr><th class='table-danger'>0</th>";
            for ($i = $start; $i <= $end; $i++) {
                echo "<th class='table-success'>$i</th>";
            }
            echo "</tr>";
            for ($i = $start; $i <= $end; $i++) {
                echo "<tr>";
                echo "<th class='table-success'>$i</th>";
                for ($j = $start; $j <= $end; $j++) {
                    $result = $i / $j;
                    echo "<td>" . round($result, 3) . "</td>";
                }
                echo "</tr>";
            }
        echo "</table>";
        ?>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>