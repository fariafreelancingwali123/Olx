<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Your Ad</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            width: 100%;
            max-width: 500px;
        }
        form h2 {
            text-align: center;
            color: #002f34;
            margin-bottom: 20px;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1.5px solid #b3b3b3;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #002f34;
        }
        input[type="file"] {
            border: 1.5px dashed #b3b3b3;
            cursor: pointer;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #002f34;
            font-weight: 600;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #002f34;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #00474f;
        }
    </style>
</head>
<body>
    <form action="dashboard.php" method="POST" enctype="multipart/form-data">
        <h2>Post Your Ad</h2>
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <input type="file" name="image" required><br>
        
        <label for="category">Category:</label>
        <select name="category" required>
            <?php
            // Fetch categories from the database
            $category_query = "SELECT * FROM categories";
            $category_result = mysqli_query($conn, $category_query);
            while ($category = mysqli_fetch_assoc($category_result)) {
                echo "<option value='{$category['id']}'>{$category['name']}</option>";
            }
            ?>
        </select><br>
        <button type="submit">Post Ad</button>
    </form>
</body>
</html>
