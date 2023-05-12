<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Orders -- Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container my-5">
        <h2>List of Orders</h2>
       
        <br>
        <table class="table">
          <thead>
            <tr>
                <th>OrderID</th>
                <th>CustomerID</th>
                <th>BookID</th>
                <th>DatePurchase</th>
                <th>Quantity</th>
                <th>TotalPrice</th>
                <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <?php  
            include 'connectDB.php';
            $sql = " SELECT OrderID, CustomerID, BookID, DatePurchase, Quantity, TotalPrice, Status FROM `order` ";
            $result=$pdo->query($sql);
            
            while($row =$result->fetch()){
                echo "
                <tr>
                <td>$row[OrderID]</td>
                <td>$row[CustomerID]</td>
                <td>$row[BookID]</td>
                <td>$row[DatePurchase]</td>
                <td>$row[Quantity]</td>
                <td>$row[TotalPrice]</td>
                <td>$row[Status]</td>
                <td>
                    <a class='btn btn-danger btn-sm' href='deleteOrder.php?id=$row[OrderID]'>Delete</a>
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