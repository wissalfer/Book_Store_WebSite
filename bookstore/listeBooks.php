<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List books -- Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container my-5">
        <h2>List of BooKs</h2>
        <a class="btn btn-primary" href="createBook.php" role="button">New Book</a>
        <br>
        <table class="table">
          <thead>
            <tr>
                <th>BookID</th>
                <th>BookTitle</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Author</th>
                <th>Type</th>
                <th>Image</th>
            </tr>
          </thead>

          <tbody>
            <?php  
            include 'connectDB.php';
            $sql = "SELECT * FROM book";
            $result=$pdo->query($sql);
            
            while($row =$result->fetch()){
                echo "
                <tr>
                <td>$row[BookID]</td>
                <td>$row[BookTitle]</td>
                <td>$row[ISBN]</td>
                <td>$row[Price]</td>
                <td>$row[Author]</td>
                <td>$row[Type]</td>
                <td>$row[Image]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='editBook.php?id=$row[BookID]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='deleteBook.php?id=$row[BookID]'>Delete</a>
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