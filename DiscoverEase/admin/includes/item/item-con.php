<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ItemID, ItemName, ItemDescription, DateTime, Location, Status, Category, ReportedBy, Image FROM tbitems";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST["ItemID"];
    $status = $_POST["Status"];

    // Update the status in the database
    $updateSql = "UPDATE tbitems SET Status='$status' WHERE ItemID=$itemID";

    if ($conn->query($updateSql) === TRUE) {
        echo '<br>';
        echo "Status updated successfully";
        echo '<button id="return1">Return</button>';
        echo '<style>
            #return1 {
                float: right;
                margin: 0 20px;
                background-color: chocolate;
                transition: 2s ease;
            }
    
            #return1:hover {
                background-color: aqua;
            }
        </style>';
        echo '<script> 
            var returnButton = document.getElementById("return1");
    
            returnButton.addEventListener("click", function(){
                window.location.href = "items.php";
            });
        </script>';
    } else {
        echo "Error updating status: " . $conn->error;
    }
}    