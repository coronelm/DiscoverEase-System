<?php include 'item-con.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="items.css">
    <style>
        /* Add your additional styles here */
        .item-image {
            max-width: 200px; /* Adjust the maximum width of the image as needed */
            max-height: 200px; /* Adjust the maximum height of the image as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <center>
            <table>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="table-container">' .
                            '<div class="list">' .
                            '<p>' . $row["ItemID"] . '</p>' .
                            
                            '<p>' . $row["Location"] . '</p>' .
                            '<p>' . $row["DateTime"] . '</p>' .
                            '<p>' . $row["Status"] . '</p>' .
                            '</div>';
                    }
                } else {
                    echo "<td colspan='6'>No records found.</td>";
                }
                ?>
            </table>
        </center>
    </div>
    <script src="script1.js"></script>
</body>
</html>


<?php include 'item-con.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Page</title>
    <link rel="stylesheet" href="item1.css">
    <style>
        /* Add your additional styles here */
        .item-image {
            max-width: 200px; /* Adjust the maximum width of the image as needed */
            max-height: 200px; /* Adjust the maximum height of the image as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <form method="get" action="items.php">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php
        if (!empty($searchTerm)) {
            echo "<p>Showing results for: '$searchTerm'</p>";
        }
        ?>

        <center>
            <table>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="table-container">' .
                            '<div class="list">' .
                            '<p>' . $row["ItemID"] . '</p>' .
                            '<p>' . $row["Category"] . '</p>' .
                            '<p>' . $row["Location"] . '</p>' .
                            '<p>' . $row["DateTime"] . '</p>' .
                            '<p>' . $row["Status"] . '</p>' .
                            '</div>';
                    }
                } else {
                    echo "<td colspan='6'>No records found.</td>";
                }
                ?>
            </table>
        </center>
    </div>
    <script src="script1.js"></script>
</body>
</html>
