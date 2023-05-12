<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List -- Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Client</a>
        <br>
        <table class="table">
          <thead>
            <tr>
                <th>UserID</th>
                <th>UserName</th>
                <th>Phone</th>
                <th>IC Client</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
            </tr>
          </thead>

          <tbody>
            <?php  
            include 'connectDB.php';
            $sql = "SELECT * FROM customer";
            $result=$pdo->query($sql);
            
            while($row =$result->fetch()){
                echo "
                <tr>
                <td>$row[CustomerID]</td>
                <td>$row[CustomerName]</td>
                <td>$row[CustomerPhone]</td>
                <td>$row[CustomerIC]</td>
                <td>$row[CustomerEmail]</td>
                <td>$row[CustomerAddress]</td>
                <td>$row[CustomerGender]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?id=$row[CustomerID]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[CustomerID]'>Delete</a>
                </td>
             </tr>
                ";
            }
            ?>
            
          </tbody>

        </table>

    </div>
    
</body>
</html>