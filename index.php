<?php
if(isset($_COOKIE["CarCookie"])){
    $carData = json_decode($_COOKIE["CarCookie"],true);

    $brand = $carData["brand"] ?? null;
    $modeltype = $carData["modeltype"] ?? null;
    $color = $carData["color"] ?? null;
    $enginetype = $carData["enginetype"] ?? null;
    $wheeltype = $carData["wheeltype"] ?? null;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuyMyCar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="form_div">
    <form action="./server.php" method="post">
        <label>Select Brand:</label>
        <div id="brand_selection_div">
        <select name="brand">
            <option value="volvo" <?= $brand ==="volvo" ? "selected" : ""?>>VOLVO</option>
            <option value="seat" <?= $brand ==="seat" ? "selected" : ""?>>SEAT</option>
            <option value="bmw" <?= $brand ==="bmw" ? "selected" : ""?>>BMW</option>
            <option value="skoda" <?= $brand ==="skoda" ? "selected" : ""?>>SKODA</option>
            <option value="mercedes" <?= $brand ==="mercedes" ? "selected" : ""?>>MERCEDES</option>
            <option value="porsche" <?= $brand ==="porsche" ? "selected" : ""?>>PORSCHE</option>
        </select>
        </div>
        <label>Select Model:</label>
        <div id="model_selection_div">
            <select name="modeltype">
                <option value="coupe">Coupè</option>
                <option value="limousine">Limousine</option>
                <option value="kombi">Kombi</option>
            </select>
        </div>
        <label>Select Color:</label>
        <div id="color_selection_div">
            <select name="color">
                <option value="red">RED</option>
                <option value="green">GREEN</option>
                <option value="blue">BLUE</option>
                <option value="white">WHITE</option>
                <option value="black">BLACK</option>
            </select>
        </div>
        <label>Select Enginetype:</label>
        <div id="engine_selection_div">
            <select name="enginetype">
                <option value="diesel">DIESEL</option>
                <option value="benzin">BENZIN</option>
                <option value="elektro">ELEKTRO</option>
            </select>
        </div>
        <label>Select Wheeltype:</label>
        <div id="wheel_selection_div">
            <select name="wheeltype">
                <option value="aluminium">ALUMINIUM</option>
                <option value="steel">STEEL</option>
            </select>
        </div>
        <button type="submit" name="BESTELLEN">BESTELLEN</button>
    </form>
</div>
</body>
</html>