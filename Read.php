<?php include 'Connection.php'; ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-bottom: 24px;
            color: #2c3e50;
            font-size: 28px;
            text-align: left;
            width: 100%;
            max-width: 1000px;
        }

        .table-container {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: #ffffff;
            font-weight: 600;
            padding: 14px 18px;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
            font-size: 15px;
        }

        /* Zebra striping for rows */
        tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        tr:nth-child(odd) {
            background-color: #f4f6f7;
        }

        /* Hover effect on rows */
        tr:hover {
            background-color: #eaeded;
            transition: background-color 0.2s ease;
        }

        /* Styling Action Links as Buttons */
        .btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: #3498db;
            color: #ffffff;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: #ffffff;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
 
<h2>User List</h2>
 
<div class="table-container">
    <table>
        <thead>
            <tr>
                
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM Students");
         
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            
            <td><?= htmlspecialchars($row['Name']) ?></td>
            <td><?= htmlspecialchars($row['Middle_name']) ?></td>
            <td><?= htmlspecialchars($row['Last_name']) ?></td>
            <td><?= htmlspecialchars($row['Age']) ?></td>
            <td>
                <a href="Update.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" 
                   class="btn btn-delete"
                   onclick="return confirm('Are you sure you want to delete this record?');">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
 
</body>
</html>
