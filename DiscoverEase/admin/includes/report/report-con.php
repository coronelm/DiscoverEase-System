<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $date_time = $_POST["date_time"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $reported_by = $_POST["reported_by"];

    if (isset($_FILES["image"]) && is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $image = $_FILES["image"]["name"];

        if (!is_dir("uploads")) {
            if (!@mkdir("uploads", 0755, true)) {
                die("Failed to create the 'uploads' directory.");
            }
        }

// Insert into tbreports table
$stmt_reports = $conn->prepare("INSERT INTO tbreports (ReportName, ReportDescription, DateTime, Location, Category, ReportedBy, Image) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt_reports->bind_param("sssssss", $item_name, $item_description, $date_time, $location, $category, $reported_by, $image);

// Insert into tbitems table
$stmt_items = $conn->prepare("INSERT INTO tbitems (ItemName, ItemDescription, DateTime, Location, Category, Status, ReportedBy, Image) VALUES (?, ?, ?, ?, ?, 'Pending', ?, ?)");
$stmt_items->bind_param("sssssss", $item_name, $item_description, $date_time, $location, $category, $reported_by, $image);

if ($stmt_reports->execute() && $stmt_items->execute()) {
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
    echo '<script>alert("Report successfully inserted into the database.");</script>';
    echo '<script>window.location = "report.php";</script>';
} else {
    echo "Error: " . $stmt_reports->error . " or " . $stmt_items->error;
}

$stmt_reports->close();
$stmt_items->close();

    } else {
        echo "Error: No image uploaded.";
    }
}

$conn->close();
?>
