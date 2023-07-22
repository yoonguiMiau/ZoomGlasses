<?php
// Include config file
require_once "config.php";

// Define variables ana initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";


// Processing form data when form is submited
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array
    ("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    }else{
        $name = $input_name;
    }

    //Validate address address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";
    } else{
        $address = $input_address;
    }

    // Validate salary 
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Porfavor ingresar un comentario.";
    } else{
        $salary = $input_salary;
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        //Prepare an update statement
        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statemenet as parametres
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);

            //set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records update sucessfully. Redirect to landing page
                header("location: verificacion.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
        // Close connection
        mysqli_close($link);
    } else{
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            // Get URL parameter
            $id = trim($_GET["id"]);

            // Prepare a select statement
            $sql = "SELECT * FROM employees WHERE id = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                // Set parameters
                $param_id = $id;

                //Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array.
                        Since the result set
                        contains only one row, we dont need touse
                        while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        // Retrive individual field value
                        $name = $row["name"];
                        $address = $row["address"];
                        $salary = $row["salary"];
                    } else{
                        // URL doesnt contain valid id. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            //close statement
            mysqli_stmt_close($stmt);

            //close connection
            mysqli_close($link);
        } else{
            //URL doesnt contain id parameter. Redirect to error page
            header("location: error.php");
            exit();
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
            background-image: url(fondop.png);
                border-width: 5px;
                border-style: solid;
                border-color: black;
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
                            <h2 class="mt-5">Actualiza tus datos</h2>

                            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"
                            method="post">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $name; ?>">
                                <span class="invalid-feedback"><?php echo $name_err;?></span>
    </div>
    <div class="form-group">
        <label>Correo</label>
        <textarea name="address" class="form-control <?php echo(!empty($address_err)) ? 'is-invalid' : ''; 
        ?>"><?php echo $address; ?></textarea>
        <span class="invalid-feedback"><?php echo $address_err;?></span>
    </div>
    <div class="form-group">
        <label>Comentarios</label>
        <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>"
        value="<?php echo $salary; ?>">
        <span class="invalid-feedback"><?php echo $salary_err; ?></span>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="submit" class="btn btn-primary" value="Actualizar">
    <a href="verificacion.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>

