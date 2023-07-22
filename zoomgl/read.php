<?php
//check existence of id parament before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    //Include config file
    require_once "config.php";

    //Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        //Bind variable to the prepared statement as aparameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        //set parameters
        $param_id = trim($_GET["id"]);

        //Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result sert
                contains only one row,we dont need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrive individual field value
                $name = $row["name"];
                $Address = $row["address"];
                $salary = $row["salary"];
            } else {
                //URL doesnt contai  valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // cLose statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($link);
} else{
    //URL doesnt contain idi parameter. Redirect to erro page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tus Datos:</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .wrapper{
                width: 600px;
                margin: 0 auto;
            }
            </style>
            </head>
            <body>
            <header>
            <a href="" class="logo"><img src="./logo2.jpg" alt="logo WL" width="100" height="50"></a>
        </header>
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="mt-5 mb-3">Tus Datos:</h1>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <p><b><?php echo $row["name"]; ?></b></p>
        </div>
        <div class="form-group">
            <label>Correo</label>
            <p><b><?php echo $row["address"]; ?></b></p>
        </div>
        <div class="form-group">
            <label>Comentarios</label>
            <p><b><?php echo $row["salary"]; ?></b></p>
        </div>
        <p><a href="verificacion.php" class="btn btn-primary">
            Regresar</a></p>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>
