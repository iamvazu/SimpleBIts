<?php

require_once 'login.php';

function showRecords($connection) {
    $conn = new mysqli($connection[0], $connection[1], $connection[2], $connection[3]);
    if ($conn->connect_error)
        die($conn->connect_error);
    $query = "SELECT * FROM USERS";
    $result = $conn->query($query);
    $row = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Bitcoin Adress: " . $row["btcaddress"] . " <br> Amount: " . $row["amount"] . " <br>" . $row["last"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $result->close();
    $conn->close();
}

function checkAdress($btcaddress, $connection) {
    $conn = new mysqli($connection[0], $connection[1], $connection[2], $connection[3]);
    if ($conn->connect_error)
        die($conn->connect_error);
    $query = "SELECT btcaddress FROM users where btcaddress = '$btcaddress'";
    $result = $conn->query($query);
    if($result->num_rows == 0)
        addAddress($btcaddress, $connection);
    $result->close();
    $conn->close();
}

function addAddress($btcaddress, $connection) {
    $conn = new mysqli($connection[0], $connection[1], $connection[2], $connection[3]);
    if ($conn->connect_error)
        die($conn->connect_error);
    $query = "INSERT INTO users(btcaddress) VALUES" . "('$btcaddress');";
    $result = $conn->query($query);
    if (!$result)
        echo "Insert failed: $query" . "$conn->error <br>";
}
