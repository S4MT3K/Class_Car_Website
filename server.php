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

    $carData = [ #für json encode für den cookie
            "brand" => $brand,
            "modeltype" => $modeltype,
            "color" => $color,
            "enginetype" => $enginetype,
            "wheeltype" => $wheeltype
    ];


    //$orderedCar = new Car($brand, $modeltype, $color, $engine, $wheeltype); //TODO: überprüfe ob notwendig

    setcookie("CarCookie", json_encode($carData), time() + 3600);

    try {
        $engine = 1;
        $orderedCar = DBConn::createCar($brand, $color, $modeltype, 1, $wheeltype); //TODO: Write in DBConn Class
        $hubraum = $orderedCar->getEngine() ?? "200KW"; //Null Coalacing
        $tableRowLabel = $hubraum == "200KW" ? "Kapazität" : "Hubraum";
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
        <th>{$orderedCar->getBrand()}</th>
        <th>{$orderedCar->getModel()}</th>
        <th>{$orderedCar->getColor()}</th>
        <th>{$orderedCar->getEngine()}</th>
        <th>{$orderedCar->getEngine()}</th>
        <th>{$orderedCar->getWheelType()}</th>
    </tr>
</table>";
    }
    catch (exception $e){
        echo $e->getMessage();
    }


}
?>
<link rel="stylesheet" href="./style.css">
