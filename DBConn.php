<?php
class DBConn
{
    public string $servername = "10.101.110.178";
    public string $username = "admin";
    public string $password = "q1w2e3r4t5";
    public string $dbname = "VEHICLE";

    public static function checkConnection($nameDesServers, $nameDerDB, $nameDesUsers, $passwordDesUsers)
    {
        echo"Test der Connection: ";
        echo "<br>";
        try {
            $conn = new PDO("mysql:host=$nameDesServers;dbname=$nameDerDB", $nameDesUsers, $passwordDesUsers);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<div style='background: chartreuse; width: 200px'> Connected successfully</div>";
            //$conn = null;
            self::closeConnection($conn);
        } catch(PDOException $e) {
            echo "<div style='background: #ff0008; width: 600px'>" . "Connection failed: " . $e->getMessage(); "</div>";
        }
        echo "<br>";
        echo "________________________________";
        echo "<br>";
    }

    private static function closeConnection($conn)
    {
        $conn = null;
        echo "<br>";
        echo "Connection closed";
    }
}

