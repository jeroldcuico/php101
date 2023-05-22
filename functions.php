<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<title>PHP Functions Exercise</title>

<body class="text-bg-dark">
    <section class="my-5 py-5 text-center bg-dark">
        <a href="/KodegoPHP101" class="btn btn-large btn-primary">Back to index</a>
    </section>
    <section class="my-5 py-5 text-center bg-secondary bg-gradient">
        <form class="row g-3 justify-content-center" method="POST">
            <div class="col-auto">
                <input type="text" placeholder="Enter Letter" autocomplete="off" class="form-control" id="inputLetter"
                    name="letter" maxlength="1">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="checkVowel">Submit</button>
            </div>
            <div class="col-auto py-2">
                <?php
                function CheckLetter()
                {
                    $character = strtolower($_POST["letter"]);
                    $vowels = ["a", "e", "i", "o", "u"];
                    if (is_numeric($character)) {
                        echo "You entered a number";
                        return;
                    }
                    if (empty($character)) {
                        echo "Nothing you entered";
                        return;
                    }
                    if (in_array($character, $vowels)) {
                        echo "The Letter $character declared is a Vowel";
                    } else {
                        echo "The Letter $character declared is a Consonant";
                    }

                }
                if (isset($_POST["checkVowel"])) {
                    CheckLetter();
                }
                ?>
            </div>
        </form>
    </section>

    <section class="my-5 py-5 text-center bg-danger">
        <form class="row g-3 justify-content-center" method="POST">
            <div class="col-2">
                <input type="number" placeholder="Enter numbers to convert" autocomplete="off" class="form-control"
                    name="numbertoconvert">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="convertoWord">Submit</button>
            </div>
            <div class="col-auto py-2">
                <?php
                function converttoWord($number)
                {
                    $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
                    $digits = str_split($number);
                    $res = '';
                    foreach ($digits as $digit) {
                        if (strlen($digit) === 0) {
                            echo "Nothing you entered";
                            return;
                        }
                        if ($digit === '-') {
                            $res .= 'negative ';
                        } else {
                            $res .= $formatter->format($digit) . ' ';
                        }

                    }
                    echo "You entered: " . $number . "<br/>";
                    echo strtoupper($res);
                }
                if (isset($_POST["convertoWord"])) {
                    converttoWord($_POST['numbertoconvert']);
                }
                ?>
            </div>
        </form>
    </section>
    <section class="my-5 py-5 text-center bg-dark bg-gradient">
        <form class="row g-3 justify-content-center" method="POST">
            <div class="col-auto">
                <input type="number" placeholder="Enter numbers" autocomplete="off" class="form-control"
                    name="numberdivisible">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="divisiblethree">Submit</button>
            </div>
            <div class="col-auto py-2">
                <?php
                function DivisiblebyThree($number)
                {
                    if (strlen($number) === 0) {
                        echo "Input Number";
                    } else {
                        //Trying ternary
                        echo $number % 3 === 0 ? "$number is Divisible 3" : "$number is Not Divisible by 3";
                    }
                }
                if (isset($_POST["divisiblethree"])) {
                    DivisiblebyThree($_POST['numberdivisible']);
                }
                ?>
            </div>
        </form>
    </section>

    <section class="my-5 py-5 text-center bg-info bg-gradient">
        <?php
        $array = array('jet', 'jetlag', 'jetlag', 'lag', 'laggers', 'jets', 'lag', 'where');
        echo '<h6>Original Array: ' . implode(', ', $array) . '</h6>';
        echo "<br/>";
        echo 'Removes duplicate: ' . implode(', ', array_unique($array));
        ?>
    </section>

    <section class="my-5 py-5 text-center bg-danger">
        <form class="row g-3 justify-content-center" method="POST">
            <div class="col-2">
                <input type="number" placeholder="Enter number" autocomplete="off" class="form-control"
                    name="armstrongvalue">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="armStrongSubmit">Submit</button>
            </div>
            <div class="col-auto py-2">
                <?php
                function isArmstrong($number)
                {
                    if (strlen($number) === 0) {
                        echo "No inputs added.";
                        return;
                    } else {
                        $array = str_split($number);
                        $count = count($array);
                        $sum = 0;
                        foreach ($array as $num) {
                            //$sum += $num ** $count;
                            $sum += pow($num, $count);
                        }
                        echo ($sum === (integer) $number) ? "$sum and $number are Armstrong value" : "$sum and $number are not Armstrong value";
                    }
                }
                if (isset($_POST["armStrongSubmit"])) {
                    isArmstrong($_POST['armstrongvalue']);
                }
                ?>
            </div>
        </form>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>