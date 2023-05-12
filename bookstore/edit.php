<?php
include 'connectDB.php';
$id="";
$name="";
$phone="";
$icc="";
$email="";
$address="";
$gender="";
$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD']=='GET'){
   
    if(!isset($_GET["id"])){
        header("location :list.php");
        exit;
    }

    $id=$_GET["id"];
    $sql="SELECT * FROM customer WHERE CustomerID=$id";
    $res=$pdo->query($sql);
    $row=$res->fetch();
    
    if(!$row){
        header("location:list.php");
        exit;
    }

    $name=$row["CustomerName"];
    $phone=$row["CustomerPhone"];
    $icc=$row["CustomerIC"];
    $email=$row["CustomerEmail"];
    $address=$row["CustomerAddress"];
    $gender=$row["CustomerGender"];
}else{
    $id=$_POST["id"];
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $icc=$_POST["icc"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];

    do{
        if (empty($id) ||empty($name) || empty($email) || empty($phone)|| empty($address) ||empty($icc) ||empty($gender)){
            $errorMessage="ALL THE FIELDS ARE REQUIRED";
            break;
        }

    	$sql = "UPDATE customer SET CustomerName = '".$name."', CustomerPhone = '".$phone."', 
        CustomerIC = '".$icc."', CustomerEmail = '".$email."', CustomerAddress = '".$address."', 
        CustomerGender = '".$gender."' WHERE CustomerID=$id";
        $res= $pdo->query($sql);

        if(!$res){
            $errorMessage="Invalid query :".$pdo->error;
            break;
        }

        $successMessage="client added correctly";
        header("location:list.php");
        exit;
    }while(false);
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
            <input type="hiddden"  name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">IC Client</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="icc" value="<?php echo $icc;?>">
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>

            </div>

         
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Addresss</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>">
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