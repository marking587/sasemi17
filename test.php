<?php

$servername = "localhost";
$username = "root";
$password = "MyNewPass";
$dbname = "usr_web431_1";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);
    $Name = $data['nachname'];
    $Vorname = $data['vorname'];
    $Geburtstag = $data['geburtstag'];
    $Alter = 23;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `test`(`Name`, `Vorname`, `Geburtstag`, `Alter`)
            VALUES ('$Name','$Vorname','$Geburtstag',$Alter);";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

} else
{

}

?>