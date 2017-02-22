<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>NEW HIGHLY PAYING FAUCET</title>
    </head>
    <body>
        <?php
        require_once 'login.php';
        $conn = new mysqli($dbhost, $dblogin,$dbpass,$dbselect);
        if($conn->connect_error) die($conn->connect_error);
        $query = "select * from users";
        $result=$conn->query($query);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                echo "Bitcoin Adress: " . $row["btcadress"]. " - Amount: " . $row["amount"]. " " . $row["last"]. "<br>";
            }
        } 
        else 
        {
            echo "0 results";
        }
        $result->close();
        $conn->close();
        ?>
    </body>
</html>
