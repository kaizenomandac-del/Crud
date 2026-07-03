<?php
include 'Connection.php';
 
// Secure the ID from the GET request to prevent SQL Injection
$id = (int)$_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM Students WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 24px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #666666;
            font-size: 14px;
            font-weight: 600;
        }

        .input-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #3498db;
            outline: none;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }

        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-size: 14px;
        }

        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #7f8c8d;
            text-decoration: none;
            font-size: 14px;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 
<div class="form-container">
    <h2>Edit User</h2>
     
    <form method="POST">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['name'] ?? '') ?>" required>
        </div>
        
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>
        </div>
        
        <button type="submit" name="update" class="btn-submit">Update User</button>
    </form>
     
    <?php
    if (isset($_POST['update'])) {
        // Sanitize the inputs to protect your database
        $name  = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
     
        $update_query = "UPDATE Students SET name='$name', email='$email' WHERE id=$id";
        
        if (mysqli_query($conn, $update_query)) {
            echo "<div class='message success'>User updated successfully!</div>";
            // Refreshing data inline so the input fields show the new values immediately
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            
            // Optional: Redirect back to the list after 1 second
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 1000);</script>";
        }
    }
    ?>
    
    <a href="index.php" class="back-link">← Back to User List</a>
</div>
 
</body>
</html>
