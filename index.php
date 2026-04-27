<?php
if(isset($_COOKIE["CarCookie"])){
    $carData = json_decode($_COOKIE["CarCookie"],true);

    $brand = $carData["brand"] ?? null;
    $modeltype = $carData["modeltype"] ?? null;
    $color = $carData["color"] ?? null;
    $enginetype = $carData["enginetype"] ?? null;
    $wheeltype = $carData["wheeltype"] ?? null;
}
else{
    $brand = null;
    $modeltype = null;
    $color = null;
    $enginetype = null;
    $wheeltype = null;
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
        <div>
            <label>Name</label>
            <input type="text">
        </div>
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
                <option value="coupe" <?= $modeltype ==="coupe" ? "selected" : ""?>>Coupè</option>
                <option value="limousine" <?= $modeltype ==="limousine" ? "selected" : ""?>>Limousine</option>
                <option value="kombi" <?= $modeltype ==="kombi" ? "selected" : ""?>>Kombi</option>
            </select>
        </div>
        <label>Select Color:</label>
        <div id="color_selection_div">
            <select name="color">
                <option value="red" <?= $color ==="red" ? "selected" : ""?>>RED</option>
                <option value="green" <?= $color ==="green" ? "selected" : ""?>>GREEN</option>
                <option value="blue" <?= $color ==="blue" ? "selected" : ""?>>BLUE</option>
                <option value="white" <?= $color ==="white" ? "selected" : ""?>>WHITE</option>
                <option value="black" <?= $color ==="black" ? "selected" : ""?>>BLACK</option>
            </select>
        </div>
        <label>Select Enginetype:</label>
        <div id="engine_selection_div">
            <select name="enginetype">
                <option value="diesel" <?= $enginetype ==="diesel" ? "selected" : ""?>>DIESEL</option>
                <option value="benzin" <?= $enginetype ==="benzin" ? "selected" : ""?>>BENZIN</option>
                <option value="elektro" <?= $enginetype ==="elektro" ? "selected" : ""?>>ELEKTRO</option>
            </select>
        </div>
        <label>Select Wheeltype:</label>
        <div id="wheel_selection_div">
            <select name="wheeltype">
                <option value="aluminium" <?= $wheeltype ==="aluminium" ? "selected" : ""?>>ALUMINIUM</option>
                <option value="steel" <?= $wheeltype ==="steel" ? "selected" : ""?>>STEEL</option>
            </select>
        </div>
        <button type="submit" name="BESTELLEN">BESTELLEN</button>
    </form>
</div>
</body>
</html>