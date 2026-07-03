<?php include 'config.php'; ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
            border-color: #4caf50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
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
    </style>
</head>
<body>
 
<div class="form-container">
    <h2>Add User</h2>
     
    <form method="POST">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <button type="submit" name="save">Save User</button>
    </form>
     
    <?php
    if (isset($_POST['save'])) {
        // Essential security note: Always sanitize inputs to prevent SQL Injection!
        $name  = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
     
        $query = "INSERT INTO Students (name, email) VALUES ('$name', '$email')";
        
        if (mysqli_query($conn, $query)) {
            echo "<div class='message success'>User added successfully!</div>";
        }
    }
    ?>
</div>
 
</body>
</html>
