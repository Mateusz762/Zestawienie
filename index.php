<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Zestawienie zakupu</title>
</head>
<body>
<div class="container">
   <h2>
        Lista zakupów
   </h2>
   <a href="/zestawienie/create.php" class="btn btn-primary" role="button">Nowy klient</a>
   <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>name</td>
                <td>eamail</td>
                <td>phone</td>
                <td>adress</td>
                <td>data urodzenia</td>
                <td>created_at</td>
                <td>deleted</td>
            </tr>
    <tbody>
        <?php
            //connect check//

            $conn = new mysqli('localhost', 'root', '', 'shop');
            //check connection//

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              echo "Connected successfully";

              //read from databasses//
              $sql = "SELECT * FROM `clients`";
              $result = $conn->query($sql);

              if(!$result){
                die("Invalid query: -> $connection error");
              }
              //read data of each row//
              while($row = $result->fetch_assoc()){
                echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[adress]</td>
                        <td>$row[crated_at]</td>
                        <td>
                            <a class='btn- btn-primary btn-sm' href='/mysop/edit.php'>Edit</a>
                            <a class='btn- btn-primary btn-sm' href='/mysop/delete.php'>Delete</a>
                        </td>
                    </tr>
                ";
              }
        ?>
        <tr>
            <td>10</td>
            <td>Bill Gates</li>
            <td>bill.gates@microsoft.com</td>
            <td>+44 123456789</td>
            <td> New York Ave 44</td>
            <td><a class='btn btn-primary btn-sm href='/'>Edytuj</a>
            <td><a class='btn btn-primary btn-sm href='/'>Usuń</a>
        </tr>
    </tbody>
    </thead>
</table>
</div>
</body>
</html>