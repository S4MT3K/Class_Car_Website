<?php
function myAutoloader($className){
    $classFile='./'.$className.'.php';

    if(file_exists($classFile)){
        include($classFile);
    }
}
spl_autoload_register('myAutoloader');

if(isset($_POST["BESTELLEN"])){ //Rückversicherung dass das bestellformular abgesendet wurde (KLICK AUF BUTTON BESTELLEN)
    $brand = $_POST["brand"];
    $modeltype = $_POST["modeltype"];
    $color = $_POST["color"];
    $enginetype = $_POST["enginetype"];
    $wheeltype = $_POST["wheeltype"];

    $carData = [
            "brand" => $brand,
            "modeltype" => $modeltype,
            "color" => $color,
            "enginetype" => $enginetype,
            "wheeltype" => $wheeltype
    ];




    $engine = new Engine($enginetype);
    $orderedCar = new Car($brand, $modeltype, $color, $engine, $wheeltype);
    $hubraum = $orderedCar->getEngine()->getHubraum() ?? "200KW"; //Null Coalacing
    $tableRowLabel = $hubraum == "200KW" ? "Kapazität" : "Hubraum";
    setcookie("CarCookie", json_encode($carData), time() + 3600);

    echo "<h1>IHRE BESTELLUNG</h1>";
    echo "<br>";
    echo "<table border='1'>
    <tr>
        <th>Marke</th>
        <th>Modell</th>
        <th>Farbe</th>
        <th>$tableRowLabel</th>
        <th>Motorart</th>
        <th>Felgenmaterial</th>
    </tr>
    <tr>
        <th>$brand</th>
        <th>$modeltype</th>
        <th>$color</th>
        <th>$hubraum</th>
        <th>$enginetype</th>
        <th>$wheeltype</th>
    </tr>
</table>";
    DBConn::checkConnection("10.101.110.178","VEHICLE","admin","q1w2e3r4t5");
}
?>
<link rel="stylesheet" href="./style.css">
