


<?php
include "connection.php";

// Retrieve data from the POST request
$sourceLocation = $_POST["pickupLocation"];
$destinationLocation = $_POST["dropoffLocation"];
$distanceInKM = $_POST["distanceValue"];
$estimatedTravelTimeMinutes = $_POST["travelTimeValue"];

// Insert data into the "gis" table
$sql = "INSERT INTO gis (SourceLocation, DestinationLocation, DistanceInKM, EstimatedTravelTimeMinutes)
VALUES ('$sourceLocation', '$destinationLocation', $distanceInKM, $estimatedTravelTimeMinutes)";

if ($conn->query($sql) === TRUE) {
    echo "Route Confirmed";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
