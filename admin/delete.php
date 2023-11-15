<?php
require "../koneksi.php"; // Include your database connection file

// Handle delete logic here
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Debug: Check the ID value
    echo "ID: " . $id;

    // Use prepared statement to prevent SQL injection
    $deleteQuery = $con->prepare("DELETE FROM laporan WHERE id = ?");
    $deleteQuery->bind_param("i", $id);

    // Debug: Check for errors in prepared statement
    if (!$deleteQuery) {
        die("Error in prepared statement: " . $con->error);
    }

    // Execute the query
    if ($deleteQuery->execute()) {
        // Deletion successful
        header("Location: index.php");
        exit();
    } else {
        // Handle errors or show a message
        echo "Error executing query: " . $deleteQuery->error;
    }

    // Close the prepared statement
    $deleteQuery->close();
} else {
    // Redirect to the main page if id is not provided
    header("Location: index.php");
    exit();
}
?>