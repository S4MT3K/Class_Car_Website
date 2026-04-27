<?php
class DBConn
{
    public static string $servername_school = "10.101.110.178";
    public static string $servername_WIFI = "10.1.1.178";
    public static string $username = "admin";
    public static string $password = "q1w2e3r4t5";
    public static string $dbname = "VEHICLE";

    public static function getDBConn()
    {
            return new PDO("mysql:host=" . self::$servername_school . ";dbname=" . self::$dbname, self::$username, self::$password);
    }

    public static function findbyID($id) : Car
    {
        $conn = self::getDBConn();
        $stmt = $conn->prepare("SELECT * FROM Car WHERE CarID = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Car($result["CarBrand"], $result["CarModel"], $result["CarColor"], $result["EngineID"], $result["CarWheelType"]);
    }

    public static function createCar(string $brand, string $color, string $model, int $eID, string $wheeltype) : Car
    #erstellt ein Auto in der Datenbank (eintrag) und gleichzeitig gibt es uns ein OBJEKT für die Weiterverarbeitung zurück.
    {
            $conn = DBConn::getDBConn();
            $sqlquery = "INSERT INTO Car (CarBrand, CarColor, CarModel, EngineID, CarWheelType) VALUES (:brand, :color, :model, :eID, :wheeltype)";
            $stmt = $conn->prepare($sqlquery);
            $stmt->bindParam(":brand", $brand);
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":model", $model);
            $stmt->bindParam(":eID", $eID);
            $stmt->bindParam(":wheeltype", $wheeltype);
            $stmt->execute();
            $lastAddedObjID = $conn->lastInsertId();
            return static::findbyID($lastAddedObjID);
    }
}