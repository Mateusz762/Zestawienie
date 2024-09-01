<?php
    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMesage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone]"];
        $address = $_POST["address"];

        do{
            if(empty($name) || empty($email) || (empty($phone))){
                $errorMessage = "All the field are required";
                break;
            }
        //add new client to databases
        $sql = "INSERT INTO clients (name email phone address)";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalied query:" .$connection_.error;
            break;
        }
        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        header("Location: /zestawienie/index.php");
      
        }while(false);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>My shops</title>
</head>
<body>
<div class="container my-5">
    <h2>
        Nowy klient
    </h2>
    <?php
        if( !empty($errorMessage)){
            echo"
                <div class='row mb-3'>
                    <div class='offset-sm-e col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label </button>
                        </div>
                    </div>
                </div>
            ";
        }
          
    ?>
    <form action= method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Adress" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Phone" value="<?php echo $phone; ?>">
            </div>
            <?php
                if(!empty($successMesage)){
                    echo"
                        <div class='row mb-3'>
                    <div class='offset-sm-e col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label </button>
                        </div>
                    </div>
                </div>
                    ";
                };
            ?>
        <div class="row mb-3">
            <div class="submit">
                <button type="submit" class="btn btn-primary" href="Zestawienie/index.php">Add new client</button>
            </div>
            <div class="row mb-3">
            <div class="submit">
                <button type="submit" class="btn btn-primary">Cancel</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>