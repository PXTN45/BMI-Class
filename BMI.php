<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="/BMI.css">
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div id="crad-bmi" class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">BMI Calculator</h5>
        <p class="card-text">
            <label for="weight">Weight (kg):</label>
            <input type="text" name="weight" id="weight" required>
            <br>
            <label for="height">Height (cm):</label>
            <input type="text" name="height" id="height" required>
            <br>
        </p>
        <input type="submit" value="Calculate BMI">
        </div>
        </div>
    </form>
    <?php
class BMICalculator
{
    public function calculateBMI($weight, $height)
    {
        $bmi = $weight / (($height / 100) ** 2);
        return round($bmi, 2);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $height = $_POST["height"];

    $bmiCalculator = new BMICalculator();
    $bmi = $bmiCalculator->calculateBMI($weight, $height);
    ?>
    <div id="result">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <p class="card-text"><?php echo "Your BMI is : " . $bmi; ?></p>

    <div class="card" style="width: 15rem; high: 15rem;">
                <div class="card-body">
    <?php
    if ($bmi < 18.50) {
            print "ผอม";
        } else if ($bmi > 18.50 && $bmi < 22.90) {
            print "ปกติ";
        } else if ($bmi > 23 && $bmi < 24.90) {
            print "ท้วม";
        } else if ($bmi > 25 && $bmi < 29.90) {
            print "อ้วน";
        } else if ($bmi > 30) {
            print "อ้วนมาก";
        }
    ?>
    </div>

                </div>
            </div>
        </div>
    </div>
<?php

}
?>
</body>
</html>
