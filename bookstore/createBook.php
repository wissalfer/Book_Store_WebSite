<?php
include 'connectDB.php';
$BookID="";
$BookTitle="";
$ISBN="";
$Price="";
$Author="";
$Type="";

$Image="";

$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $BookID=$_POST["BookID"];
    $BookTitle=$_POST["BookTitle"];
    $ISBN=$_POST["ISBN"];
    $Price=$_POST["Price"];
    $Author=$_POST["Author"];
    $Type=$_POST["Type"];
    $Image=$_POST["Image"];


    do{

        if (empty($BookID) ||empty($BookTitle) || empty($ISBN) || empty($Price)|| empty($Author) ||empty($Type) ||empty($Image)){
            $errorMessage="ALL THE FIELDS ARE REQUIRED";
            break;
        }

        //add new book in database  /'".$BookID."',".$BookTitle."', '". $ISBN."', '". $Price."', '". $Author."', '". $Type."', '". $Image."'

        $sql = "INSERT INTO book(BookID,BookTitle, ISBN, Price, Author, Type,Image) VALUES('".$BookID."','".$BookTitle."', '". $ISBN."', '". $Price."', '". $Author."', '". $Type."', '". $Image."')";
        $res= $pdo->query($sql);

        if(!$res){
            $errorMessage="Invalid query :".$pdo->error;
            break;
        }
        $BookID="";
        $BookTitle="";
        $ISBN="";
        $Price="";
        $Author="";
        $Type="";
        $Image="";

        $successMessage="book added correctly";
        header("location:listeBooks.php");
        exit;
    }while (false);
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">   
        <h2>New Client</h2>

               
     <?php

     
        if (!empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' date-bs-dismiss='alert' arie-label='Close'> </button>
                </div>
            ";
        }
        ?>
        <form method="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BookCode</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="BookID" value="<?php echo $BookID;?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BookTitle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="BookTitle" value="<?php echo $BookTitle;?>">
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ISBN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ISBN" value="<?php echo $ISBN;?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Price" value="<?php echo $Price;?>">
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Author</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Author" value="<?php echo $Author;?>">
                </div>

            </div>

         
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Type" value="<?php echo $Type;?>">
                </div>

            </div>
            <div style="heigth:50px;" class="row mb-3">
                <label class="col-sm-3 col-form-label">Image</label>
                <div  class="col-sm-6">
                    <input type="text" class="form-control" name="Image" value="<?php echo $Image;?>">
                </div>

            </div>


            <?php
        
            if (!empty($successMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' date-bs-dismiss='alert' arie-label='Close'> </button>
                </div>
            ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div style="margin-left:5px" class="offset-sm-3 col-sm-3 d-grid">
                   <button   class="btn btn-primary" href="list.php">Cancel</button>
                </div>

            </div>


        </form>
        
    </div>

    
</body>
</html>