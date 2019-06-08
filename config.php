<?php

$s = "localhost";
$u = "root1"; // schozovd_cryptobids
$p = "BHATALI@34a"; //
$db = "faucet"; // schozovd_cryptobids

// Create connection
$conn = new mysqli($s, $u, $p, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>