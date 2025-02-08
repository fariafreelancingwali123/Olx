<?php
include('db.php');  // Include the database connection

// Initialize the search query if it's set in the URL
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

// Build the SQL query with search and category filters
$query = "SELECT * FROM ads WHERE title LIKE '%$search_query%'";

// Apply category filter if set
if ($category_filter) {
    $query .= " AND category_id = '$category_filter'";
}

$query .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classified Ads - Home</title>
</head>
<body>
    <h1>Welcome to Classified Ads</h1>
    
    <!-- Search Bar -->
    <form action="index.php" method="GET">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search ads...">
        <button type="submit">Search</button>
    </form>

    <!-- Category Filters -->
    <div>
        <a href="index.php?category=1">Electronics</a> |
        <a href="index.php?category=2">Vehicles</a> |
        <a href="index.php?category=3">Home Goods</a>
    </div>

    <!-- Ads Display -->
    <div class="ads-grid">
        <?php while ($ad = mysqli_fetch_assoc($result)): ?>
            <div class="ad">
                <img src="uploads/<?php echo $ad['image']; ?>" alt="Ad Image">
                <h3><?php echo $ad['title']; ?></h3>
                <p><?php echo $ad['price']; ?></p>
                <a href="contact.php?ad_id=<?php echo $ad['id']; ?>">Contact Seller</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
