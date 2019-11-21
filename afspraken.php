<?php
//Auteurs: R. Troost, D. L. Wilbrink, C. Huang en S. Sadiqi

//Initilisatie
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    //$conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = "CREATE DATABASE IF NOT EXISTS afspraken";
        // use exec() because no results are returned
        $conn->exec($data);
    }
    catch(PDOException $e)
        {
        echo $data . "<br>" . $e->getMessage();
    }

    
    try {
        $connb = new PDO("mysql:host=$servername;dbname=afspraken", $username, $password);
        // set the PDO error mode to exception
        $connb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
  
function table(&$connb)  {
    // sql to create table
    $table = "CREATE TABLE IF NOT EXISTS afspraak (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        voornaam VARCHAR(40) NOT NULL,
        achternaam VARCHAR(40) NOT NULL,
        email VARCHAR(50) NOT NULL,
        datum DATE
        )";
    $connb->exec($table);
}

function insert (&$connb){
    //takes the form items from html
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $datum = date('Y-m-d', strtotime($_POST["datum"]));
    
    //insert into table
    $insert = "INSERT INTO afspraak (voornaam, achternaam, email, datum) VALUES ('$voornaam', '$achternaam', '$email', '$datum');";
    $connb->exec($insert);
}

function printTable(&$connb){
    //fetching and printing table
    $printer = "SELECT * FROM afspraak;";
    $result = $connb->query($printer);
    $datab = $result->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table border='15'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Voornaam</th>";
    echo "<th>Achternaam</th>";
    echo "<th>E-mail</th>";
    echo "<th>Datum</th>";
    echo "</tr>";
    foreach($datab as $row){
        echo "<tr>";
        echo "<td>",$row['id'],"</td>";
        echo "<td>",$row['voornaam'],"</td>";
        echo "<td>",$row['achternaam'],"</td>";
        echo "<td>",$row['email'],"</td>";
        echo "<td>",$row['datum'],"</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>



























<?php
//Auteurs: R. Troost, D. L. Wilbrink, C. Huang en S. Sadiqi
?>