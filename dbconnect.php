<?php
$servername = "localhost";
$username = "moneymon_278366_bicolor";
$password = "**A7mv&Y1?p)";
$dbname = "moneymon_278366_bicolor";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!--
email password :lj2&r[O]Tw*J
email:bicolor@moneymoney12345.com
-->