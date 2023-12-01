<?php
include '../item/item-con.php';
$lostCount = $conn->query("SELECT COUNT(*) FROM tbitems WHERE Status='Lost'")->fetch_assoc()["COUNT(*)"];
$foundCount = $conn->query("SELECT COUNT(*) FROM tbitems WHERE Status='Found'")->fetch_assoc()["COUNT(*)"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="lost-item">
            <center>
            <p>Total No. of Lost Items: <br><br> <?php echo $lostCount; ?> </br></br> </p>
        </div>
            </center>
            <center>
        <div class="found-item">
            <p>Total No. of Found Items: <br><br> <?php echo $foundCount; ?> </br></br> </p>
        </div>
            </center>
    </div>
</body>
</html>
