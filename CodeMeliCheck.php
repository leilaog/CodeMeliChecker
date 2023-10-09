<?php
if (isset($_POST["codemeli"])) {
    $codemelis = str_split($_POST["codemeli"]);
    $sum = 0;
    foreach ($codemelis as $key => $value) {
        $sum += $value * (10 - $key);
    }
    $sum = $sum - $codemelis[9];
    $calculate = $sum % 11;
    if ((($calculate < 2) && ($calculate == $codemelis[9])) || (($calculate > 2) && ($calculate == (11 - $codemelis[9])))) {
        echo ('<p  style="color:green;">کد ملی ' . $_POST["codemeli"] . ' معتبر است</p>');
    } else {
        echo ('<p  style="color:red;">' . $_POST["codemeli"] . ' یک کد ملی نا معتبر است</p>');
    }
}
?>
<!DOCTYPE html>

<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="CodeMeliCheck.php" method="POST">
        <label for="codemeli">
            کد ملی
        </label>
        <input type="text" name="codemeli" id="codemeli" minlength="10" maxlength="10" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" required oninvalid='setCustomValidity("شما مقدار \" "+value+"\"را به عنوان کد ملی وارد نموده اید. فرمت وارد شده متعلق به کد ملی نیست");value="";' oninput="setCustomValidity('')">
        <input type="submit" name="submit" value="Check">
    </form>
</body>

</html>