<!DOCTYPE html>
<html>
    <head>
        <script src="jquery-3.1.1.min.js"></script>
        <meta charset="UTF-8">
        <title>NEW HIGHLY PAYING FAUCET</title>
    </head>
    <body>
        <form action="index.php"  method="post" target="_blank">
            <input type="text" name="btcaddress" required pattern="[a-zA-Z0-9]+"><br>
            <input type="submit" value="Claim Bitcoin">
        </form>
        <?php
        require_once 'databaseFunctions.php';
        $connection = array($dbhost, $dblogin, $dbpass, $dbselect);
        if (isset($_POST['btcaddress'])) {
            $input = $_POST['btcaddress'];
            checkAdress($input, $connection);
        }
        showRecords($connection);
        ?>
    </body>
</html>
