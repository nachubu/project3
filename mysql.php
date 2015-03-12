<?php
$servername = "localhost";
$username = "root";
$password = "kamu#gisha@1991";
$dbname = "cds";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statememtns

    $x = 1;
    $w = 100001;
    while($x <= 50) {
    $conn->exec("INSERT INTO `cds`.`waybillcodes` (`id`, `code`, `used`) VALUES (NULL,"."'".($w+$x)."'"." , '0')");
    $x++;
    }

    // commit the transaction
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>