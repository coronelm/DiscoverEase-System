<?php include 'item-con.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            '</div>' .
                            '<button class="view" value="' . $row["ItemID"] . '" onclick="handleViewButtonClick(' . $row["ItemID"] . ')" id="view" name="view' . $row["ItemID"] . '">VIEW</button>' .
                            '</div>';

                        // Additional details for the form
                        echo '<div class="form-wrapper" id="form' . $row["ItemID"] . '">';
                        echo '<form method="post" action="item-con.php">';
                        echo '<button type="button" class="close" id="closeButton" onclick="closeForm(\'form' . $row["ItemID"] . '\')">X</button>';
                        echo '<div class="form-container">';
                        echo '<div class="layer2">';
                        echo '<div class="item-container">';
                        
                        // Display the image if available
                        if (!empty($row["Image"])) {
                            echo '<img src="../report/uploads/' . $row["Image"] . '" alt="Item Image" class="item-image">';
                        }

                        echo '</div>';
                        echo '</div>';

                        echo '<div class="layer1">';
                        echo '<div class="item-container1">';
                        echo '<span class="ItemName" name="ItemName"><h1>' . $row["ItemName"] . '/</h1></span>';
                        echo '<span class="Category" name="Category"><h1>' . $row["Category"] . '</h1></span>';
                        echo '</div>';
                        echo '<br>';
                        echo '<label for="ItemDescription">Description: </label>';
                        echo '<span class="Description" name="ItemDescription">' . $row["ItemDescription"] . '</span>';
                        echo '<br>';
                        echo '<label for="DateTime">Date and Time Reported: </label>';
                        $dateTime = $row["DateTime"];
                        $formattedDateTime = date("Y-m-d | H:i:s", strtotime($dateTime));
                        echo '<span class="DateTime" name="DateTime">' . $formattedDateTime . '</span>';
                        echo '<br>';
                        echo '<label for="Location">Location: </label>';
                        echo '<span class="Location" name="Location">' . $row["Location"] . '</span>';
                        echo '<br>';
                        echo '<label for="ReportedBy">Reported By: </label>';
                        echo '<span class="ReportedBy" name="ReportedBy">' . $row["ReportedBy"] . '</span>';
                        echo '<br>';
                        echo '<label for="Status"><h2>Status:</h2></label>';
                        echo '<select id="Status" name="Status">';
                        echo '<option value="Lost" ' . ($row["Status"] == 'Lost' ? 'selected' : '') . '>Lost</option>';
                        echo '<option value="Found" ' . ($row["Status"] == 'Found' ? 'selected' : '') . '>Found</option>';
                        echo '<option value="Claimed" ' . ($row["Status"] == 'Claimed' ? 'selected' : '') . '>Claimed</option>';
                        echo '</select>';
                        echo '<input type="hidden" name="ItemID" value="' . $row["ItemID"] . '">';
                        echo '<input type="submit" value="Update Status">';
                        echo '</div>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
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
