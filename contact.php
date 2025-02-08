<?php
include('db.php');

if (isset($_GET['ad_id'])) {
    $ad_id = $_GET['ad_id'];
    $query = "SELECT * FROM ads WHERE id = '$ad_id'";
    $result = mysqli_query($conn, $query);
    $ad = mysqli_fetch_assoc($result);
}

// Process contact form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $query = "INSERT INTO messages (ad_id, user_id, message) VALUES ('$ad_id', '{$_SESSION['user_id']}', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "Message sent to the seller!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Seller</title>
</head>
<body>
    <h1>Contact Seller</h1>
    <h2>Ad: <?php echo $ad['title']; ?></h2>
    <p><?php echo $ad['description']; ?></p>
    
    <form action="contact.php?ad_id=<?php echo $ad['id']; ?>" method="POST">
        <textarea name="message" placeholder="Write your message" required></textarea><br>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
