<?php
if (isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']); // Sanitize input

    $mysqli = new mysqli('localhost', 'username', 'password', 'database_name');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Search the database for matching results
    $query = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $mysqli->prepare($query);
    $searchTerm = "%" . $searchQuery . "%";  
    $stmt->bind_param("s", $searchTerm); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output the search results
        while ($row = $result->fetch_assoc()) {
            echo "<div class='search-result'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Price:</strong> $" . $row['price'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found for '<strong>" . htmlspecialchars($searchQuery) . "</strong>'</p>";
    }

    // Close the connection
    $stmt->close();
    $mysqli->close();
} else {
    echo "<p>No search query provided.</p>";
}
?>