<?php
class DBConn
{
    public static string $servername = "10.101.110.178";
    public static string $username = "admin";
    public static string $password = "q1w2e3r4t5";
    public static string $dbname = "VEHICLE";

    public static function getDBConn()
    {
        return new PDO("mysql:host=" . self::$servername . ";dbname=" . self::$dbname, self::$username, self::$password);

        #$conn = new PDO("mysql:host=$nameDesServers;dbname=$nameDerDB", $nameDesUsers, $passwordDesUsers);
    }
}

